"use strict";

$(document).ready( () =>{
    $("#categories h2").click( evt => {
        const h2 = evt.currentTarget;

        $(h2).toggleClass("minus");

        if ($(h2).attr("class")!== "minus") {
            $(h2).next().hide();
        }
        else {
            $(h2).next().show();
        }

        evt.preventDefault();
    });
    
    $("#web_images a, #language_images a, #database_images a").each( (index, img) => {

        let imgLink = $(img).attr("href");
        let bookImg = new Image();

        bookImg.src = imgLink;

        $(img).click ( evt => {
            $("#image").attr("src", imgLink);

            evt.preventDefault();
        });
    });

});
