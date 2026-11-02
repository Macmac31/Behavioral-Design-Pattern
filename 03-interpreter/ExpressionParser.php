<?php

class ExpressionParser {
    private array $tokens= [];
    private int $pos = 0;
    public function parse(string $input): Expression {
        preg_match_all('/"[^"]*"|\d+|[A-Za-z_]+|=/', $input, $matches);
        $this->tokens= $matches[0];
        $this->pos = 0;
        $expression = $this->parseOr();
        if ($this->pos < count($this->tokens)) {
            throw new InvalidArgumentException("Unexpected token: " . $this->tokens[$this->pos]);
        }
        return $expression;
    }
    private function parseOr(): Expression
    {
        $left = $this->parseAnd();
        while ($this->peek() === 'OR') {
            $this->pos++;                                 
            $left = new OrExpression($left, $this->parseAnd());
        }
        return $left;
    }

    private function parseAnd(): Expression
    {
        $left = $this->parseTerm();
        while ($this->peek() === 'AND') {
            $this->pos++;                              
            $left = new AndExpression($left, $this->parseTerm());
        }
        return $left;
    }

    private function parseTerm(): Expression
    {
        $field = $this->next();
        if ($this->next() !== '=') {
            throw new InvalidArgumentException("Expected '=' after $field");
        }
     
        $value = trim($this->next(), '"');
        return new TerminalExpression($field, $value);
    }

    private function peek(): ?string
    {
        return isset($this->tokens[$this->pos]) ? strtoupper($this->tokens[$this->pos]) : null;
    }

    
    private function next(): string
    {
        if (!isset($this->tokens[$this->pos])) {
            throw new InvalidArgumentException("Unexpected end of expression");
        }
        return $this->tokens[$this->pos++];
    }
}