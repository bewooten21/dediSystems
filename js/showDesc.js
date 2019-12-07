"use strict";

$(document).ready(function(){
    $("#select ").click(function(evt){
        $(this).toggleClass("hide");
        if($(this).attr("class") !== "hide"){
            $(this).prev().hide();
            $(this).text("Show More");
        }
        else {
            $(this).prev().show();
            $(this).text("Show Less");
        }
        evt.preventDefault();
    })
    
})

