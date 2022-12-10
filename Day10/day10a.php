<?php
    $strengh = [];
    $cycle = 0; 
    $register = 1;
    $total = 0;

    $file = fopen("input.txt", "r");
    while(!feof($file)){
        $line = explode(" ", trim(fgets($file)));
        $cycle++;
        if($cycle % 40 == 20){ $strengh[$cycle] = $register; }
        if($line[0] === "addx"){
            $cycle++;
            if($cycle % 40 == 20){ $strengh[$cycle] = $register; }
            $register += $line[1];
        }
    }
    
    foreach ($strengh as $key => $value) {
        $total += $key * $value;
    }
    
    print_r($strengh);
    echo $total."\n";

?>