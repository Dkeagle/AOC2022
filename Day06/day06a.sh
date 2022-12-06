#!/bin/bash
length=4;
while IFS= read -r line || [ -n "$line" ];  do
    for (( i = 0; i < ${#line}; i++ )); do
        data=${line:$i:$length};
        if [[ ${#data} -lt $length ]]; then
            break;
        fi
        flag=0;
        for (( j = 0; j < $length; j++ )); do
            for (( k = j + 1; k < $length; k++ )); do
                if [[ ${data:$j:1} == ${data:$k:1} ]]; then
                    (( flag=flag+1 ));
                fi
            done
        done
        if [[ $flag == 0 ]]; then
            (( i=i+length ));
            echo $i;
            break;
        fi
    done
done < input.txt