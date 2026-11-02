<?php 

interface Mediator {
    public function addStudent(Student $student): void;
    public function sendMessage(string $message, Student $sender): void;
}