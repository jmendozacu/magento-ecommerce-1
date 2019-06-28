<?php

namespace SimplifiedMagento\FirstModule\Model;

use SimplifiedMagento\FirstModule\Api\BrightnessInterface;


/**
 * Class Medium
 * @package SimplifiedMagento\FirstModule\Model
 */
class Medium implements BrightnessInterface {

    /**
     * @return string
     */
    public function getBrightness(){
        return "Medium";
    }
}



