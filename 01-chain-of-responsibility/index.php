<?php
require_once 'StudentRequest.php';
require_once 'Handler.php';
require_once 'StudentAffairsHandler.php';
require_once 'RegistrarHandler.php';
require_once 'FinancialHandler.php';
require_once 'ICTHandler.php';

$studentAffairs = new StudentAffairsHandler(); 
$studentAffairs ->setNext(new RegistrarHandler()) 
                ->setNext(new FinancialHandler())
                ->setNext(new ICTHandler());

$request = [
    'Transcript of Records', 'Good Moral Certificate', 'Student ID Concern', 'Library Card',
];

foreach ($request as $type) {
    $request = new StudentRequest('Juan Dela Cruz', $type);
    echo "Request: " . $request->getType() . "\n";

    $studentAffairs->handle($request);
    echo "\n";
}