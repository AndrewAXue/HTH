from random import randint
import math


def dist(point1, point2):
    return math.sqrt(
        (point1[0] - point2[0]) * (point1[0] - point2[0]) + (point1[1] - point2[1]) * (point1[1] - point2[1]))


def kmeans(k: int, poi: dict, data_points: list):
    addresses = []
    k_points = []  # long/lat of the k points
    min_lat = 999999999
    max_lat = -999999999
    min_long = 999999999
    max_long = -999999999
    for point in data_points:
        for i in range(poi[point[5]]):  # adds more for more weight
            addresses.append((point[1], point[2], 0))
            min_lat = min(min_lat, point[2])
            max_lat = max(max_lat, point[2])
            min_long = min(min_long, point[1])
            max_long = max(max_long, point[1])
    for i in range(k):
        k_points.append((randint(min_long, max_long), randint(min_lat, max_lat)))

    for i in range(100):
        for point in addresses:
            idx = 0  # which k cluster is it closest to
            min_dist = 100000
            for index, value in enumerate(k_points):
                if dist(point, value) < min_dist:
                    min_dist = dist(point, value)
                    idx = index
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
            value[0] = sumx / num_points
            value[1] = sumy / num_points
    return k_points
