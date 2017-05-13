<?php

class Tag {

    public $TAG_name = "";
    public $TAG_number = "";
    public $TAG_attrib = "";
    public $Inner_HTML = "";
    public $Inner_Tags = array();
    public $Class_Names = array();
    public $Style_List = array();
    public $TAG_HTML = "";
    public $HTML_id = "";
    public $HTML_name = "";
    public $HTML_class = "";
    public $HTML_style = "";
    public $TAG_Type = "";

    function getHTML_id() {
        return $this->HTML_id;
    }

    function getHTML_name() {
        return $this->HTML_name;
    }

    function getHTML_class() {
        return $this->HTML_class;
    }

    function setHTML_id($HTML_id) {
        $this->HTML_id = $HTML_id;
    }

    function setHTML_name($HTML_name) {
        $this->HTML_name = $HTML_name;
    }

    function setHTML_class($HTML_class) {
        $this->HTML_class = $HTML_class;
    }

    public function updateAttribs() {
        $this->updateClasses();
        $this->updateStyle();
        $array = get_object_vars($this);
        foreach ($array as $key => $value) {
            if (substr($key, 0, 5) == "HTML_" && strlen($value) > 0) {
                $this->TAG_attrib .= " " . substr($key, 5, strlen($key) - 4) . '="' . $value . '"';
            }
        }
    }

    public function updateClasses() {
        if (count($this->Class_Names) > 0) {
            $this->HTML_class = "";
            foreach ($this->Class_Names as $key => $value) {
                $this->HTML_class .= $value . " ";
            }
        }
    }

    public function updateStyle() {
        if (count($this->Style_List) > 0) {
            $this->HTML_style = "";
            foreach ($this->Style_List as $key => $value) {
                $this->HTML_style .= $key . ":" . $value . ";";
            }
        }
    }

    public function updateInnerHTML() {
        if (count($this->Inner_Tags) > 0) {
            foreach ($this->Inner_Tags as $key => $value) {
                    $value->updateHTML();
                    $this->Inner_HTML .= $value->getTAG_HTML();
            }
        }
    }

    public function addElement($tag) {
        $this->Inner_Tags[$tag->getTAG_number()] = $tag;
    }

    public function addText($text) {
        $this->setInner_HTML($text);
    }

    public function addStyle($style_name, $value) {
        $this->Style_List[$style_name] = $value;
    }

    public function addClass($Class) {
        array_push($this->Class_Names, $Class);
    }

    public function updateHTML() {
        $this->updateAttribs();
        $this->updateInnerHTML();
        if ($this->TAG_Type == null) {
            $this->TAG_HTML = "<" . $this->TAG_name . " " . $this->TAG_attrib . ">" . $this->Inner_HTML . "</" . $this->TAG_name . ">";
        } else {
            $this->TAG_HTML = "<" . $this->TAG_name . " " . $this->TAG_attrib . " />";
        }
    }

    public function __construct($TAG_name, $close = null, $id = null) {
        $this->TAG_name = $TAG_name;
        $this->TAG_Type = $close;
        $this->TAG_number = random_int(0, 999999999) . "##" . random_int(0, 999999999);
        if ($id == NULL)
            $this->HTML_id = $this->TAG_name . "_" . $this->TAG_number;
    }

    public function printTag() {
        echo $this->TAG_HTML;
    }

    function getTAG_name() {
        return $this->TAG_name;
    }

    function getTAG_attrib() {
        return $this->TAG_attrib;
    }

    function getInner_HTML() {
        return $this->Inner_HTML;
    }

    function getTAG_HTML() {
        return $this->TAG_HTML;
    }

    function setTAG_name($TAG_name) {
        $this->TAG_name = $TAG_name;
    }

    function setTAG_attrib($TAG_attrib) {
        $this->TAG_attrib = $TAG_attrib;
    }

    function setInner_HTML($Inner_HTML) {
        $this->Inner_HTML = $Inner_HTML;
    }

    function setTAG_HTML($TAG_HTML) {
        $this->TAG_HTML = $TAG_HTML;
    }

    function getTAG_number() {
        return $this->TAG_number;
    }

    function setTAG_number($TAG_number) {
        $this->TAG_number = $TAG_number;
    }

}
