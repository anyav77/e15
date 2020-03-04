<?php

class Student
{
    private $id;
 
    public function __construct($id)
    {
        $this->id = $id;
    }
    
    public function getId()
    {
        return $id;
    }
}
