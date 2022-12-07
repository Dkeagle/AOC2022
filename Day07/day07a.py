#!/usr/bin/env python3
tree = {}
total = 0
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
# look after directory under size of 100.000 and totalize them
for key in tree.keys():
    if tree[key] <= 100000:
        total += tree[key]
# display the answer
print(total)