<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Contracts\MainContract;
use App\Http\Requests\NewsRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class NewsCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\News::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/news');
        CRUD::setEntityNameStrings('Новость', 'Новости');
    }

    protected function setupShowOperation()
    {
        CRUD::column(MainContract::TITLE)->label('Заголовок');
        CRUD::column(MainContract::IMAGE)->type('image')->label('Фото');
        CRUD::column(MainContract::STATUS)->label('Статус');
    }

    protected function setupListOperation()
    {
        CRUD::column(MainContract::TITLE)->label('Заголовок');
        CRUD::column(MainContract::STATUS)->label('Статус');
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(NewsRequest::class);

        CRUD::field(MainContract::TITLE)->label('Заголовок');
        $this->crud->addField([
            'name'  =>  MainContract::IMAGE,
            'label' =>  'Фото',
            'type'  =>  'image',
        ]);
        CRUD::field(MainContract::STATUS)->label('Статус')->type('select_from_array')->options([
            MainContract::ON    =>  'Активный',
            MainContract::OFF   =>  'Заблокирован'
        ]);

    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
