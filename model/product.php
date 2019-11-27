<?php

class product{
    private $id, $price, $image, $desc, $name, $quantity;
    
    public function __construct($id, $price, $image, $desc, $name, $quantity){
        $this->id=$id;
        $this->price=$price;
        $this->image=$image;
        $this->desc=$desc;
        $this->name=$name;
        $this->quantity=$quantity;
    }
    function getQuantity() {
        return $this->quantity;
    }

    function setQuantity($quantity) {
        $this->quantity = $quantity;
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

