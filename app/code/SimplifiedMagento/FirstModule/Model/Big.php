<?php

namespace SimplifiedMagento\FirstModule\Model;

use SimplifiedMagento\FirstModule\Api\SizeInterface;

/**
 * Class Big
 * @package SimplifiedMagento\FirstModule\Model
 */
class Big implements SizeInterface{

    /**
     * @return string
     */
    public function getSize(){
        return "Big";
    }
}



