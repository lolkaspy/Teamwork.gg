<?php

namespace App\View\Components;

use App\Models\Project;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RecentProjectCardComponent extends Component
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
        $recentProjects = Project::with('tags')->orderBy("created_at", "desc")->take(4)->get();

        return view('components.recent-project-card-component', compact('recentProjects'));
    }
}
