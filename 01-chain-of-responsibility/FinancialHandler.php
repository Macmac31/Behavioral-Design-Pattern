<?php
class FinancialHandler extends Handler {
        private array $handled = ['Tuition Clearance'];
        protected function canHandle(StudentRequest $request): bool {
            return in_array($request->getType(), $this->handled, true);
        }
        protected function getName(): string {
            return 'Finance';
        }
    }