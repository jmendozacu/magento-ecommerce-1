<?php

namespace SimplifiedMagento\FirstModule\Model;

use SimplifiedMagento\FirstModule\Api\PencilInterface;
use SimplifiedMagento\FirstModule\Api\ColorInterface;
use SimplifiedMagento\FirstModule\Api\SizeInterface;


/**
 * Class Pencil
 * @package SimplifiedMagento\FirstModule\Model
 */
class Pencil implements PencilInterface{

    /**
     * @var ColorInterface
     */
    protected $color;
    /**
     * @var SizeInterface
     */
    protected $size;

    protected $name;

    protected $school;

    /**
     * Pencil constructor.
     * @param ColorInterface $color
     * @param SizeInterface $size
     */
    public function __construct(ColorInterface $color, SizeInterface $size, $name= null, $school= null)
    {
        $this->color = $color;
        $this->size = $size;
        $this->name = $name;
        $this->school = $school;
    }

    /**
     * @return mixed|string
     */
    public function getPencilType(){
        return "color ".$this->color->getColor()."and size is".$this->size->getSize()."of the pencil";
    }
}



