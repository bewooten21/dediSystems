<?php

class product{
    private $id, $price, $image, $desc, $name;
    
    public function __construct($id, $price, $image, $desc, $name){
        $this->id=$id;
        $this->price=$price;
        $this->image=$image;
        $this->desc=$desc;
        $this->name=$name;
    }
    function getId() {
        return $this->id;
    }

    function getPrice() {
        return $this->price;
    }

    function getImage() {
        return $this->image;
    }

    function getDesc() {
        return $this->desc;
    }

    function getName() {
        return $this->name;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setPrice($price) {
        $this->price = $price;
    }

    function setImage($image) {
        $this->image = $image;
    }

    function setDesc($desc) {
        $this->desc = $desc;
    }

    function setName($name) {
        $this->name = $name;
    }


    
    
}

