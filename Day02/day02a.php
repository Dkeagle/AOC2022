<?php
    // A = X = Rock
    // B = Y = Paper
    // C = Z = Scissors
    $file = fopen("input.txt", "r");
    $score = 0;

    while(!feof($file)){
        $line = trim(fgets($file));
        switch ($line) {
            case "B Z": $score += 1;
            case "A Y": $score += 1;
            case "C X": $score += 1;
            case "C Z": $score += 1;
            case "B Y": $score += 1;
            case "A X": $score += 1;
            case "A Z": $score += 1;
            case "C Y": $score += 1;
            case "B X": $score += 1;
            default: break;
        }
    }
    echo "final score: ".$score."\n";
?>