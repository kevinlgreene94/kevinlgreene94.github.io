"use strict";
/*********************************************************************
***
*Original Author: Kevin Greene *
*Date Created: 1/28/2021 *
*Version: 1 *
*Date Last Modified: 1/28/2021 *
*Modified by: Kevin Greene *
*Modification log: *Copied js from faq lab Week 2 Day 3 and adjusted for current use
                    2/5/2021 *Deleted javascript and added jquery with link in html
***
******************************************************************** */

// the event handler for the click event of each h2 element
$(function() {
    $("#accordion").accordion({
        collapsible: true,
        active: "none"
    })
})