<?php
    $crt = [];
    $cycle = 0; 
    $register = 1;
    $sprite_pos = [0, 1, 2];

    $file = fopen("input.txt", "r");
    while(!feof($file)){
        $line = explode(" ", trim(fgets($file)));
        $cycle++;
        if(in_array($cycle % 40, $sprite_pos)){
            array_push($crt, "#");
        }else{
            array_push($crt, ".");
        }

        if($line[0] === "addx"){
            $cycle++;
            
            if(in_array($cycle % 40, $sprite_pos)){
                array_push($crt, "#");
            }else{
                array_push($crt, ".");
            }    
    
            $register += $line[1];
            $sprite_pos = [$register, $register + 1, $register + 2];
        }
    }

    fclose($file);

    foreach ($crt as $key => $char) {
        if($key % 40 == 0){ echo "\n"; }
        echo $char;
    }
?>

