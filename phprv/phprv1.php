<?php
 require_once __DIR__ . "/../database/debug_config.php";
 # __DIR__ gives an absolute directory path of current file 
 
 # "C:\WINDOWS\Temp\php-8.3.36_errors.log : PHP ERROR LOG FILE
 
// explain mysqli_report_error and mysqli_report_strict
// mysqli_report_error : configure the error reporting 
// when mysql throws an error that time if error is not reported then it return false, but with mysqli_report_error, error get displayed
// both conbined : mysqli_report_error | mysqli_report_strict ( this get catched into the sql_exceptions in try and catch)

// difference betwwen
# EOL is not work in browser output where it works in termainal and text formatting php as backend
# where <br> is working in browser
# 
// $name = "Printing name".PHP_EOL;
// echo $name.PHP_EOL;
// print($name.PHP_EOL);
// print_r($name.PHP_EOL);

// echo "<br>";

// echo $name . "<br>";
// print($name . "<br>");
// print_r($name . "<br>");

// $string = "This is an" . PHP_EOL . " string";
// echo $string;
// print_r($string);


