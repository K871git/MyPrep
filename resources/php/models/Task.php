<?php
require_once __DIR__ . "/../error_report.php";
require_once __DIR__ . "/../interfaces/TaskInterface.php";
require_once __DIR__ . "/../abstract/BaseTask.php";
require_once __DIR__ . "/../traits/TimestampTrait.php";

class Task extends BaseTask
{
    use TimestampTrait;

    private bool $completed;

    public function __construct(string $id, string $title, bool $completed = false) {
        
    // parent::__construct
    }

    public function toArray(): array
    {
        throw new \Exception('Not implemented');
    }
}
