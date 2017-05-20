<?php

include_once 'Input.php';

class Button extends Input {

    public function __construct($text = "") {
        parent::__construct();
        $this->settype("Button");
        $this->setvalue($text);
    }

}
