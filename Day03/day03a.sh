#!/bin/bash
total=0;
while IFS= read -r line || [ -n "$line" ]; do 
    first=${line:0:${#line}/2};
    second=${line:${#line}/2};
    for(( i=0; i<${#first}; i++ )); do
        if [[ $second == *${first:$i:1}* ]]; then
            value=$(printf "%d" "'${first:$i:1}");
            if [[ $value -gt 90 ]]; then
                value=$(($value - 96));
            else
                value=$(($value - 38));
            fi
            total=$((total+=value));
            break;
        fi
    done
done < input.txt
echo $total;