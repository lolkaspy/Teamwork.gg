<div class="modal modal-xl"  id="createProjectModal" tabindex="-1" role="dialog" aria-labelledby="createProjectModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createProjectModalLabel">Создать проект</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="create-project-form" id="createProjectForm">
                    <div class="form-group">

                        <div class="mb-3">
                        <label for="projectName" class="form-label">Имя проекта</label>
                        <input type="text" class="form-control" id="projectName" placeholder="Введите имя проекта" aria-describedby="projectNameHelpBlock">
                        <div id="projectNameHelpBlock" class="form-text">
                            Название должно быть уникальным и отражающим главную цель проекта.
                        </div>
                        </div>

                        <div class="mb-3">
                        <label for="projectDescription" class="form-label">Введите описание</label>
                        <textarea class="form-control" id="projectDescription" style="height: 350px; resize: none;"></textarea>
                        </div>

                        <div class="mb-3">
                        <label for="projectTags" class="form-label">Выберите теги, соответствующие проекту</label>
                        <input name='tags-outside' id="projectTags" class='tagify--outside form-control' value='' placeholder='Тег, например, "Разработка ПО"'>
                        </div>

                        <div class="mb-3">
                            <label for="projectFormats" class="form-label">Выберите вариант реализации проекта</label>
                            <select id="projectFormats" class="form-select" aria-label="Выберите вариант реализации проекта">
                                <option selected></option>
                                <option value="1">Дистанционный</option>
                                <option value="2">Очный</option>
                                <option value="3">Смешанный</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="projectAgeLimits" class="form-label">Выберите возрастные ограничения</label>
                            <select id="projectAgeLimits" class="form-select" aria-label="Выберите возрастные ограничения">
                                <option selected></option>
                                <option value="1">16+</option>
                                <option value="2">18+</option>
                                <option value="3">35+</option>
                            </select>
                        </div>
                        </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="closeModalBtn">Закрыть</button>
                <button type="button" class="btn btn-primary" id="saveProjectBtn">Создать проект</button>
            </div>
        </div>
    </div>
</div>
