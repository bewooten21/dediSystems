<?php

$name = filter_input(INPUT_POST, 'name');
$pd = filter_input(INPUT_POST, 'pd');
$price = filter_input(INPUT_POST, 'price');
$image = $_FILES['image'];


$isValid=true;

if($name===""){
    $name_error="Required";
    $nameClass="glyphicon glyphicon-remove form-control-feedback";
    $nameError = "form-group has-error has-feedback";
    $isValid=false;
}else{
    $nameClass = "glyphicon glyphicon-ok form-control-feedback";
    $nameError = "form-group has-success has-feedback";
    $name_error="";
}



if($pd===""){
    $pd_error="Required";
    $pdClass="glyphicon glyphicon-remove form-control-feedback";
    $pdError = "form-group has-error has-feedback";
    $isValid=false;
}else{
    $pdClass = "glyphicon glyphicon-ok form-control-feedback";
    $pdError = "form-group has-success has-feedback";
    $pd_error="";
}


if($price===""){
    $price_error="Required";
    $priceClass="glyphicon glyphicon-remove form-control-feedback";
    $priceError = "form-group has-error has-feedback";
    $isValid=false;
}else if(is_numeric($price)===false){
    $price_error="Enter valid price";
    $priceClass="glyphicon glyphicon-remove form-control-feedback";
    $priceError = "form-group has-error has-feedback";
    $isValid=false;
}
else{
    $priceClass = "glyphicon glyphicon-ok form-control-feedback";
    $priceError = "form-group has-success has-feedback";
    $price_error="";
}

if(($_FILES['image']['name']==="")){
    $image_error="Required";
    
    $isValid=false;
    
}else{
    
    $image_error="";
}

if($isValid===false){
    include("view/addProduct.php");
    exit();
}else if($isValid===true){
    
}

