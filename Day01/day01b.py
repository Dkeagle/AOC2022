#!/usr/bin/env python3
total = 0
results = []

with open('input.txt') as file:
    for line in file:
        if line == "\n":
            results.append(total)
            total = 0
        else:
            total += int(line)

results.sort(reverse=True)

print(f"{results[0]}, {results[1]}, {results[2]}")
print(f"{results[0] + results[1] + results[2]}")