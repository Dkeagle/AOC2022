<?php
    // A = X = Rock
    // B = Y = Paper
    // C = Z = Scissors
    $file = fopen("input.txt", "r");
    $score = 0;

    while(!feof($file)){
        $line = trim(fgets($file));
        if($line == ""){ continue; }
        $exploded = explode(" ", $line);
        switch ($exploded[1]) {
            case 'X':
                $score += 1;
                if ($exploded[0] == 'C'){
                    $score += 6;    // Win
                }elseif($exploded[0] == 'A'){
                    $score += 3;    // Draw
                }
                break;
            case 'Y':
                $score += 2;
                if ($exploded[0] == 'A'){
                    $score += 6;    // Win
                }elseif($exploded[0] == 'B'){
                    $score += 3;    // Draw
                }
                break;
            case 'Z':
                $score += 3;
                if ($exploded[0] == 'B'){
                    $score += 6;    // Win
                }elseif($exploded[0] == 'C'){
                    $score += 3;    // Draw
                }
                break;
        }
    }
    echo "final score: ".$score."\n";
?>