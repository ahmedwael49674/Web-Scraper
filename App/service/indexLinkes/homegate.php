<?php

namespace App\service\indexLinkes;

use App\Interfaces\LinksInterface;

class homegate implements LinksInterface
{
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
        preg_match_all('/<*href="(.*mieten.\d{0,9})"/',$body,$match);
        $links      =    (array_map(function ($url){
                            return "https://www.homegate.ch".$url;
                        }, $match[1]));

        return $links;
    }
}
