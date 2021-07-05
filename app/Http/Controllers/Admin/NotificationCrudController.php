<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\NotificationRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

use App\Domain\Contracts\NotificationContract;

class NotificationCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\Notification::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/notification');
        CRUD::setEntityNameStrings('Уведомления', 'Уведомлении');
        $this->crud->setShowView('vendor.backpack.crud.notification.show');
    }

    protected function setupShowOperation()
    {
        CRUD::column(NotificationContract::TITLE)->label('Заголовок');
        CRUD::column(NotificationContract::DESCRIPTION)->label('Описание');
        CRUD::column(NotificationContract::STATUS)->label('Статус');
    }

    protected function setupListOperation()
    {
        CRUD::column(NotificationContract::TITLE)->label('Заголовок');
        CRUD::column(NotificationContract::DESCRIPTION)->label('Описание');
        CRUD::column(NotificationContract::STATUS)->label('Статус');
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(NotificationRequest::class);
        CRUD::field(NotificationContract::TITLE)->label('Заголовок');
        CRUD::field(NotificationContract::DESCRIPTION)->label('Описание');
        CRUD::field(NotificationContract::STATUS)->label('Статус')->type('select_from_array')->options([
            NotificationContract::ON    =>  'Включен',
            NotificationContract::OFF   =>  'Отключен'
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
