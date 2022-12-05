<?php
    $drawing = [];
    $final = [];
    $file = fopen("input.txt", "r");

    // Grab the drawing, reverse it and remove the first line
    while(($line = fgets($file)) != "\r\n"){
        array_unshift($drawing, $line);
    }
    array_shift($drawing);

    // Compile the drawing in a two dimensions array
    // First array = Stacks, Second array = Elements in stack
    $columns = strlen($drawing[0]);
    for($i = $j = 1; $i < $columns; $i += 4, $j++){
        $final[$j] = array();
        $rows = count($drawing);
        for($k = 0; $k < $rows; $k++){
            if($drawing[$k][$i] != " "){
                array_push($final[$j], $drawing[$k][$i]);
            }
        }
    }

    // Rearrange arrays depending on instructions find in the file (after the drawing)
    while(!feof($file)){
        $line = fgets($file);
        preg_match_all("/\d+/", $line, $steps);
        $steps = $steps[0];
        for($i = 0; $i < $steps[0]; $i++){
            array_push($final[$steps[2]], array_pop($final[$steps[1]]));
        }
    }

    // Display the last element of each stack, as a string
    $answer = "";
    foreach($final as $stack){
        $answer .= end($stack);
    }
    echo $answer."\n";
?>