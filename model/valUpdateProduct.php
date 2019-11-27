<?php

$id = filter_input(INPUT_POST, 'id');
$name = filter_input(INPUT_POST, 'name');
$pd = filter_input(INPUT_POST, 'pd');
$price = filter_input(INPUT_POST, 'price');


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
if (!empty($_FILES['image']['name'])) {
    $image = $_FILES['image'];
    $temp = $_FILES['image']['name'];
    $temp = explode('.', $temp);
    $temp = end($temp);
    $file_ext = strtolower($temp);
    $file_size = $_FILES['image']['size'];
    $imageName = $_FILES['image']['name'];
    $file_tmp = $_FILES['image']['tmp_name'];
    if ($file_size > 128000000 || $file_size === 0) {
        $isValid = false;
        $image_error = 'Image uploaded is too large.';
    } else if (in_array($file_ext, $extensions) === false) {
        $isValid = false;
        $image_error = "Use file extensions : " . join(',', $extensions);
    } else {

        $image_error = "";
    }
} else {
    $image_error = "";
}


if ($isValid === false) {
    $product = product_db::getProduct_byId($id);
    include("view/editProduct.php");
    exit();
} else if ($isValid === true) {
    $product = product_db::getProduct_byId($id);
    if (($_FILES['image']['name'] === "")) {
        product_db::updateProduct($product->getId(), $price, $product->getImage(), $pd, $name);
        header("Location: index.php?action=shop");
    } else if (($_FILES['image']['name'] != "")) {
        $newName = $id . '.' . $file_ext;
        move_uploaded_file($file_tmp, "images/" . $newName);
        $image = 'images/' . $newName;
        
        product_db::updateProduct($product->getId(), $price, $image, $pd, $name);
        header("Location: index.php?action=shop");
    }
}

