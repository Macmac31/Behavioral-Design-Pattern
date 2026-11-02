<?php


class StatisticsVisitor implements Visitor {
     private int $students = 0;
    private int $faculty = 0;
    private int $alumni = 0;
    private int $totalYearLevels = 0;   // used to compute the average year

    public function visitStudent(Student $student): void
    {
        $this->students++;
        $this->totalYearLevels += $student->getYear();
    }

    public function visitFaculty(Faculty $faculty): void { $this->faculty++; }
    public function visitAlumni(Alumni $alumni): void { $this->alumni++; }

    public function printSummary(): void
    {
        // Guard against dividing by zero when there are no students.
        $average = $this->students > 0 ? $this->totalYearLevels / $this->students : 0;
        echo "Students: {$this->students}\n";
        echo "Faculty: {$this->faculty}\n";
        echo "Alumni: {$this->alumni}\n";
        echo "Total records: " . ($this->students + $this->faculty + $this->alumni) . "\n";
        echo "Average student year level: " . number_format($average, 2) . "\n";
    }
}