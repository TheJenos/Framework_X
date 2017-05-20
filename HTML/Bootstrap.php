<?php

include_once 'Link.php';

class Bootstrap {

    public $Page = null;

    public function __construct($DOM) {
        $this->Page = $DOM;
        $this->Page->addToHead(new Link("https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"));
        $this->Page->addToHead(new Link("https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"));
        $this->Page->addToHead(new Script("https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"));
    }

}
