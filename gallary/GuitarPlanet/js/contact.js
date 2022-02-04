"use strict";
/*********************************************************************
***
*Original Author: Kevin Greene *
*Date Created: 1/29/2021 *
*Version: 1 *
*Date Last Modified: 1/29/2021 *
*Modified by: Kevin Greene *
*Modification log: *Made validation js for input
                   *Used lab register 2.0 from week 2 as template and adjusted for current use
***
******************************************************************** */

const $ = selector => document.querySelector(selector);
const radios = document.querySelectorAll("radio");
let isValid = true;
const contactMe = evt =>{
    
/*check values for empty text and assign error messages */

    if($("#nameBox").value==""){
        $("#name_error").textContent ="You must provide a name to send message";
        isValid = false;
    }
    else{
        $("#name_error").textContent = "";
    }
   
    
    if($("#comment").value==""){
        $("#comment_error").textContent = "You must enter a message to send";
        isValid = false;
    }
    else{
        $("#comment_error").textContent = "";
    }

    if(!isValid){
        evt.preventDefault();
    }

};
/*Create clear event for button */
const clearForm = () =>{
    $("#nameBox").value = "";
    $("#comment").value = "";
    $("#name_error").textContent = "";
    $("#comment_error").textContent = "";
}

document.addEventListener("DOMContentLoaded", () => {
    // hook up click events for both buttons
    $("#submit").addEventListener("click", contactMe);
    $("#clear").addEventListener("click", clearForm);
});


