<?php

namespace SimplifiedMagento\FirstModule\Model;

use SimplifiedMagento\FirstModule\Api\ColorInterface;
use SimplifiedMagento\FirstModule\Api\BrightnessInterface;



/**
 * Class Yellow
 * @package SimplifiedMagento\FirstModule\Model
 */
class Yellow implements ColorInterface{


    protected $brightness;

    /**
     * Yellow constructor.
     * @param BrightnessInterface $brightness
     */
    public function __construct(BrightnessInterface $brightness){
        $this->brightness = $brightness;
    }

    /**
     * @return mixed|string
     */
    public function getColor(){
        return "Yellow";
    }
}



