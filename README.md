# Framework_X
Object Orientated HTML (PHP Framework)

```
<?php

include "./HTML/Inti.php";

$full = new PageStructure();
$btn1 = new Button("Test");
$txt1 = new TextField();
$lab1 = new Label("Email address");
$div1 = new Div();
$div0 = new Div();

$full->addToHead(new Meta("viewport", "width=device-width, initial-scale=1"));
$full->addToHead(new Link("https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"));
$full->addToHead(new Link("https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"));
$full->addToHead(new Script("https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"));

$btn1->setHTML_name("name1");
$btn1->setHTML_value("Submit");
$btn1->addClass("btn");
$btn1->addClass("btn-success");

$txt1->setHTML_placeholder("Type Email");
$txt1->setHTML_type(TextField::$TYPE_EMAIL);
$txt1->addClass("form-control");
$lab1->setHTML_for($txt1->getHTML_id());

$div1->addClass("form-group");
$div1->addElement($lab1);
$div1->addElement($txt1);

$div0->addElement($div1);
$div0->addElement($btn1);
$div0->addClass("container");
$div0->addStyle("padding-top", "20px");

$table1 = new Table();
$table1->addClass("table");
$tr1 = $table1->addARowToHead();
$table1->addData($tr1, "Name");
$table1->addData($tr1, "Value");
$tr2 = $table1->addARowToBody();
$table1->addData($tr2, "Thanura");
$table1->addData($tr2, "12");
$tr3 = $table1->addARowToBody();
$table1->addData($tr3, "Hirusha");
$table1->addData($tr3, "13");
$tr3 = $table1->addARowToBody();
$table1->addData($tr3, "Chamath");
$table1->addData($tr3, "15");


$div0->addElement($table1);

$full->addToBody($div0);
$full->printHTML();
```
