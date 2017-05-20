<?php

include_once 'Link.php';

class AngulerJS {

    public $Page = null;

    public function __construct($DOM) {
        $this->Page = $DOM;
        $this->Page->addToHead(new Script("https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"));
        $init = new Script();
        $init->setInner_HTML('var app = angular.module("phpapp", []);');
        $this->Page->addToHead($init);
        $this->Page->getBody()->setJS_app("phpapp");
    }

}
