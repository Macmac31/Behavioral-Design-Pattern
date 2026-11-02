<?php 

require_once 'Student.php';
require_once 'Mediator.php';
require_once 'ChatMediator.php';

$chat = new ChatMediator();
$juan = new Student('Juan', $chat);
$maria = new Student('Maria', $chat);
$pedro = new Student('Pedro', $chat);

$juan->send("Hello everyone!");
echo "\n";

$maria->send("Hi Juan!");