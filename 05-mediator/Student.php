<?php 
class Student {
     public function __construct(
        private string $name,
        private Mediator $mediator
    ) {
    
        $this->mediator->addStudent($this);
    }

    public function getName(): string { return $this->name; }

    public function send(string $message): void
    {
        echo "{$this->name}: $message\n";
        $this->mediator->sendMessage($message, $this);
    }
    public function receive(string $message, Student $from): void
    {
        echo "{$this->name} receives:\n{$from->getName()}: $message\n";
    }
}