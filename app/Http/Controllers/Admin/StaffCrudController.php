<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StaffRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Domain\Contracts\StaffContract;

class StaffCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\Staff::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/staff');
        CRUD::setEntityNameStrings('Сотрудник', 'Сотрудники');
    }

    protected function setupShowOperation()
    {
        CRUD::column(StaffContract::ORGANIZATION_ID)->type('select')->label('БИН Организации')
            ->entity('organization')->model('App\Models\Organization')->attribute(StaffContract::BIN);
        CRUD::column(StaffContract::USER_ID)->type('select')->label('ИИН владельца')
            ->entity('user')->model('App\Models\User')->attribute(StaffContract::IIN);
        CRUD::column(StaffContract::SALARY)->label('Заработная плата');
        CRUD::column(StaffContract::STATUS)->label('Статус');
    }

    protected function setupListOperation()
    {
        CRUD::column(StaffContract::ORGANIZATION_ID)->type('select')->label('БИН Организации')
            ->entity('organization')->model('App\Models\Organization')->attribute(StaffContract::BIN);
        CRUD::column(StaffContract::USER_ID)->type('select')->label('ИИН владельца')
            ->entity('user')->model('App\Models\User')->attribute(StaffContract::IIN);
        CRUD::column(StaffContract::SALARY)->label('Заработная плата');
        CRUD::column(StaffContract::STATUS)->label('Статус');
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(StaffRequest::class);
        CRUD::field(StaffContract::SALARY)->label('Заработная плата')->attributes([
            'required'  =>  true,
        ]);
        CRUD::field(StaffContract::STATUS)->label('Статус');
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
