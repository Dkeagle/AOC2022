#!/usr/bin/env python3
total = 0
first = []
second = []
with open("input.txt") as file:
    for line in file:
        comma_split = line.rstrip().split(",")
        first_dash_split = comma_split[0].split('-')
        second_dash_split = comma_split[1].split('-')
        first = [i for i in range(int(first_dash_split[0]), int(first_dash_split[1]) + 1)]
        second = [i for i in range(int(second_dash_split[0]), int(second_dash_split[1]) + 1)]
        if(all(item in first for item in second) or all(item in second for item in first)):
            total += 1
print(total)
