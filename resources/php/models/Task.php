<?php
require_once __DIR__ . "/../error_report.php";
require_once __DIR__ . "/../interfaces/TaskInterface.php";
require_once __DIR__ . "/../abstract/BaseTask.php";
require_once __DIR__ . "/../traits/TimestampTrait.php";

class Task extends BaseTask
{
    use TimestampTrait;

    private bool $completed;
    public static $stat = "static property";

    public function __construct(string $id, string $title, bool $completed = false)
    {
        # parent constructor does not get called automatically if child define its own constructor method, we've to called it explicitly
        parent::__construct($id, $title);

        $this->completed = $completed;
    }

    public function isCompleted(): bool
    {
        return $this->completed;
    }
    public function accessParent(): void
    {
        // echo parent::getTitle();
        //calling the constant in parent class
        // parent can call constants and implementation from parent class, but not methods
        echo parent::EXACT;
        echo "\n" . parent::lowerCase;
    }

    public function toArray(): array
    {

        return [
            "id" => $this->id,
            "title" => $this->title,
            "completed" => $this->completed,
            "created_at" => $this->createdAt(),
        ];

        throw new \Exception('Not implemented');
    }
}


$task = new Task("1", "PHP Progress");
// echo $task->getTitle();
// echo $task->isCompleted();
$task->accessParent();
