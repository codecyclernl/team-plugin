<?php namespace Codecycler\Team\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Members Backend Controller
 */
class Members extends Controller
{
    public $implement = [
        \Backend\Behaviors\FormController::class,
        \Backend\Behaviors\ListController::class,
    ];

    public $requiredPermissions = [
        'codecycler.team.manage_members',
    ];

    /**
     * @var string formConfig file
     */
    public $formConfig = 'config_form.yaml';

    /**
     * @var string listConfig file
     */
    public $listConfig = 'config_list.yaml';

    /**
     * __construct the controller
     */
    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Codecycler.Team', 'team', 'members');
    }

    public function create()
    {
        $this->bodyClass = 'compact-container';
        $this->asExtension('FormController')->create();
    }

    public function update($id)
    {
        $this->bodyClass = 'compact-container';
        $this->asExtension('FormController')->update($id);
    }
}
