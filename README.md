# Framework_X
Object Orientated HTML (PHP Framework)

```
<?php
session_start();
include "./HTML/Inti.php";

$hostname = './';
$host = 'localhost:3306';
$root = 'root';
$pass = '';
$database = 'help_io';
$con = mysqli_connect($host, $root, $pass, $database);

if(isset($_POST['email']))
    die($_POST['email']);
$full = new PageStructure();
//if (!$full->isSaved()) {
    $JQuery = new JQuery($full);
    $angulerjs = new AngulerJS($full);
    $BS = new Bootstrap($full);
    $btn1 = new Button("Test");
    $txt1 = new TextField();
    $lab1 = new Label('Email address');
    $div1 = new Div();
    $div0 = new Div();
    $script1 = new Script();

    $function1 = $script1->addFunction("", "alert('dasdasd')");

    $table1 = new ReloadTable($con, "SELECT * FROM `user`");
    $table1->addClass("table");
    $table1->AddBind("User ID", "{{x.UID}}");
    $table1->AddBind("User Name", "{{x.Uname}}");
    $table1->AddBind("User Email", "{{x.Uemail}}");
    $image1 = new Image();
    $image1->setJS_src("{{x.Upic}}");
    $image1->setwidth("60");
    $table1->AddBind("User Image", $image1);

    $body = $full->getBody();
//  $body->setonLoad($function1 . "()");

    $full->addToHead(new Meta("viewport", "width=device-width, initial-scale=1"));
    $full->addToHead($script1);

    $btn1->setname("submit");
    $btn1->setvalue("Submit");
    $btn1->addClass("btn");
    $btn1->addClass("btn-success");

    $txt1->setplaceholder('Type Email ');
    $txt1->settype(TextField::$TYPE_TXET);
    $txt1->addClass("form-control");
    $txt1->setname("email");
    $lab1->setfor($txt1->getid());

    $div1->addClass("form-group");
    $div1->addElement($lab1);
    $div1->addElement($txt1);

    //$div0->addElement($div1);
    $form1 = new AjaxForm(); 
    $form1->setaction("test.php");
    $form1->setmethod("post");
    $form1->addElement($div1);
    $form1->addElement($btn1);
    $form1->setDoneJS('$scope.email="";');
    
    
    $div0->addElement($form1);
    $div0->addClass("container");
    $div0->addStyle("padding-top", "20px");


    $div0->addElement($table1);
    $full->addToBody($div0);
    $full->printHTML();
//    $full->saveOnSession();
//} else {
//    $full = $full->loadFromSession();
//    $table1 = $full->getElementByName("tablex");
//    $table1->getData($con);
//    $full->printHTML();
//}   
```
