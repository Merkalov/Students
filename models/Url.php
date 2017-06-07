<?php
namespace Models;
class Url
{
    public function getHomeUrl(){
        return 'http://'.$_SERVER['SERVER_NAME'];
    }

    public function _redirect($url, $status){
        ob_start();
        header("Location: /{$url}");
        header("HTTP/1.0 {$status}");
        ob_end_flush();
    }
}