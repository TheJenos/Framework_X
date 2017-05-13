<?php

include_once 'Basic/Tag.php';

class Div extends Tag {

    public function __construct($HTML ="") {
        parent::__construct("div");
        $this->setInner_HTML($HTML);
    }

}
