<?php 


class ChatMediator implements Mediator {
     /** @var Student[] every student currently in the chat */
    private array $students = [];
    public function addStudent(Student $student): void {
        $this->students[] = $student; 
    }
    public function sendMessage(string $message, Student $sender): void {
        foreach ($this->students as $student) {
            if ($student !== $sender) {
                $student->receive($message, $sender);
            }
        }
    }
}