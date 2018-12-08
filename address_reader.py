from collections import namedtuple
import json
import requests
from clean_data import cleaning
from algo import kmeans

institution_map = {'home': 'https://opendata.arcgis.com/datasets/ac6fc684043341f6b1d6298c146a0bcf_1.geojson',
                'school': 'https://opendata.arcgis.com/datasets/cccae6f029334927856da6e20a50561f_19.geojson',
                'hospital': 'https://opendata.arcgis.com/datasets/a5867b5375544ceb8f06544a5ed349a5_15.geojson'}

data_point = namedtuple('data_point', ['institution', 'longitude', 'latitude'])


def get_data(institution_type):
    print(f'Getting data points for institution {institution_type}')
    try:
        data = json.load(open(f'cached_raw_data/{institution_type}'))
        print('Successfully retrieved cached data')
    except:
        print('Failed to retrieve from cache')
        data = requests.request(method='get', url=institution_map[institution_type]).json()
        json.dump(data, open(f'cached_raw_data/{institution_type}', 'w'))
        print(f'Cached data')
    data_points = []
    for x in data['features']:
        x = x['properties']
        data_points.append(data_point(institution_type,
                                   float(x['LONGITUDE']),
                                   float(x['LATITUDE'])))
    return data_points


def process_query(k_value: int, poi: dict):
    data_points = []
    required_buildings = cleaning(poi)
    for institution_type in poi:
        if institution_type in institution_map:
            data_points.extend(get_data(institution_type))
    return kmeans(k_value, poi, data_points)
