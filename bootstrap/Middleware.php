<?php


namespace Core;

abstract class Middleware implements MiddlewareInterface
{
    private $nextHandler;

    /**
     * @param mixed $nextHandler
     * @return Middleware
     */
    public function setNextHandler($nextHandler)
    {
        $this->nextHandler = $nextHandler;
        return $this;
    }

    public function setNext(MiddlewareInterface $handler): MiddlewareInterface
    {

        $this->setNextHandler($handler);
        return $handler;
    }

    private function implementHandler()
    {
        $handler = MiddlewareEngine::handler(get_class($this));
        if ($handler){
            $this->setNext($handler);
        }else{
            $this->setNextHandler(null);
        }
    }

    public function handle(Request $request){
        $this->implementHandler();
        if ($this->nextHandler) {
            return $this->nextHandler->handle($request);
        }

        return null;
    }
}