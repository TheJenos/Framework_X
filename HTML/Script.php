<?php

include_once 'Basic/Tag.php';

class Script extends Tag {

    public $HTML_src = "";

    function getsrc() {
        return $this->HTML_src;
    }
    
    function setsrc($HTML_src) {
        $this->HTML_src = $HTML_src;
    }

    public function __construct($url="") {
        parent::__construct("script",NULL,TRUE);
        $this->HTML_src = $url;
    }
    
    public function addFunction($para,$script){
        $key = "function_" .random_int(0, 999999999) . "$$" . random_int(0, 999999999);
        $this->addText("\nfunction ".$key."(".$para."){\n"
                . "".$script."\n"
                . "}\n");
        return $key;
    }

}
