<?php
include_once __DIR__ . "/../error_report.php";
class TestConst
{
    private $instance = null;

    private function __construct()
    {
        echo "Constructor created";
    }

    public static function accConst()
    {
        if (self::$instance === null) {
            self::$instance = new TestConst();
        }
        return self::$instance;
    }
}

$ob1 = TestConst::accConst();
