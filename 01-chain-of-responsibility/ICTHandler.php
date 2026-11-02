<?php 
class ICTHandler extends Handler {
    private array $handled = ['Student ID Concern'];
    protected function canHandle(StudentRequest $request): bool {
        return in_array($request->getType(), $this->handled, true);
    }
    protected function getName(): string {
        return 'ICT';
    }
}