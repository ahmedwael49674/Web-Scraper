<?php

namespace App\service\indexLinkes;

use App\Interfaces\LinksInterface;

class akoam implements LinksInterface
{
    public $startFrom = 1;
    public $addPerPage = 1;

    /**
     * index links from given body using specified regex pattern
     *
     * @param  String $body
     *
     * @return Array
    */
    public function index(string $body): Array
    {
        preg_match_all("/'([^']+)'>تحميل مباشر/", $body, $match);
        return $match[1];
    }
}
