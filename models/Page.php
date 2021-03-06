<?php

namespace Models;

class Page
{
    public $url;
    public function __construct(){
        $this->url = new Url();
    }
//посчитать сколько страниц со студентами сгенерировать.
// Считаем кол-во записей, делим на 15(15 записей на страницу), есть остаток-> прибавляем ещё страницу.
    public function countPage()
    {
        $database = \Database::connectDb();
        $count_students = $database->count('info');
        $countPage = intval($count_students / 15);;
        if ($count_students % 15 > 0) {
            $countPage++;
        }
        return $countPage;
    }

    public function getLinkSort($page, $typeSort, $sort, $nameSort)
    {
        if (empty($sort) && empty($typeSort)) {
            $typeSort = "desc";
            return "<a href=\"" . $this->url->getHomeUrl() . "/list/{$page}/{$sort}/{$typeSort}\" class = \"page\">$nameSort</a>";
        } else {
            if ($typeSort == 'desc')
                $typeSort = 'asc';
            else $typeSort = 'desc';
            return "<a href=\"" . $this->url->getHomeUrl() . "/list/{$page}/{$sort}/{$typeSort}\" class = \"page\">$nameSort</a>";
        }
    }

    public function printLinkPage($sort, $typeSort)  //НЕ РЕТЮРНИМ, потому что вывод в цикле, пусть цикл будет здесь, а не в шаблоне.
    {
        $countPage = 0;
        $countPage = Page::countPage();

        if (empty($sort) && empty($typeSort)) {
            for ($i = 1; $i <= $countPage; $i++) {
                echo "<a href=\"" . $this->url->getHomeUrl() . "/list/{$i}\" class = \"page\">[{$i}] </a>";
            }
        } else
            for ($i = 1; $i <= $countPage; $i++) {
                echo "<a href=\"" . $this->url->getHomeUrl() . "/list/{$i}/{$sort}/{$typeSort}\" class = \"page\">[{$i}] </a>";
            }
    }
}