<?php 

class PDFReportVisitor implements Visitor {
    public function visitStudent(Student $student): void
    {
        echo "PDF generated: student_{$student->getId()}.pdf ({$student->getName()})\n";
    }

    public function visitFaculty(Faculty $faculty): void
    {
        echo "PDF generated: faculty_{$faculty->getId()}.pdf ({$faculty->getName()})\n";
    }

    public function visitAlumni(Alumni $alumni): void
    {
        echo "PDF generated: alumni_{$alumni->getId()}.pdf ({$alumni->getName()})\n";
    }
}