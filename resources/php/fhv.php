<?php

class Animal
{
    public function eat(): void
    {
        echo "animal : Eating \n";
    }
}

class Dog extends Animal
{
    public function Bark(): void
    {
        echo "Dog : Barking \n";
    }
}

class Cat extends Animal
{
    public function Meow(): void
    {
        echo "Cat : Sleeping \n";
    }
}


$d = new Dog();
$c = new Cat();

$d->eat();
$d->Bark();
echo "------------------------\n";
$c->eat();
$c->Meow();
