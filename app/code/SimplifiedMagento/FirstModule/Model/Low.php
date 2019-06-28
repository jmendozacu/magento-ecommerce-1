<?php

namespace SimplifiedMagento\FirstModule\Model;

use SimplifiedMagento\FirstModule\Api\BrightnessInterface;

/**
 * Class Small
 * @package SimplifiedMagento\FirstModule\Model
 */
class Low implements BrightnessInterface {

    /**
     * @return string
     */
    public function getBrightness(){
        return "Low";
    }
}



