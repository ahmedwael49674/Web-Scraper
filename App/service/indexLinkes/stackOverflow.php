<?php

namespace App\service\indexLinkes;

use App\Interfaces\LinksInterface;

class stackOverflow implements LinksInterface
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
        preg_match_all('/<h3><a href="\/([^>"]+)/', $body, $match);
         $links      =  (array_map(function ($url){
                             return "https://stackoverflow.com/".$url;
                         }, $match[1])); 
        return $links;
    }
}
