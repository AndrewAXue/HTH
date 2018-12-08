def cleaning(k: int, poi: dict):
    useful_buildings = []
    for key,value in poi.items():
        if value != 0:
            useful_buildings.append(key)

    return useful_buildings