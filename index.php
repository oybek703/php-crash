<?php

class User
{

    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    function set_name($name)
    {
        $this->name = $name;
    }

    function get_name()
    {
        return $this->name;
    }

}

class Employee extends User
{
    public $title;

    public function __construct($name, $title)
    {
        parent::__construct($name);
        $this->title = $title;
    }


    function get_title()
    {
        return $this->title;
    }
}

$user1 = new User('Brad');
$emp1 = new Employee('John', 'Manager');
echo $emp1->title;