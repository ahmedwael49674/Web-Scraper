<?php

namespace App\Interfaces;

interface FileInterface
{
    /**
     * write loop key as counter for links
     *
     * @param  Array $Links
     * @param  String $url
     *
    */
    public function save(Array $Links, String $url);
}

?>
