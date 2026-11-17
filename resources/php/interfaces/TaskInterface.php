<?php

# class must provide all these methods
// interface TaskInterface
// {
//     public function getId(): string;

//     public function getTitle(): string;

//     public function toArray(): array;
// }

class Animal
{
    private $animal = "Platypus";

    public function showAnimal(): string
    {
        return $this->animal;
    }
}


class Bird extends Animal
{

    public function check(): void
    {
        echo $this->showAnimal();
    }
}

$animal = new Animal();
// echo $animal->showAnimal();

$bird = new Bird();
$bird->check();
var_dump($bird);
