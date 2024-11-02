<?php

namespace App\View\Components;

use App\Enums\AgeLimitEnum;
use App\Enums\FormatEnum;
use App\Models\Tag;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ModalProjectCreator extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct() {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $tags = Tag::all(); // Получаем все теги из базы данных
        $ageLimitEnum = AgeLimitEnum::class;
        $formatEnum = FormatEnum::class;

        return view('components.modal-project-creator', compact('tags', 'ageLimitEnum', 'formatEnum'));
    }
}
