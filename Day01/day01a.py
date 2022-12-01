#!/usr/bin/env python3
total = 0
biggest = 0

with open('input.txt') as file:
    for line in file:
        if line == "\n":
            if total > biggest:
                biggest = total
            total = 0
        else:
            total += int(line)
    print(biggest)