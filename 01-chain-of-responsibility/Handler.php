<?php 
abstract class Handler {
    private ?Handler $next = null;
    public function setNext(Handler $next): Handler {
        $this->next = $next;
        return $next;
    }

    public function handle(StudentRequest $request): void {
        if($this->canHandle($request)) {
            $this->process($request);
            return;
        }
        echo $this->getName() . ": Cannot Process request.\n";
        if ($this->next !== null) {
            $this->next->handle($request);
        } else {
            echo "End of chain: no office can process this request.\n";
        }
    }

    abstract protected function canHandle(StudentRequest $request): bool;
    abstract protected function getName(): string;

    protected function process(StudentRequest $request): void {
        echo $this->getName() . ": Processing " . $request->getType() . "...\n";
    }
}