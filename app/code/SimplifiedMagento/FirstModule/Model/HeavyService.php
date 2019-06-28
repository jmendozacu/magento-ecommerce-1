<?php


namespace SimplifiedMagento\FirstModule\Model;


class HeavyService
{
    public function __construct()
    {
        echo "Heavy service has been initialized<br>";
    }

    public function heavyServiceMessage(){
        echo "Heavy service classs<br>";
    }

}