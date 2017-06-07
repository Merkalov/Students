<?php

namespace Models;
use Models\Url;
use Models\Page;

class View
{
    public $page;
    public function __construct()
    {
        $this->page = new Page;
        $this->url = new Url();
    }

    public function _render($template, $params = [])
    {
        ob_start();
        extract($params, EXTR_SKIP);
        include (ROOT.'/views/'.$template.'.php');
        $content = ob_get_contents();
        ob_end_clean();
        echo $content;
    }
}
