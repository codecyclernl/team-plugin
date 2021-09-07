<?php namespace Codecycler\Team;

use Backend;
use System\Classes\PluginBase;
use Codecycler\Team\Components\Members;

/**
 * Team Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'codecycler.team::lang.plugin.name',
            'description' => 'codecycler.team::lang.plugin.description',
            'author'      => 'Codecycler',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return [
            Members::class => 'TeamMembers',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return [
            'codecycler.team.manage_members' => [
                'tab' => 'Team',
                'label' => 'Manage members'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return [
            'team' => [
                'label'       => 'Team',
                'url'         => Backend::url('codecycler/team/members'),
                'icon'        => 'icon-user',
                'permissions' => ['codecycler.team.*'],
                'order'       => 500,
            ],
        ];
    }
}
