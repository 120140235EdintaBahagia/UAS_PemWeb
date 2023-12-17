<?php

class Student
{

    public $name;
    public $age;
    public $gender;
    public $major;
    public $skills;

    public function __construct($name, $age, $gender, $major, $skills)
    {
        $this->name = $name;
        $this->age = $age;
        $this->gender = $gender;
        $this->major = $major;
        $this->skills = $skills;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getAge()
    {
        return $this->age;
    }
}
