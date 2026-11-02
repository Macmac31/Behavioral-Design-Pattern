<?php 

interface Expression {
    public function interpret(StudentContext $context): bool;
}