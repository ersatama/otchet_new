<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RoleRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Domain\Contracts\RoleContract;

class RoleCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\Role::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/role');
        CRUD::setEntityNameStrings('Роль', 'Роли');
    }

    protected function setupListOperation()
    {
        CRUD::column(RoleContract::NAME);

    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(RoleRequest::class);

        CRUD::field(RoleContract::NAME);

    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
