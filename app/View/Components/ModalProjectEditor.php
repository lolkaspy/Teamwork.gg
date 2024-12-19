<?php

namespace App\View\Components;

use App\Enums\AgeLimitEnum;
use App\Enums\FormatEnum;
use App\Models\Project;
use App\Models\Tag;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection as Collection;
use Illuminate\View\Component;

class ModalProjectEditor extends Component
{
    /**
     * Create a new component instance.
     */
    public Project $project;

    public Collection $tags;

    public string $ageLimitEnum;

    public string $formatEnum;

    public function __construct(Project $project)
    {
        $this->project = $project;
        $this->tags = Tag::all(); // Получаем все теги из базы данных
        $this->ageLimitEnum = AgeLimitEnum::class;
        $this->formatEnum = FormatEnum::class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $project = $this->project;
        $tags = Tag::all(); // Получаем все теги из базы данных
        $ageLimitEnum = AgeLimitEnum::class;
        $formatEnum = FormatEnum::class;

        return view('components.modal-project-editor', compact('tags', 'ageLimitEnum', 'formatEnum', 'project'));
    }
}
