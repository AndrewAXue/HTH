# CalKulocation
Finalist Project at Hack The Hammer

Our program finds the optimal spots for placing a store / buying a home / touring a new city, based on the interests of the user. These spots are calculated by the K-means algorithm, which partitions the data points that need to be considered (in this case, home addresses, existing points of interest such as schools, hospitals, libraries, etc) into K different sets. The end result are K different points, which are placed in such a way that each of the K points are situated on the centroids of the K different polygons constructed by the K different sets, effectively minimizing the distance between the K point, and points of interest.
