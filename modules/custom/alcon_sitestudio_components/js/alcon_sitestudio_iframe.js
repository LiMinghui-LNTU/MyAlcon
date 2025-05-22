"use strict";

// DMB-4315: Auto size for iframe height to show all content without scroll bar

// Selecting the iframe element
let iframe = document.querySelector("#contentIframe");

// Adjusting the iframe height onload event
iframe.addEventListener('load', function () {
  setInterval(function () {
    iframe.style.height = iframe.contentDocument.body.scrollHeight + 'px';
  }, 500);
});

// DMB-4315 - END




