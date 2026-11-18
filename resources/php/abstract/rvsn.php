<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
abstract class Rvsn
{
    public function checkList(array $checkList): string
    {
        echo json_encode($checkList, JSON_PRETTY_PRINT);
        return "\ncheckList recieved \n";
    }

    abstract public function printArray(array $checkList): bool; # this method must implemented by child class

}

class Givearr extends Rvsn
{
    # must implement this method
    public function printArray(array $checkList): bool
    {
        echo "\n Printing Array from GiveArr \n";
        echo "Your checkList is " . "\n";
        echo json_encode($checkList, JSON_PRETTY_PRINT);
        return true;
    }
}

$gar = new Givearr();

$ar = ["starship", "deathstar", "deathray", "Tsar"];
$gar->checkList($ar);
$gar->printArray($ar);
# invalid as abstract classes cannot be instansiate
$ab = new Rvsn();
$ab->checkList($ar);
