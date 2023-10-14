input = [
    [0, 0, 0, 0, 0],
    [0, 0, 3, 6, 0],
    [0, 3, 0, 4, 0],
    [0, 6, 4, 0, 0],
    [0, 0, 0, 0, 0],
]

def verifyPath(graph, node1, node2):
    if node1 >= 0 and node2 >= 0:
        if graph[node1][node2] != 0:
            return "Path exists"
        else:
            return "Path does not exist"
    else:
        return "Invalid node"

print(verifyPath(input, 3, 4))
