<?php

namespace App\View\Components;

use App\Models\Project;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\Component;

class RecentProjectCardComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public Collection $recentProjects)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {

        return view('components.recent-project-card-component');
    }
}
