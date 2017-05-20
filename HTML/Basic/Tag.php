<?php

class Tag {

    public $TAG_name = "";
    public $TAG_after = "";
    public $TAG_before = "";
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
    public $JS_repeat = "";
    public $JS_controller = "";
    public $JS_model = "";
    public $JS_app = "";
    public $JS_src = "";
    public $JS_click = "";
    public $JS_href = "";
    public $HTML_onLoad = "";
    public $HTML_onClick = "";
    public $TAG_Type = "";
    public $Element_number = "";

    
    function getJS_href() {
        return $this->JS_href;
    }

    function setJS_href($JS_href) {
        $this->JS_href = $JS_href;
    }

        
    function getInnerTags() {
        return $this->Inner_Tags;
    }
    
    function getElementNumber() {
        return $this->Element_number;
    }

    function setElementNumber($Element_number) {
        $this->Element_number = $Element_number;
    }

    function getJS_app() {
        return $this->JS_app;
    }

    function getJS_src() {
        return $this->JS_src;
    }

    function setJS_src($JS_src) {
        $this->JS_src = $JS_src;
    }
    
    function getJS_click() {
        return $this->JS_click;
    }

    function setJS_click($JS_click) {
        $this->JS_click = $JS_click;
    }

    function setJS_app($JS_app) {
        $this->JS_app = $JS_app;
    }

    function getJS_repeat() {
        return $this->JS_repeat;
    }

    function getJS_controller() {
        return $this->JS_controller;
    }

    function getJS_model() {
        return $this->JS_model;
    }

    function setJS_repeat($JS_repeat) {
        $this->JS_repeat = $JS_repeat;
    }

    function setJS_controller($JS_controller) {
        $this->JS_controller = $JS_controller;
    }

    function setJS_model($JS_model) {
        $this->JS_model = $JS_model;
    }

    function getonLoad() {
        return $this->HTML_onLoad;
    }

    function getonClick() {
        return $this->HTML_onClick;
    }

    function setonLoad($HTML_onLoad) {
        $this->HTML_onLoad = $HTML_onLoad;
    }

    function setonClick($HTML_onClick) {
        $this->HTML_onClick = $HTML_onClick;
    }

    function getid() {
        return $this->HTML_id;
    }

    function getname() {
        return $this->HTML_name;
    }

    function getclass() {
        return $this->HTML_class;
    }

    function setid($HTML_id) {
        $this->HTML_id = $HTML_id;
    }

    function setname($HTML_name) {
        $this->HTML_name = $HTML_name;
    }

    function setclass($HTML_class) {
        $this->HTML_class = $HTML_class;
    }

    function getTAG_after() {
        return $this->TAG_after;
    }

    function getTAG_before() {
        return $this->TAG_before;
    }

    function setTAG_after($TAG_after) {
        $this->TAG_after = $TAG_after;
    }

    function setTAG_before($TAG_before) {
        $this->TAG_before = $TAG_before;
    }

    public function updateAttribs() {
        $this->updateClasses();
        $this->updateStyle();
        $array = get_object_vars($this);
        $this->TAG_attrib = "";
        foreach ($array as $key => $value) {
            if (substr($key, 0, 5) == "HTML_" && strlen($value) > 0) {
                $this->TAG_attrib .= " " . substr($key, 5, strlen($key) - 4) . '="' . $value . '"';
            } else if (substr($key, 0, 3) == "JS_" && strlen($value) > 0) {
                $this->TAG_attrib .= " ng-" . substr($key, 3, strlen($key) - 2) . '="' . $value . '"';
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

    public function getElementByName($name) {
        if (count($this->Inner_Tags) > 0) {
            $data = NULL;
            foreach ($this->Inner_Tags as $key => $value) {
                if ($value->getname() == $name) {
                    $data = $value;
                } else {
                    $txt = $value->getElementByName($name);
                    if ($txt != null)
                        $data = $txt;
                }
            }
            return $data;
        }
    }

    public function ClearInnerHTML() {
        if (count($this->Inner_Tags) > 0) {
            $this->Inner_HTML = "";
            foreach ($this->Inner_Tags as $key => $value) {
                $value->ClearInnerHTML();
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
            $this->TAG_HTML = $this->TAG_before . "<" . $this->TAG_name . " " . $this->TAG_attrib . ">" . $this->Inner_HTML . "</" . $this->TAG_name . ">" . $this->TAG_after;
        } else {
            $this->TAG_HTML = $this->TAG_before . "<" . $this->TAG_name . " " . $this->TAG_attrib . " />" . $this->TAG_after;
        }
    }

    public function __construct($TAG_name, $close = null, $id = null) {
        if (!isset($_SESSION['Elements']))
            $_SESSION['Elements'] = array();
        if (!isset($_SESSION['Elements'][$TAG_name]))
            $_SESSION['Elements'][$TAG_name] = 0;
        $_SESSION['Elements'][$TAG_name] ++;
        $this->Element_number = $_SESSION['Elements'][$TAG_name];
        $this->TAG_name = $TAG_name;
        $this->TAG_Type = $close;
        if ($this->isSaved()) {
            $this->TAG_number = $this->loadElementByID()->TAG_number;
        } else {
            $this->TAG_number = random_int(0, 999999999) . "##" . random_int(0, 999999999);
        }
        if ($id == NULL)
            $this->HTML_id = $this->TAG_name . "_" . $this->TAG_number;
    }

    public function saveElementByID() {
        if (!isset($_SESSION['ElementByID']))
            $_SESSION['ElementByID'] = array();
        $_SESSION['ElementByID'][$this->TAG_name . "_" . $this->getElementNumber()] = serialize($this);
    }

    public function loadElementByID() {
        return unserialize($_SESSION['ElementByID'][$this->TAG_name . "_" . $this->getElementNumber()]);
    }

    public function isSaved() {
        if (!isset($_SESSION['ElementByID']))
            $_SESSION['ElementByID'] = array();
        return isset($_SESSION['ElementByID'][$this->TAG_name . "_" . $this->getElementNumber()]);
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
