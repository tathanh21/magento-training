<?php

namespace Ecommage\ThanhEx2\Plugin;

class Examplec{
    public function beforeSetTitle(\Ecommage\ThanhEx2\Controller\Plugin\Example $subject, $title)
    {
        $title = $title . " to c";
        echo __METHOD__ . "</br>";

        return $title;
    }

    public function afterGetTitle(\Ecommage\ThanhEx2\Controller\Plugin\Example $subject, $result)
    {

        echo __METHOD__ . "</br>";
        return '<h1>'. $result . 'Ecommage.com c' .'</h1>';

    }
    public function aroundGetTitle(\Ecommage\ThanhEx2\Controller\Plugin\Example $subject, callable $proceed)
    {

        echo __METHOD__ . " - Before proceed(c) </br>";
        $result = $proceed();
        echo __METHOD__ . " - After proceed(c) </br>";


        return $result;
    }
}
