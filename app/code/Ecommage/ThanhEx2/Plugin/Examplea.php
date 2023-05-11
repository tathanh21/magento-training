<?php

namespace Ecommage\ThanhEx2\Plugin;

class Examplea{
    public function beforeSetTitle(\Ecommage\ThanhEx2\Controller\Plugin\Example $subject, $title)
    {
        $title = $title . " to a ";
        echo __METHOD__ . "</br>";

        return $title;
    }

    public function afterGetTitle(\Ecommage\ThanhEx2\Controller\Plugin\Example $subject, $result)
    {

        echo __METHOD__ . "</br>";

        return '<h1>'. $result . 'Ecommage.com a' .'</h1>';

    }
    public function aroundGetTitle(\Ecommage\ThanhEx2\Controller\Plugin\Example $subject, callable $proceed)
    {

        echo __METHOD__ . " - Before proceed(a) </br>";
        $result = $proceed();
        echo __METHOD__ . " - After proceed(a) </br>";


        return $result;
    }
}
