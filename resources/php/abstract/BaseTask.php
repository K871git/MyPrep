<?php

abstract class BaseTask implements TaskInterface
{
    # this class and child class access it, outside code cannot access properties
    protected string $id;
    protected string $title;

    public function __construct()
    {
        throw new \Exception('Not implemented');
    }
    
}
