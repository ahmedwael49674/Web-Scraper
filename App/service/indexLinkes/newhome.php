<?php

namespace App\service\indexLinkes;

use App\Interfaces\LinksInterface;

class newhome implements LinksInterface
{
    /**
     * index links from given body using specified regex pattern
     *
     * @param  String $body
     *
     * @return Array
    */
    public function index(string $body): Array
    {
        preg_match_all('/href = "(.*id.*")"/',$body,$match);
        return $match[1];
    }
}
