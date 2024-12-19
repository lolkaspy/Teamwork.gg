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

window.tagify = null;
document.addEventListener('DOMContentLoaded', function() {
var input = document.querySelector('input[name=tags-outside]')


fetch('/api/tags')
    .then(response => response.json())
    .then(tagList => {
        window.tagify = new Tagify(input, {
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

//#region обработка модального окна редактирования проекта
// Обработчик события для модального окна
document.addEventListener('DOMContentLoaded', () => {
    const editProjectModal = document.getElementById('editProjectModal');

    editProjectModal.addEventListener('show.bs.modal', (event) => {
        const button = event.relatedTarget;

        const projectId = button.getAttribute('data-id');
        const projectName = button.getAttribute('data-name');
        const projectDescription = button.getAttribute('data-description');
        const projectParticipants = button.getAttribute('data-participants');
        const projectFormatId = button.getAttribute('data-format-id');
        const projectAgeLimitId = button.getAttribute('data-age-limit-id');
        const projectTags = button.getAttribute('data-tags'); // Get tags
        const projectImagePath = button.getAttribute('data-image-path'); // Get image path

        console.log("Project ID:", projectId);
        console.log("Project Name:", projectName);
        console.log("Project Description:", projectDescription);
        console.log("Project Participants:", projectParticipants);
        console.log("Project Format ID:", projectFormatId);
        console.log("Project Age Limit ID:", projectAgeLimitId);

        // Установка маршрута
        const modalBody = editProjectModal.querySelector('.edit-project-form');
        modalBody.setAttribute('action', '/projects/' + projectId);

        // Установка значений в форму
        modalBody.querySelector('#projectNameEdit').value = projectName;
        modalBody.querySelector('#projectDescriptionEdit').value = projectDescription;

        // Установка количества участников
        modalBody.querySelector('#projectParticipantsEdit').value = projectParticipants;

        // Установка формата проекта - это селект, значит его нужно установить отдельно
        modalBody.querySelector('#projectFormatsEdit').value = projectFormatId;

        // Установка возрастного ограничения - это тоже селект
        modalBody.querySelector('#projectAgeLimitsEdit').value = projectAgeLimitId;

        const projectTagsInput = modalBody.querySelector('#projectTagsEdit');
        projectTagsInput.value = projectTags;

        const input2 = modalBody.querySelector('#projectTagsEdit');

        // Clear previous tags and set the existing project tags
        const tagify2 = new Tagify(input2, {
            whitelist: [], // initially empty; will be filled with API fetch
            focusable: false,
            maxTags: 10,
            dropdown: {
                position: 'input',
                enabled: 0,
                maxItems: 5,
                closeOnSelect: false,
                highlightFirst: true,
            }
        });

        // Fetch the whitelist from the server
        fetch('/api/tags')
            .then(response => response.json())
            .then(tagList => {
                tagify2.settings.whitelist = tagList; // Set the fetched tag whitelist
                tagify2.loadOriginalValues(projectTags); // Load the project tags into Tagify
            })
            .catch(error => console.error('Ошибка:', error));


        // Установка изображения - здесь можно, в зависимости от вашей реализации, показать его или как-то отобразить
        const imagePreview = modalBody.querySelector('#imagePreviewEdit');
        if (imagePreview) {
            imagePreview.src = projectImagePath; // Assuming you have an <img> for preview
            imagePreview.style.display = 'block'; // Show it
        }

    });
});
//#endregion
