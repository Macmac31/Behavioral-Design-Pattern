<?php 
class StudentAffairsHandler extends Handler {
    private array $handled = ['Good Moral Certificate'];
    protected function canHandle(StudentRequest $request): bool {
        return in_array($request->getType(), $this->handled, true);
    }
    protected function getName(): string {
        return 'Student Affairs';
    }
}