<?php

// Function to generate a random variable name
function generateRandomVariableName($length = 7) {
    $characters = 'abcdefghijklmnopqrstuvwxyz';
    $variableName = '';
    for ($i = 0; $i < $length; $i++) {
        $variableName .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $variableName;
}

// Function to generate a random PHP line
function generateRandomLine() {
    $randomLine = '';

    $randomType = rand(1, 5);

    switch ($randomType) {
        case 1: // echo statement
            $randomLine = 'echo "' . generateRandomVariableName() . '";';
            break;
        case 2: // variable assignment
            $randomLine = '$' . generateRandomVariableName() . ' = ' . rand(1, 100) . ';';
            break;
        case 3: // for loop
            $loopVariable = generateRandomVariableName();
            $randomLine = 'for ($' . $loopVariable . ' = 1; $' . $loopVariable . ' <= ' . rand(1, 10) . '; $' . $loopVariable . '++) {';
            $randomLine .= ' echo $' . generateRandomVariableName() . ' . " "; }';
            break;
        case 4: // if-else statement
            $conditionVariable = generateRandomVariableName();
            $randomLine = 'if (' . rand(0, 1) . ') { echo "True"; } else { echo "False"; }';
            break;
        case 5: // function declaration
            $functionName = generateRandomVariableName();
            $randomLine = 'function ' . $functionName . '() { echo "' . generateRandomVariableName() . '"; } ' . $functionName . '();';
            break;
        default:
            $randomLine = '// This is good.';
            break;
    }

    return $randomLine;
}

// Number of random lines to generate
$numberOfLines = 50;

// Generate the random PHP lines
$randomPHPCode = '<?php' . PHP_EOL;
for ($i = 0; $i < $numberOfLines; $i++) {
    $randomPHPCode .= generateRandomLine() . PHP_EOL;
}

// Save the generated PHP code to a file
$filename = 'random_complex_lines.php';
file_put_contents($filename, $randomPHPCode);

echo "Random complex PHP lines generated and saved to '$filename'.";
?>
