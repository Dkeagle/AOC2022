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
        switch ($exploded[1].$exploded[0]) {
            case 'XB': $score += 1; break;
            case 'XC': $score += 2; break;
            case 'XA': $score += 3; break;
            case 'YA': $score += 4; break;
            case 'YB': $score += 5; break;
            case 'YC': $score += 6; break;
            case 'ZC': $score += 7; break;
            case 'ZA': $score += 8; break;
            case 'ZB': $score += 9; break;
        }
    }
    echo "final score: ".$score."\n";
?>