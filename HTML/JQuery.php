<?php

include_once 'Link.php';

class JQuery {

    public $Page = null;

    public function __construct($DOM) {
        $this->Page = $DOM;
        $this->Page->addToHead(new Script("https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"));
    }

}
