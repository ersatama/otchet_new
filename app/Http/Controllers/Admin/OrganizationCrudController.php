<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\OrganizationRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Domain\Contracts\OrganizationContract;

class OrganizationCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\Organization::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/organization');
        CRUD::setEntityNameStrings('Организация', 'Организации');
    }

    protected function setupListOperation()
    {
        CRUD::column(OrganizationContract::USER_ID)->type('select')->label('ИИН владельца')
            ->entity('user')->model('App\Models\User')->attribute(OrganizationContract::IIN);
        CRUD::column(OrganizationContract::TITLE)->label('Название');
        CRUD::column(OrganizationContract::BIN)->label('БИН');
        CRUD::column(OrganizationContract::EMAIL)->label('Эл.почта');
        CRUD::column(OrganizationContract::STATUS)->label('Статус');

    }

    protected function setupShowOperation()
    {
        $this->crud->set('show.setFromDb', false);
        CRUD::column(OrganizationContract::USER_ID)->type('select')->label('ИИН владельца')
            ->entity('user')->model('App\Models\User')->attribute(OrganizationContract::IIN);
        CRUD::column(OrganizationContract::TITLE)->label('Название');
        CRUD::column(OrganizationContract::BIN)->label('БИН');
        CRUD::column(OrganizationContract::EMAIL)->label('Эл.почта');
        CRUD::column(OrganizationContract::STATUS)->label('Статус');
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(OrganizationRequest::class);

        CRUD::field(OrganizationContract::TITLE)->label('Название');

        CRUD::field(OrganizationContract::BIN)->label('БИН')->attributes([
            'required'  =>  true,
            'readonly'  =>  true
        ]);

        CRUD::field(OrganizationContract::EMAIL)->label('Эл.почта')->attributes([
            'required'  =>  true,
            'readonly'  =>  true
        ]);

        CRUD::field(OrganizationContract::STATUS)->label('Статус')->type('select_from_array')->options([
            OrganizationContract::ON    =>  'Активный',
            OrganizationContract::OFF   =>  'Заблокирован'
        ]);

    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
