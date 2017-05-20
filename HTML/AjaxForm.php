<?php

class AjaxForm extends Form {

    public $DoneJS = "";
    public $ErrorJS = "";
    public $Paras = "";

    function getDoneJS() {
        return $this->DoneJS;
    }

    function getErrorJS() {
        return $this->ErrorJS;
    }

    function setDoneJS($DoneJS) {
        $this->DoneJS = $DoneJS;
    }

    function setErrorJS($ErrorJS) {
        $this->ErrorJS = $ErrorJS;
    }

    public function getParas($item) {
        if (count($item->Inner_Tags) > 0) {
            foreach ($item->Inner_Tags as $key => $value) {
                if (count($value->Inner_Tags) > 0) {
                    $this->getParas($value);
                }
                if ($value instanceof Input) {
                    if ($value->getname() == "")
                        continue;
                    if (strtolower($value->gettype()) == "button" || strtolower($value->gettype()) == "submit" || strtolower($value->gettype()) == "reset")
                        continue;
                    if ($value->getJS_model() == "") {
                        $value->setJS_model($value->getname());
                    }
                    $this->Paras .= ' "' . $value->getname() . '":$scope.' . $value->getJS_model() . ",";
                }
            }
        }
    }

    public function updateHTML() {
        $this->setJS_controller("controler_" . $this->getTAG_number());
        $script = new Script();
        $submit = $this->getElementByName("submit");
        $submit->setJS_click('submit()');
        $this->getParas($this);
        $script->setInner_HTML('app.controller("' . $this->getJS_controller() . '", function($scope, $interval) {'
                . '$scope.submit = function(){'
                . '$.' . $this->getmethod() . '("' . $this->getaction() . '",{' . $this->Paras . ' "formdatatype":"json"}).done(function(response) {$scope.response = response;' . $this->DoneJS . '});'
                . '};'
                . '});');
        $script->updateHTML();
        $this->setTAG_after($script->getTAG_HTML());
        parent::updateHTML();
    }

}
