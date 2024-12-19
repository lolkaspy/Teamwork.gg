<div class="modal modal-xl" id="editProjectModal" tabindex="-1" aria-labelledby="editProjectModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProjectModalLabel">Редактировать проект</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="edit-project-form" method="POST" action="{{route("projects.update", $project)}}" enctype='multipart/form-data'>
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="projectNameEdit" class="form-label">Имя проекта</label>
                            <input type="text" name="nameEdit" class="form-control" id="projectNameEdit" required placeholder="Введите имя проекта">
                        </div>
                        <div class="mb-3">
                            <label for="projectDescriptionEdit" class="form-label">Введите описание</label>
                            <textarea class="form-control" name="descriptionEdit" id="projectDescriptionEdit" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="imagePreviewEdit">Предварительный просмотр изображения:</label>
                            <img id="imagePreviewEdit" src="" alt="Image Preview" style="max-width: 100%; display: none;"/>
                        </div>

                        <div class="mb-3">
                            <label for="projectPhotoEdit">Загрузите изображение для проекта</label>
                            <input type="file" id="projectPhotoEdit" name="imageEdit" required class="course form-control">
                        </div>

                        <div class="mb-3">
                            <label for="projectTagsEdit" class="form-label">Выберите теги, соответствующие проекту</label>
                            <input name="tags-outside-edit" id="projectTagsEdit" class="tagify--outside form-control" value="{{ implode(',', $project->tags()->pluck('name')->toArray()) }}" placeholder="Тег, например, 'Разработка ПО'">
    </div>

                        <div class="mb-3">
                            <label for="projectParticipantsEdit" class="form-label">Укажите максимальное число участников</label>
                            <select id="projectParticipantsEdit" name="participantsEdit" class="form-control form-select" required>
                                @for($i=2;$i<=10;$i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="projectFormatsEdit" class="form-label">Выберите вариант реализации проекта</label>
                            <select id="projectFormatsEdit" name="format_idEdit" class="form-control form-select" required>
                                <option value="{{ $formatEnum::Remote->value }}">Дистанционный</option>
                                <option value="{{ $formatEnum::OnSite->value }}">Очный</option>
                                <option value="{{ $formatEnum::Mixed->value }}">Смешанный</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="projectAgeLimitsEdit" class="form-label">Выберите возрастные ограничения</label>
                            <select id="projectAgeLimitsEdit" name="age_limit_idEdit" class="form-control form-select" required>
                                <option value="{{ $ageLimitEnum::Sixteen->value }}">16+</option>
                                <option value="{{ $ageLimitEnum::Eighteen->value }}">18+</option>
                                <option value="{{ $ageLimitEnum::ThirtyFive->value }}">35+</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-primary">Обновить проект</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
