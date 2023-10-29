#Autoři: Nikolas Erlebach, Kristián Stefurak
def dijkstra(graph, start, end):
    num_vertices = len(graph)
    distances = [float('inf')] * num_vertices
    distances[start] = 0
    visited = [False] * num_vertices
    path = [None] * num_vertices

    for _ in range(num_vertices):
        min_distance = float('inf')
        min_index = -1

        for v in range(num_vertices):
            if not visited[v] and distances[v] < min_distance:
                min_distance = distances[v]
                min_index = v

        if min_index == -1:
            break

        visited[min_index] = True

        for v in range(num_vertices):
            if not visited[v] and graph[min_index][v] != 0:
                new_distance = distances[min_index] + graph[min_index][v]
                if new_distance < distances[v]:
                    distances[v] = new_distance
                    path[v] = min_index

    if path[end] is None:
        return float('inf'), []

    shortest_path = []
    current_vertex = end
    while current_vertex is not None:
        shortest_path.insert(0, current_vertex)
        current_vertex = path[current_vertex]

    return distances[end], shortest_path

graph = [[0, 0, 1, 0, 6],
         [0, 0, 2, 4, 0],
         [1, 2, 0, 0, 1],
         [0, 4, 0, 0, 2],
         [6, 0, 1, 2, 0]]

start = 0
arrOut = []

for i in range(5):
    shortest_distance = dijkstra(graph, start, i)
    arrOut.append(f"{i}: {shortest_distance}")

print(arrOut)
#printne např. '4: (2, [0, 2, 4])' kde levá strana je cílový uzel a pravá strana je dvojice (délka cesty, uzly, kterými cesta vede)