<?php

namespace App\Interfaces;

interface ScraperInterface
{
    /**
     * send request to given url
     *
     * @param  String $url
     *
     * @return String
    */
    public function sendRequest(String $url) :String;

    /**
     * save request links by calling
     * save function from given file object
     *
     *@param Array $Links
     *@param String $url
     *
    */
    public function save(Array $Links, String $url);
}

?>
