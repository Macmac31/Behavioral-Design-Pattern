<?php 
class RegistrarHandler extends Handler {
    private array $handled = ['Certificate of Enrollment', 'Transcript of Records'];
    protected function canHandle(StudentRequest $request): bool {
        return in_array($request->getType(), $this->handled, true); 
    }
    protected function getName(): string {
        return 'Registrar';
    }
}