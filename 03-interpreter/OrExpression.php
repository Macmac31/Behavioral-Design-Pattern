<?php

class OrExpression implements Expression {
    public function __construct(private Expression $left, private Expression $right) {
    }

    public function interpret(StudentContext $context): bool {
        return $this->left->interpret($context) || $this->right->interpret($context);
    }
}