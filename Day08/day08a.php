<?php
    $file = fopen("input.txt", "r");
    $forest = [];
    $visible_trees = 0;

    // load the input file as a two dimensionnal array
    $i = 0;
    while(!feof($file)){
        $line = str_split(trim(fgets($file)));
        $forest[$i] = [];
        $j = 0;
        foreach($line as $char){
            $forest[$i][$j] = $char;
            $j++;
        }
        $i++;
    }

    // close the file
    fclose($file);

    // going through the forest to check every tree
    $rows = count($forest);
    $cols = count($forest[0]);
    for($i = 1; $i < $rows - 1; $i++){
        for($j = 1; $j < $cols - 1; $j++){
            $tree = $forest[$i][$j];
            $north = $south = $west = $east = 0;
            // check north
            for($k = 0; $k < $i; $k++){
                if($tree <= $forest[$k][$j]){
                    $north++;
                }
                if($north){ break; }
            }
            // check south
            for($k = $i + 1; $k < $rows; $k++){
                if($tree <= $forest[$k][$j]){
                    $south++;
                }
                if($south){ break; }
            }
            // check west
            for($k = 0; $k < $j; $k++){
                if($tree <= $forest[$i][$k]){
                    $west++;
                }
                if($west){ break; }
            }
            // check east
            for($k = $j + 1; $k < $cols; $k++){
                if($tree <= $forest[$i][$k]){
                    $east++;
                }
                if($east){ break; }
            }
            // if flag is not raised, then tree is visible: increment the counter
            if(!($north && $south && $west && $east)){ $visible_trees++; }
        }
    }

    // add the border trees to the total, as they're visible from outside of the forest
    $visible_trees += ($rows * 2) + ($cols * 2) - 4;

    // display the result
    echo $visible_trees."\n";
?>