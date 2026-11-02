<?php 
class StudentRequest { 
    public function __construct(private string $studentName, private string $type) {
        
    }
    public function getStudentName(): string {
        return $this->studentName; 
    }
    public function getType(): string {
        return $this->type;
    }
}