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

        modal.hide(); // Скрываем модальное окно

}
document.getElementById('closeModalBtn').addEventListener('click', function(event) {
    closeModal();
});

var input = document.querySelector('input[name=basic]');

// initialize Tagify on the above input node reference
new Tagify(input)
