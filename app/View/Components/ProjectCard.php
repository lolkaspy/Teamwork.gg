<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class ProjectCard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public LengthAwarePaginator $projects)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $participantsCount = DB::table('project_users')->select(DB::raw('count(*) as count, project_id'))
            ->groupBy('project_id')->get()->keyBy('project_id');


        return view('components.project-card', compact('participantsCount'));
    }
}
