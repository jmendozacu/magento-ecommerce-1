<?php

namespace SimplifiedMagento\FirstModule\Model;

/**
 * Class Small
 * @package SimplifiedMagento\FirstModule\Model
 */
class Student {

    protected $name;
    protected $age;
    protected $marks;

    public function __construct($name= "prabhat",
                                $age=24,
                                array $marks = array('Maths'=> 93, 'Science' => 92, "Geograpy" => 73))
    {
        $this->name = $name;
        $this->age = $age;
        $this->marks = $marks;
    }

    /**
     * @return string
     */
    public function getStudentDetails(){
        return "My name is ".$this->name." and my age is ".$this->age;
    }
}



