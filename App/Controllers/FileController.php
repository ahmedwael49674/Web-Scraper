<?php

namespace App\Controllers;

use App\Interfaces\FileInterface;

class FileController implements FileInterface
{
    protected $file;

    public function __construct($file)
    {
        file_put_contents($file, ''); //formate file
        $this->file = fopen($file, "a"); //open file
    }

    /**
     * write the given url before links
     *
     * @param  String $url
     *
    */
    private function setHeader(String $url)
    {
        fwrite($this->file, 'Page having url '.$url.' has this links');
        $this->newLine();
    }

    /**
     * write loop key as counter for links
     *
     * @param  Int $key
     *
    */
    private function counter(Int $key)
    {
        fwrite($this->file, $key.' - ');
    }

    /**
     * write loop key as counter for links
     *
     * @param  Array $Links
     * @param  String $url
     *
    */
    public function save(Array $Links, String $url)
    {
        $this->setHeader($url);
        $this->storeInFile($Links);
    }

    /**
     * store the given link in opened file
     *
     * @param  String $Link
     *
    */
    private function storeLink(String $link)
    {
        fwrite($this->file,$link);
    }

    /**
     * write line break
     *
    */
    private function newLine(){
        fwrite($this->file, "\n");
    }

    /**
     * loop over links call counter and store links
     *
     * @param  Array $Links
     *
    */
    private function storeInFile(Array $links)
    {
        foreach($links as $key=>$link){
            $key++; //start from 1
            $this->counter($key);
            $this->storeLink($link);
            $this->newLine();
        }
        $this->newLine();
    }
}

?>
