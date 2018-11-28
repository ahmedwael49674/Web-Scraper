<?php

namespace App\Interfaces;

interface LinksInterface
{
    /**
     * index links from given body
     *
     * @param  String $body
     *
     * @return Array
    */
    public function index(string $body) :Array;
}

?>
