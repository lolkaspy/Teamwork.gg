<div class="modal"  id="createProjectModal" tabindex="-1" role="dialog" aria-labelledby="createProjectModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createProjectModalLabel">Создать проект</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form id="createProjectForm">
                    <div class="form-group">
                        <label for="projectName">Имя проекта</label>
                        <input type="text" class="form-control" id="projectName" placeholder="Введите имя проекта">
                        <label for="projectDescription">Введите описание</label>
                        <textarea class="form-control" id="projectDescription" rows="3"></textarea>
                        <label for="projectTags">Выберите теги, описывающие проект</label>
                        <input name='basic' id="projectTags" value='tag1, tag2' autofocus>
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
