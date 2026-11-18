<?php
include_once __DIR__ . "/../error_report.php";

trait TimestampTrait
{
    public function createdAt(): string
    {
        return date('Y-m-d H:i:s A');
    }
}