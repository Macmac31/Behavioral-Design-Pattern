<?php 

class Student implements Element {
     public function __construct(
        private string $id,
        private string $name,
        private string $program,
        private int $year
    ) {}

    public function getId(): string { return $this->id; }
    public function getName(): string { return $this->name; }
    public function getProgram(): string { return $this->program; }
    public function getYear(): int { return $this->year; }

    // DOUBLE DISPATCH: the element calls the visitor method that matches
    // its own type (visitStudent). The visitor therefore knows the exact
    // class it is dealing with, without using if/else or instanceof.
    public function accept(Visitor $visitor): void
    {
        $visitor->visitStudent($this);
    }
}