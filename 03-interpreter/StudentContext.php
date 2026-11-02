<?php 
class StudentContext {
    public function __construct(private array $data) {

    }
    public function get(string $field): mixed {
        return $this->data[strtoupper($field)] ?? null;
    }
    public function getName(): string {
        return $this->data['NAME'] ?? 'Unknown';
    }
}