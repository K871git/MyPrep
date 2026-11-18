<?php

# class must provide all these methods
interface TaskInterface
{
    public function getId(): string;

    public function getTitle(): string;

    public function toArray(): array;
}

// class Animal
// {
//     private $animal = "Platypus";

//     public function showAnimal(): string
//     {
//         return $this->animal;
//     }
// }


// class Bird extends Animal
// {

//     public function check(): void
//     {
//         echo $this->showAnimal();
//     }
// }

// $animal = new Animal();
// // echo $animal->showAnimal();

// $bird = new Bird();
// $bird->check();
// var_dump($bird);


# Access Modifiers 

# Public : access from anywhere

# Protected :   - access from class where it declared 
//              - can assess props and methods from child class
//              - cannot access outside

# Private :   - access only from class where it declared 
//              - cannot assess props and methods from child class as well as outside the class
# Use public methods to provide safe access to private or protected data.

# Abstract class is genric class and make code reusable and also provide the methods implementation for common and resuable methods
# abstract methods must be implement and should provide method body by inherited child class, abstract method does not have method body, just decleration
