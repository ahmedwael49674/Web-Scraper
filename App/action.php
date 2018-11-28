<?php

require '../vendor/autoload.php';

use App\Controllers\{ScraperController,FileController};
use App\Helpers\GeneralHelpers;
use App\factories\LinksFactory;

if (isset($_POST['submit']) && $_POST['url']) //ensure that request came from index page form
{
    $url                 =   $_POST['url'];
    $scraper             =   new ScraperController(new FileController('links.txt'),$url);
    $domain              =   GeneralHelpers::GetDomianName($url); //generate domian name form url
    $next                =   true;
    $page                =   1;

    $LinksFactory        =   new LinksFactory();
    $domianableObject    =   $LinksFactory->create($domain); //create object using domianable name (polymorphism)

    while($next)
    {
        $body            =   $scraper->sendRequest($url.$page);
        $links           =   $domianableObject->index($body);
        $scraper->save($links,$url.$page);
        $next            =   $scraper->CheckNext($body);
        $page ++;
    }

    header("location: links.txt");
}
die("Error : invalid scraping operation");

?>
