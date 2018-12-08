def cleaning(poi: dict):
    useful_buildings = []
    for key,value in poi.items():
        if value == 0:
            poi.pop(key)
