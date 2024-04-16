<?php

namespace App\View\Components;

use App\Models\Project;
use App\Models\Tag;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $projects = Project::paginate(12);
        $tags = Tag::all()->splice(40);

        return view('components.card-component', compact('projects', 'tags'));
    }
}
