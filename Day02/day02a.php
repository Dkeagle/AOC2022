<?php
    // A = X = Rock
    // B = Y = Paper
    // C = Z = Scissors
    $file = fopen("input.txt", "r");
    $score = 0;

    while(!feof($file)){
        $line = trim(fgets($file));
        switch ($line) {
            case "B Z": $score++;
            case "A Y": $score++;
            case "C X": $score++;
            case "C Z": $score++;
            case "B Y": $score++;
            case "A X": $score++;
            case "A Z": $score++;
            case "C Y": $score++;
            case "B X": $score++;
            default: break;
        }
    }
    echo "final score: ".$score."\n";
?>