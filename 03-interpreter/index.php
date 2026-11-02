<?php 
require_once 'StudentContext.php';
require_once 'Expression.php';
require_once 'TerminalExpression.php';
require_once 'AndExpression.php';
require_once 'OrExpression.php';
require_once 'ExpressionParser.php';

$parser = new ExpressionParser();

$juan = new StudentContext(['NAME' => 'Juan', 'PROGRAM' => 'BSIT', 'YEAR' => '4']);
$queries = ['PROGRAM = "BSIT"', 'YEAR = 4', 'PROGRAM = "BSIT" AND YEAR = 4', 'PROGRAM = "BSCS" AND YEAR = 4', 'PROGRAM = "BSIT" OR PROGRAM = "BSCS"',];
foreach ($queries as $query) {
    
    $result = $parser->parse($query)->interpret($juan);
    echo "Expression:\n$query\n";
    echo "Result: " . ($result ? 'TRUE' : 'FALSE') . "\n\n";
}


$students = [
    new StudentContext(['NAME' => 'Juan',  'PROGRAM' => 'BSIT',  'YEAR' => 4]),
    new StudentContext(['NAME' => 'Maria', 'PROGRAM' => 'BSCS',  'YEAR' => 3]),
    new StudentContext(['NAME' => 'Pedro', 'PROGRAM' => 'BSIT',  'YEAR' => 2]),
    new StudentContext(['NAME' => 'Ana',   'PROGRAM' => 'BSCS',  'YEAR' => 4]),
];

$search = 'PROGRAM = "BSCS" OR YEAR = 2';
echo "Search: $search\n";

$expression = $parser->parse($search);
foreach ($students as $student) {
    if ($expression->interpret($student)) {
        echo " - " . $student->getName() . "\n";
    }
}