<?php

class Url
{
    public static function getHomeUrl(){
    return 'http://'.$_SERVER['SERVER_NAME'];
    }
}