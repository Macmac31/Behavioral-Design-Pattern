<?php 


interface Visitor {
    public function visitStudent(Student $studfent): void;
    public function visitFaculty(Faculty $faculty): void;
    public function visitAlumni(Alumni $alumni): void;
}