<?php 


class Alumni implements Element {
     public function __construct(
        private string $id,
        private string $name,
        private int $graduationYear
    ) {}

    public function getId(): string { return $this->id; }
    public function getName(): string { return $this->name; }
    public function getGraduationYear(): int { return $this->graduationYear; }

    public function accept(Visitor $visitor): void
    {
        $visitor->visitAlumni($this);   
    }
}