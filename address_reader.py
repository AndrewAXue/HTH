from collections import namedtuple
import json
import requests

address = namedtuple('address', ['id', 'longitude', 'latitude', 'street', 'postal'])

try:
  data = json.load(open('raw_json_data/addresses'))
except:
   data = requests.request(method='get', url='https://opendata.arcgis.com/datasets/ac6fc684043341f6b1d6298c146a0bcf_1.geojson').json()
   json.dump(data, open('raw_json_data/addresses', 'w'), indent=2)

data_points = []
for data_point in data['features']:
  data_point = data_point['properties']
  data_points.append(address(data_point['OBJECTID'], data_point['LONGITUDE'], data_point['LATITUDE'], data_point['FULL_STREET_NAME'], data_point['POSTAL_CODE']))
import pdb; pdb.set_trace()
