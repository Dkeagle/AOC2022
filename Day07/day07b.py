#!/usr/bin/env python3
tree = {}
with open("input.txt") as file:
    for line in file:
        line = line.strip()
        if line.startswith("$"):
            tmp = line.split(" ")
            command, parameter = " ".join(tmp[:2]), " ".join(tmp[2:])
            if command == "$ cd":
                if parameter == "/":
                    last_dir = []
                if parameter == "..":
                    last_dir.pop()
                else:
                    last_dir.append(parameter)
                    pwd = "".join(last_dir)
                    if pwd not in tree:
                        tree[pwd] = 0
        if line[0].isdigit():
            tree[pwd] += int(line.split(" ")[0])
# merge size of child directory with parent
for i in tree.keys():
    for j in tree.keys():
        if str(i) in str(j) and not i == j:
            tree[i] += tree[j]
# calc available empty space and space needed for update
empty = 70000000 - tree["/"]
needed = 30000000 - empty
# search for a directory big enough to free space for updating in one try
dir_to_delete = tree["/"]
for key in tree.keys():
    if tree[key] > needed and tree[key] < dir_to_delete:
        dir_to_delete = tree[key]
# display the answer
print(dir_to_delete)