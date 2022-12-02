<?php
    // A = Rock             X = Lose
    // B = Paper            Y = Draw
    // C = Scissors         Z = Win
    $file = fopen("input.txt", "r");
    $score = 0;

    while(!feof($file)){
        $line = trim(fgets($file));
        if($line == ""){ continue; }
        $exploded = explode(" ", $line);
        switch ($exploded[1]) {
            case 'X':
                $score += 0;    // Lose
                if ($exploded[0] == 'A'){
                    $score += 3;
                }elseif($exploded[0] == 'B'){
                    $score += 1;
                }elseif($exploded[0] == 'C'){
                    $score += 2;
                }
                break;
            case 'Y':
                $score += 3;    // Draw
                if ($exploded[0] == 'A'){
                    $score += 1;
                }elseif($exploded[0] == 'B'){
                    $score += 2;
                }elseif($exploded[0] == 'C'){
                    $score += 3;
                }
                break;
            case 'Z':
                $score += 6;    // Win
                if ($exploded[0] == 'A'){
                    $score += 2;
                }elseif($exploded[0] == 'B'){
                    $score += 3;
                }elseif($exploded[0] == 'C'){
                    $score += 1;
                }
                break;
        }
    }
    echo "final score: ".$score."\n";
?>