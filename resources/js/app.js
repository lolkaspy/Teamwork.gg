import './bootstrap';

import 'bootstrap';

import '@popperjs/core';

//#region раскраска тегов
window.onload = function() {
    var span = document.getElementsByClassName('badge');
    for (var i = 0; i < span.length; i++) {
        span[i].style.backgroundColor = 'rgb(' +
            Math.floor(Math.random() * 200) + ',' +
            Math.floor(Math.random() * 200) + ',' +
            Math.floor(Math.random() * 200) + ')';
    }
};
//#endregion
