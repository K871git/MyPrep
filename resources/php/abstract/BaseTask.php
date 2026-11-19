<?php
include_once __DIR__ . "/../error_report.php";
include_once __DIR__ . "/../interfaces/TaskInterface.php";

abstract class BaseTask implements TaskInterface
{
    # this class and child class access it, outside code cannot access properties
    protected string $id;
    protected string $title;

    # static property
    // public static string $name;
    public const EXACT = "constant prop";
    public const lowerCase = 'Its Lowercase cosntant';
    public function __construct(string $id, string $title)
    {
        $this->id = $id;
        $this->title = $title;
        // self::$name = $name;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    // public static function getStatVal(): string
    // {
    //     return self::$name;
    // }
    abstract public function toArray(): array;
}
