<?php

function generateRandomNumber($length = 2) {
    $number = '';
    for ($i = 0; $i < $length; $i++) {
        $number .= rand(0, 9);
    }
    return $number;
}

function generateRandomLine() {
    $randomLine = '';

    $randomType = rand(1, 5);

    switch ($randomType) {
        case 1: // echo statement
            $randomLine = 'echo ' . generateRandomNumber() . ';';
            break;
        case 2: // variable assignment
            $randomLine = '$var' . generateRandomNumber() . ' = ' . rand(1, 100) . ';';
            break;
        case 3: // for loop
            $loopVariable = 'i' . generateRandomNumber();
            $randomLine = 'for ($' . $loopVariable . ' = 1; $' . $loopVariable . ' <= ' . rand(1, 10) . '; $' . $loopVariable . '++) {';
            $randomLine .= ' echo ' . generateRandomNumber() . ' . " "; }';
            break;
        case 4: // if-else statement
            $randomLine = 'if (' . (rand(0, 1) ? 'true' : 'false') . ') { echo ' . generateRandomNumber() . '; } else { echo ' . generateRandomNumber() . '; }';
            break;
        case 5: // function declaration
            $functionName = 'func' . generateRandomNumber();
            $randomLine = 'function ' . $functionName . '() { echo ' . generateRandomNumber() . '; } ' . $functionName . '();';
            break;
        default:
            $randomLine = '';
            break;
    }

    return $randomLine;
}

$numberOfLines = 50;

$randomPHPCode = '<?php' . PHP_EOL;
$lines = [];
for ($i = 0; $i < $numberOfLines; $i++) {
    $lines[] = generateRandomLine();
}
shuffle($lines); // Randomize the order of the lines

foreach ($lines as $line) {
    $randomPHPCode .= $line . PHP_EOL;
}

$filename = 'random_complex_lines.php';
file_put_contents($filename, $randomPHPCode);

echo "Random complex PHP lines generated and saved to '$filename'.";
?>
