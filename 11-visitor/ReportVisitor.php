<?php 

class ReportVisitor implements Visitor {
    public function visitStudent(Student $student): void
    {
        echo "STUDENT REPORT: {$student->getId()} | {$student->getName()} | "
           . "{$student->getProgram()} | Year {$student->getYear()}\n";
    }

    public function visitFaculty(Faculty $faculty): void
    {
        echo "FACULTY REPORT: {$faculty->getId()} | {$faculty->getName()} | "
           . "{$faculty->getDepartment()} Department\n";
    }

    public function visitAlumni(Alumni $alumni): void
    {
        echo "ALUMNI REPORT: {$alumni->getId()} | {$alumni->getName()} | "
           . "Graduated {$alumni->getGraduationYear()}\n";
    }
}