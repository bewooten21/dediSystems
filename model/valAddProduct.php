<?php

require_once 'model/product_db.php';

$name = filter_input(INPUT_POST, 'name');
$pd = filter_input(INPUT_POST, 'pd');
$q = filter_input(INPUT_POST, 'quantity');
$price = filter_input(INPUT_POST, 'price');
$image = $_FILES['image'];
$temp = $_FILES['image']['name'];
$temp = explode('.', $temp);
$temp = end($temp);
$file_ext = strtolower($temp);
$file_size = $_FILES['image']['size'];
$imageName = $_FILES['image']['name'];
$file_tmp = $_FILES['image']['tmp_name'];
$extensions = array("jpeg", "jpg", "png", "gif");


$isValid = true;

if ($name === "") {
    $name_error = "Required";
    $nameClass = "glyphicon glyphicon-remove form-control-feedback";
    $nameError = "form-group has-error has-feedback";
    $isValid = false;
} else {
    $nameClass = "glyphicon glyphicon-ok form-control-feedback";
    $nameError = "form-group has-success has-feedback";
    $name_error = "";
}

if($q===""){
    $q_error = "Required";
    $qClass = "glyphicon glyphicon-remove form-control-feedback";
    $qError = "form-group has-error has-feedback";
    $isValid = false;
}else {
    $qClass = "glyphicon glyphicon-ok form-control-feedback";
    $qError = "form-group has-success has-feedback";
    $q_error = "";
}



if ($pd === "") {
    $pd_error = "Required";
    $pdClass = "glyphicon glyphicon-remove form-control-feedback";
    $pdError = "form-group has-error has-feedback";
    $isValid = false;
} else {
    $pdClass = "glyphicon glyphicon-ok form-control-feedback";
    $pdError = "form-group has-success has-feedback";
    $pd_error = "";
}


if ($price === "") {
    $price_error = "Required";
    $priceClass = "glyphicon glyphicon-remove form-control-feedback";
    $priceError = "form-group has-error has-feedback";
    $isValid = false;
} else if (is_numeric($price) === false) {
    $price_error = "Enter valid price";
    $priceClass = "glyphicon glyphicon-remove form-control-feedback";
    $priceError = "form-group has-error has-feedback";
    $isValid = false;
} else {
    $priceClass = "glyphicon glyphicon-ok form-control-feedback";
    $priceError = "form-group has-success has-feedback";
    $price_error = "";
}

if (($_FILES['image']['name'] === "")) {
    $image_error = "Required";
    $isValid = false;
} else if($file_size > 128000000 || $file_size === 0){
    $isValid = false;
    $image_error='Image uploaded is too large.';
}else if(in_array($file_ext, $extensions) === false){
    $isValid = false;
    $image_error="Use file extensions : " . join(',', $extensions);
}else {

    $image_error = "";
}

if ($isValid === false) {
    include("view/addProduct.php");
    exit();
} else if ($isValid === true) {
    product_db::addProduct('', $price, $imageName, $pd, $name,$q);
    $lastProd = product_db::getLastProduct_byId();
  
    $newName = $lastProd. '.'.$file_ext;
    move_uploaded_file($file_tmp, "images/" . $newName);
    $image ='images/'. $newName;
    product_db::updateImage($lastProd, $image);
    header("Location: index.php?action=viewProducts");
    
}

