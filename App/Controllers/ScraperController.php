<?php

namespace App\Controllers;

use App\Interfaces\{FileInterface,ScraperInterface};
use GuzzleHttp\Client;

class ScraperController implements ScraperInterface
{
    protected $client;
    protected $response;
    protected $extractor;
    protected $file;

    public function __construct(FileInterface $file,String $url)
    {
        $this->file      = $file; //create object from given controller using constructor injection

        $origin         =   parse_url($url, PHP_URL_SCHEME).'//'.parse_url($url, PHP_URL_HOST);
        $host           =   parse_url($url, PHP_URL_HOST);
        $headers =   [
            "User-Agent"                => "Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:47.0) Gecko/20100101 Firefox/47.0",
            "Accept-Language"	        => "en-US,en;q=0.5",
            "Cache-Control"	            => "max-age=0",
            "Connection"	            => "keep-alive",
            "Accept-Encoding"	        => "gzip",
            "origin"	                => $origin,
            "Host"	                    => $host,
        ];
        $this->client = new Client([
            'headers' => $headers,
            //'proxy'   => '88.149.203.30:46909',
        ]);
    }

    /**
     * send request to given url
     *
     * @param  String $url
     *
     * @return String
    */
    public function sendRequest(String $url) :String
    {
        $this->response =   $this->client->get($url);
        return $this->checkResponse();
    }

    /**
     * check request resposonse
     *
     *
     * @return String
    */
    private function checkResponse() :String
    {
        return $this->response->getStatusCode() == 200 ? $this->getBody() : die('Error: unsuccessful request');
    }

    /**
     * get request html content (body)
     *
     *
     * @return String
    */
    private function getBody() :String
    {
       return  $this->response->getBody()->getContents();
    }

    /**
     * get request html content (body)
     *
     * @param String $body
     *
     * @return Bool
    */
    public function CheckNext(String $body) :Bool
    {
        preg_match_all('/<li .*class=".*next*./',$body,$match);
        return empty($match[0])?false:true;
    }

    /**
     * save request links by calling
     * save function from given file object
     *
     *@param Array $Links
     *@param String $url
     *
    */
    public function save(Array $Links, String $url)
    {
        return $this->file->save($Links,$url);
    }
}

?>
