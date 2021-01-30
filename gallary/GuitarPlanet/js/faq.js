"use strict";
/*********************************************************************
***
*Original Author: Kevin Greene *
*Date Created: 1/28/2021 *
*Version: 1 *
*Date Last Modified: 1/28/2021 *
*Modified by: Kevin Greene *
*Modification log: *Copied js from faq lab Week 2 Day 3 and adjusted for current use
***
******************************************************************** */

// the event handler for the click event of each h2 element
const toggle = evt => {
    const linkElement = evt.currentTarget;                 // get the clicked link element
    const h2Element = linkElement.parentNode;              // get parent h2 from links
    const divElement = h2Element.nextElementSibling;     // get h2's sibling div

    //h2Element.classList.toggle("minus");
    //divElement.classList.toggle("open");
    if (h2Element.hasAttribute("class")){
        h2Element.removeAttribute("class");
    } else {
        h2Element.className = "minus";
    }

    if (divElement.hasAttribute("class")){
        divElement.removeAttribute("class");
    } else{
        divElement.className = "open";
    }

    evt.preventDefault();   // cancel default action of h2 tag's <a> tag
};

document.addEventListener("DOMContentLoaded", () => {
    // get the h2 tags
    const linkElements = faqs.querySelectorAll("#faqs a");
    
    // attach event handler for each h2 tag	    
    for (let linkElement of linkElements) {
        linkElement.addEventListener("click", toggle);
    }
    // set focus on first h2 tag's <a> tag
    linkElements[0].focus();       
});