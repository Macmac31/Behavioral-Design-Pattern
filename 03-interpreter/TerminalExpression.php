<?php
class TerminalExpression implements Expression {
    public function __construct(private string $field, private string $value) {

    }
    public function interpret (StudentContext $context): bool {
         return (string) $context->get($this->field) === $this->value;
    }
}