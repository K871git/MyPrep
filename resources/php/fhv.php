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

class Cat extends Dog
{
    public function Meow(): void
    {
        echo "Cat : Sleeping \n";
    }
}

# multilevel inheritance
// parent_class->sub_parent_class->sub2_parent_class->child_class

// $d = new Dog();
// $c = new Cat();

// $d->eat();
// $d->Bark();
// echo "------------------------\n";
// $c->eat();
// $c->Meow();

// class multiple extends Animal, Dog # invalid
// {}

# diamond problem

/**
 *         Animal
       /      \
   Walker    Swimmer
       \      /
         Duck
 * 
 */