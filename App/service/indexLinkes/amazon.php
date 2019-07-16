<?php

namespace App\service\indexLinkes;

use App\Interfaces\LinksInterface;

class amazon implements LinksInterface
{    
    public $startFrom = 1;
    public $addPerPage = 1;

    /**
     * index links from given body using specified regex pattern
     * links are incomplete concatenate host to genrate complete link
     *
     * @param  String $body
     *
     * @return Array
    */
    public function index(String $body): Array
    {
        preg_match_all('/<a class="a-link-normal" href="([^"]+)"/', $body, $match);
         $links      =  (array_map(function ($url){
                             return "https://www.amazon.com/".$url;
                         }, $match[1])); 
        return $links;
    }
}
