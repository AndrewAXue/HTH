from random import uniform
import math


def dist(point1, point2):
    return math.sqrt(
        (point1[0] - point2[0]) * (point1[0] - point2[0]) + (point1[1] - point2[1]) * (point1[1] - point2[1]))


def kmeans(k: int, poi: dict, data_points: list, patience: int = 20):
    addresses = []
    k_points = []  # long/lat of the k points
    min_lat = 999999999
    max_lat = -999999999
    min_long = 999999999
    max_long = -999999999
    for point in data_points:
        for i in range(poi[point.institution]):  # adds more for more weight
            addresses.append([point.longitude, point.latitude, 0])
            min_lat = min(min_lat, point.latitude)
            max_lat = max(max_lat, point.latitude)
            min_long = min(min_long, point.longitude)
            max_long = max(max_long, point.longitude)
    for i in range(k):
        k_points.append([uniform(min_long, max_long), uniform(min_lat, max_lat)])
    #for i, init_point in enumerate(data_points):
    #    if k == i: break
    #    k_points.append([init_point.longitude, init_point.latitude])
    for i in range(patience):
        print(f'current k points {k_points}')
        worst_point_ind = 0
        worst_point_dist = 0
        number_distribution = []
        for point in addresses:
            idx = 0  # which k cluster is it closest to
            min_dist = 100000
            for index, value in enumerate(k_points):
                if dist(point, value) < min_dist:
                    min_dist = dist(point, value)
                    idx = index
            if min_dist > worst_point_dist:
                worst_point_ind = index
            point[2] = idx
        for idx, value in enumerate(k_points):
            sumx = 0
            sumy = 0
            num_points = 0
            for addy in addresses:
                if addy[2] == idx:
                    num_points += 1
                    sumx += addy[1]
                    sumy += addy[0]
            number_distribution.append(num_points)
            if num_points == 0:
                value[0] = addresses[worst_point_ind][0]
                value[1] = addresses[worst_point_ind][1]
            else:
                value[0] = sumy / num_points
                value[1] = sumx / num_points
        print(number_distribution)
    return k_points
