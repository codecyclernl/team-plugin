<?php namespace Codecycler\Team\Components;

use Cms\Classes\ComponentBase;
use Codecycler\Team\Models\Member;

/**
 * Members Component
 */
class Members extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Members Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function all()
    {
        return Member::query()
            ->sort()
            ->active()
            ->get();
    }
}
