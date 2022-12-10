<?php
    // A = Rock             X = Lose
    // B = Paper            Y = Draw
    // C = Scissors         Z = Win
    $file = fopen("input.txt", "r");
    $score = 0;

    while(!feof($file)){
        $line = trim(fgets($file));
        switch ($line) {
            case 'B Z': $score++;
            case 'A Z': $score++;
            case 'C Z': $score++;
            case 'C Y': $score++;
            case 'B Y': $score++;
            case 'A Y': $score++;
            case 'A X': $score++;
            case 'C X': $score++;
            case 'B X': $score++; 
            default: break;
        }
    }

    fclose($file);

    echo "final score: ".$score."\n";
?>