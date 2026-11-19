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
        $this->file = __DIR__ . '/../tasks.json';

        if (!file_exists($this->file)) {
            file_put_contents($this->file, '[]');
        }
    }

    // READ ALL
    public function getAll(): array
    {
        $data = json_decode(
            file_get_contents($this->file),
            true
        );

        return is_array($data) ? $data : [];
    }

    // CREATE
    public function create(string $title): array
    {
        $title = trim($title);

        if ($title === '') {
            throw new ValidationException("Title is required");
        }

        $tasks = $this->getAll();

        $task = new Task(
            bin2hex(random_bytes(8)),
            $title
        );

        $tasks[] = $task->toArray();

        $this->save($tasks);

        return $task->toArray();
    }

    // SEARCH
    public function search(string $keyword): array
    {
        $tasks = $this->getAll();

        return array_values(array_filter(
            $tasks,
            function ($task) use ($keyword) {
                return stripos(
                    $task['title'],
                    $keyword
                ) !== false;
            }
        ));
    }

    // FILTER COMPLETED
    public function completed(): array
    {
        $tasks = $this->getAll();

        return array_values(array_filter(
            $tasks,
            fn($task) => $task['completed'] === true
        ));
    }

    // SORT ALPHABETICALLY
    public function sortTasks(): array
    {
        $tasks = $this->getAll();

        usort($tasks, function ($a, $b) {
            return strcmp($a['title'], $b['title']);
        });

        return $tasks;
    }

    // SAVE DATA
    private function save(array $tasks): void
    {
        $json = json_encode(
            $tasks,
            JSON_PRETTY_PRINT
        );

        if (
            $json === false ||
            file_put_contents($this->file, $json, LOCK_EX) === false
        ) {
            throw new RuntimeException("Unable to save tasks");
        }
    }
}
