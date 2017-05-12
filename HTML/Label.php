<?php
include_once 'Basic/Tag.php';
class Label extends Tag{
    public $HTML_for ="";
    public function __construct($text) {
        parent::__construct("label");
        $this->setInner_HTML($text);
    }
    function getHTML_for() {
        return $this->HTML_for;
    }

    function setHTML_for($HTML_for) {
        $this->HTML_for = $HTML_for;
    }

}
