<?php
    $file = fopen("input.txt", "r");
    $forest = [];
    $scenic_score = 0;

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
            $north = $south = $west = $east = 1;
            // count north
            for($k = $i - 1; $k >= 0; $k--){
                if($forest[$k][$j] >= $tree || $k == 0){
                    $north = $i - $k;
                    break;
                }
            }
            // count south
            for($k = $i + 1; $k < $rows; $k++){
                if($forest[$k][$j] >= $tree || $k == $rows - 1){
                    $south = $k - $i;
                    break;
                }
            }
            // count west
            for($k = $j - 1; $k >= 0; $k--){
                if($forest[$i][$k] >= $tree || $k == 0){
                    $west = $j - $k;
                    break;
                }
            }
            // count east
            for($k = $j + 1; $k < $cols; $k++){
                if($forest[$i][$k] >= $tree || $k == $cols - 1){
                    $east = $k - $j;
                    break;
                }
            }
            // calc tree score
            $tmp = $north * $south * $west * $east;
            // if tree score is bigger than last best, update
            if($tmp > $scenic_score){ $scenic_score = $tmp; }
        }
    }

    // display the result
    echo $scenic_score."\n";
?>