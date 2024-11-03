import './bootstrap';
import Tagify from '@yaireo/tagify'
import 'bootstrap';
import { Modal } from 'bootstrap'
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

function closeModal() {
    let modal = new Modal(document.getElementById('createProjectModal'), {keyboard: false});

        modal.hide();

}
document.getElementById('closeModalBtn').addEventListener('click', function(event) {
    closeModal();
});

document.addEventListener('DOMContentLoaded', function() {
var input = document.querySelector('input[name=tags-outside]')


fetch('/api/tags')
    .then(response => response.json())
    .then(tagList => {
var tagify = new Tagify(input, {
    whitelist: tagList,
    focusable: false,
    maxTags: 10,
    dropdown: {
        position: 'input',
        enabled: 0,
        maxItems      : 5,
        closeOnSelect : false,
        highlightFirst: true,
    }
});
    })
    .catch(error => console.error('Ошибка:', error));

});
