<?php

include_once 'Basic/Tag.php';

class Script extends Tag {

    public $HTML_src = "";

    function getHTML_src() {
        return $this->HTML_src;
    }

    function setHTML_src($HTML_src) {
        $this->HTML_src = $HTML_src;
    }

    public function __construct($url) {
        parent::__construct("script",NULL,TRUE);
        $this->HTML_src = $url;
    }

}
