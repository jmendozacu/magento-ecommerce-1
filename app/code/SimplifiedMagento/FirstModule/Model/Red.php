<?php

namespace SimplifiedMagento\FirstModule\Model;

use SimplifiedMagento\FirstModule\Api\ColorInterface;
use SimplifiedMagento\FirstModule\Api\BrightnessInterface;

/**
 * Class Red
 * @package SimplifiedMagento\FirstModule\Model
 */
class Red implements ColorInterface{

    protected $brightness;

    /**
     * Red constructor.
     * @param BrightnessInterface $brightness
     */
    public function __construct(BrightnessInterface $brightness)
    {
        $this->brightness = $brightness;
    }

    /**
     * @return mixed|string
     */
    public function getColor(){
        return "Red";
    }
}



