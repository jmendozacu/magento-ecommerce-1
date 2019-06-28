<?php


namespace SimplifiedMagento\FirstModule\Plugin;


class Plugin1Solutions
{
    public function beforeExecute(\SimplifiedMagento\FirstModule\Controller\Page\HelloWorld $subject){
        echo "Before execute sort order 20<br>";
    }

    public function afterExecute(\SimplifiedMagento\FirstModule\Controller\Page\HelloWorld $subject){
        echo "After execute sort order 20<br>";
    }

    public function aroundExecute(\SimplifiedMagento\FirstModule\Controller\Page\HelloWorld $subject, callable $proceed){
        echo "Before proceed sort order 20<br>";
        $proceed();
        echo "After proceed sort order 20<br>";

    }

}