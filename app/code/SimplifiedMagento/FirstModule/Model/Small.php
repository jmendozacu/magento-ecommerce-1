<?php

namespace SimplifiedMagento\FirstModule\Model;

use SimplifiedMagento\FirstModule\Api\SizeInterface;

/**
 * Class Small
 * @package SimplifiedMagento\FirstModule\Model
 */
class Small implements SizeInterface {

    /**
     * @return string
     */
    public function getSize(){
        return "Small";
    }
}



