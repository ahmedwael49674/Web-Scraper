<?php
namespace App\Helpers;

class GeneralHelpers
{
    /**
     * get url host then explode it bases on dots
     * main domian name needed not complete host
     *
     * @param  String $url
     *
     * @return String (array[1] which is domain name)
    */
    public static function GetDomianName(String $url) :String
    {
        $host         =   parse_url($url,PHP_URL_HOST);
        $domianName   =   explode(".", $host);
        return $domianName[1];
    }
}

?>
