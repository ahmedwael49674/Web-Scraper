# Web Scraper
![alt text](https://github.com/ahmedwael49674/webScraping/blob/master/analysis/view.jpg)
 
## Summary
web scraper used to send requests and get the HTML content of the page also provide paginate over pages feature from the UI choose the start and the end page and the system will loop over the pages then filter it using regex to get a specified part then store it in the file .

## Used techniques
1. php
2. Guzzle package
3. Regex

## Description
in the index page, I asked the user to choose website I send the target link as value to action page using a post request 

1. action:  receive the target URL 
 1.1. get the main domain name using a GetDomianName method in GeneralHelpers </br>
 1.2. creating domianableObject using create method in LinksFactory </br>
 1.3. looping while next equal true 
     * send request 
     * get links from the request body 
     * save links in the file 
     * check if the next page exists 
     * move to the next page by adding 1  to the last number in URL 0 </br>
1.4. move to the links page after the loop

2. interfaces folder: contain to interfaces they are like a blueprint to the controllers which implements them

3. controllers folder: contain two controllers
* ScraperController: using constructor injection create an object from FileController the action page called sendRequest method which  sends guzzle HTTP  request then called checkResponse method which ensures the status code 200 then called the method getBody which get the source code from the request , returning to action page which called getLinks method which uses regex to only links with id as you ask for returning again to action page which called save method passing the URL and the links to it save method called the save method on FileController.
* FileController: first open the file passed from action page going to the save method which at first called set header then storeInFile which store the links in the given file.

4. LinksFactory: using polymorphism and abstract factory design pattern create an object from indexLinkes classes 

5. service\indexLinkes folder: contain two files which have main domain name as name each file have index function which receive the HTML body get the specific links using regex method preg_match_all return an array of links that prepared to store.

6. GeneralHelpers: has static method GetDomianName which the action page use to get the main domain name.

## class diagram 
 ![alt text](https://github.com/ahmedwael49674/webScraping/blob/master/analysis/Class%20diagram.jpg)
 
 ## sequence  diagram 
 ![alt text](https://github.com/ahmedwael49674/webScraping/blob/master/analysis/sequence%20diagram.jpg)
 
## How to run
1. Git Clone the project
2. Composer install
  
