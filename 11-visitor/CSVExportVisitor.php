<?php 

class CSVExportVisitor implements Visitor {
    private array $rows = [];  

    public function visitStudent(Student $student): void
    {
        $this->rows[] = "Student,{$student->getId()},{$student->getName()},{$student->getProgram()},{$student->getYear()}";
        echo "Student exported.\n";
    }

    public function visitFaculty(Faculty $faculty): void
    {
        $this->rows[] = "Faculty,{$faculty->getId()},{$faculty->getName()},{$faculty->getDepartment()}";
        echo "Faculty exported.\n";
    }

    public function visitAlumni(Alumni $alumni): void
    {
        $this->rows[] = "Alumni,{$alumni->getId()},{$alumni->getName()},{$alumni->getGraduationYear()}";
        echo "Alumni exported.\n";
    }
    public function getCsv(): string
    {
        return implode("\n", $this->rows) . "\n";
    }
}