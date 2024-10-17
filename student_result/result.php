<?php

function calculateResult($marks) {
    foreach ($marks as $mark) {
        if ($mark < 0 || $mark > 100) {
            return "Mark range is invalid.";
        }
    }
    foreach ($marks as $mark) {
        if ($mark < 33) {
            return "The student has failed.";
        }
    }
    $total = array_sum($marks);
    $average = $total / count($marks);
    switch (true) {
        case ($average >= 80 && $average <= 100):
            $grade = 'A+';
            break;
        case ($average >= 70 && $average < 80):
            $grade = 'A';
            break;
        case ($average >= 60 && $average < 70):
            $grade = 'A-';
            break;
        case ($average >= 50 && $average < 60):
            $grade = 'B';
            break;
        case ($average >= 40 && $average < 50):
            $grade = 'C';
            break;
        case ($average >= 33 && $average < 40):
            $grade = 'D';
            break;
        default:
            $grade = 'F';
    }

    return [
        'total' => $total,
        'average' => $average,
        'grade' => $grade
    ];
}
$marks = [85, 90, 92, 67, 88];

$result = calculateResult($marks);

if (is_array($result)) {
    echo "Total Marks: " . $result['total'] . "\n";
    echo "Average Marks: " . number_format($result['average'], 2) . "\n";
    echo "Grade: " . $result['grade'] . "\n";
} else {
    echo $result;
}

?>