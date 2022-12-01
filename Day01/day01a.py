#!/usr/bin/env python3
total = 0

with open('input.txt', 'r') as file:
    for line in file:
        if line == "\n" or not line:
            print(total)
            total = 0
            continue
        total += int(line)