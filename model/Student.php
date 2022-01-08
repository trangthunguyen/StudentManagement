<?php
namespace Model;

class Student
{
    public $id;
    public $name;
    public $studentID;
    public $classID;
    public $gender;
    public $email;
    public $phone;
    public $address;
    public $photo;

    public function __construct($id, $name,	$studentID,	$classID, $gender, $email, $phone, $address, $photo)
    {
        $this->id = $id;
        $this->name = $name;
        $this->studentID = $studentID;
        $this->classID = $classID;
        $this->gender = $gender;
        $this->email = $email;
        $this->phone = $phone;
        $this->address = $address;
        $this->photo = $photo;
    }

    public function __construct($name,	$studentID,	$classID, $gender, $email, $phone, $address, $photo)
    {
        $this->name = $name;
        $this->studentID = $studentID;
        $this->classID = $classID;
        $this->gender = $gender;
        $this->email = $email;
        $this->phone = $phone;
        $this->address = $address;
        $this->photo = $photo;
    }
}