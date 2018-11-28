<?php

namespace App\factories;

class LinksFactory
{
     /**
     * using polymorphism and abstract factory design pattern
     * create an object from indexLinkes classess
     *
     * @param  String $domain
     *
     * @return object
    */
    public function create(String $domain) :Object
    {
        $class  =   'App\\service\\indexLinkes\\'.$domain;
        return new $class;
    }
}
