<?php 


class Faculty implements Element {
      public function __construct(
        private string $id,
        private string $name,
        private string $department
    ) {}

    public function getId(): string { return $this->id; }
    public function getName(): string { return $this->name; }
    public function getDepartment(): string { return $this->department; }

    public function accept(Visitor $visitor): void
    {
        $visitor->visitFaculty($this);   // "I am a Faculty"
    }
}