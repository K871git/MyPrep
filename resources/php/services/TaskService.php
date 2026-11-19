<?php
require_once __DIR__ . "/../error_report.php";
require_once __DIR__ . "/../models/Task.php";
require_once __DIR__ . "/../exceptions/ValidationException.php";
$tasks_path = __DIR__ . "/../tasks.json";

class TaskService
{
    private string $file;

    public function __construct()
    {
        $this->file = __DIR__ . "/../tasks.json";

        if (!file_exists($this->file)) {
            file_put_contents($this->file, '[]');
        }
    }

    public function getAll(): array
    {
        $data = json_decode(file_get_contents($this->file), true);

        return is_array($data) ? $data : [];
    }
}

$test = new TaskService();
echo json_encode($test->getAll(), JSON_PRETTY_PRINT);
