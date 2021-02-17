"use strict";
/*********************************************************************
***
*Original Author: Kevin Greene *
*Date Created: 1/26/2021 *
*Version: 1 *
*Date Last Modified: 1/26/2021 *
*Modified by: Kevin Greene *
*Modification log: *Copied js from week 1 project
                   *Js is basic email validation with submit and clear buttons

            2/5/2021 *Deleted javascript and added jquery with link in html
                     *Created plugin.js for Cycle2

            2/17/2021 *Added email pattern for verification
                      *Added focus to first text box on site load
***
******************************************************************** */



$(document).ready( () => {
    $("#email_1").focus();

    $("#join_list").click( evt => {
       //user entry from text boxes
        const email1 = $("#email_1").val();
        const email2 = $("#email_2").val();
        const firstName = $("#first_name").val();
        const emailPattern = /^[\w\.\-]+@[\w\.\-]+\.[a-zA-Z]+$/;

       //check user entries
       let isValid = true;

      if(email1 == "" || !emailPattern.test(email1)) {
           $("#email_1_error").text("Valid email is required.");
           isValid = false;
       } 
       else{
          $("#email_1_error").text("");
      }

      if (email1 != email2) {
          $("#email_2_error").text("Emails must match.");
          isValid = false;
       }
       else{
           $("#email_2_error").text("");
       }

       if (firstName == ""){
           $("#first_name_error").text("First name is required.");
           isValid = false;
       }
        else{
            $("#first_name_error").text("");
        }

       //cancel form submit if any user entries are invalid
        if (!isValid) {
           evt.preventDefault();
       }
    });

    $("#clear_form").click( () => {
    // clear text boxes
    $("#email_1").val("");
    $("#email_2").val("");
    $("#first_name").val("");

    // clear span elements
    $("#email_1_error").text("*");
    $("#email_2_error").text("*");
    $("#first_name_error").text("*"); 

    // set focus on first text box after resetting the form
    $("#email_1").focus();
    });
});
