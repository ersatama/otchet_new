<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Contracts\MainContract;
use App\Http\Requests\FaqRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class FaqCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\Faq::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/faq');
        CRUD::setEntityNameStrings('Вопрос - ответ', 'Чаво');
    }

    protected function setupShowOperation()
    {
        CRUD::column(MainContract::TITLE)->label('Вопрос');
        CRUD::column(MainContract::DESCRIPTION)->label('Ответ');
        CRUD::column(MainContract::STATUS)->label('Статус');
    }

    protected function setupListOperation()
    {
        CRUD::column(MainContract::TITLE)->label('Вопрос');
        CRUD::column(MainContract::STATUS)->label('Статус');
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(FaqRequest::class);
        CRUD::field(MainContract::TITLE)->label('Вопрос');
        $this->crud->addField([
            'name'  =>  MainContract::DESCRIPTION,
            'label' =>  'Ответ',
            'type'  =>  'ckeditor',
            'extra_plugins' =>  ['widget'],
            'options'   =>  [
                'autoGrow_minHeight'   => 200,
                'autoGrow_bottomSpace' => 50,
                'removePlugins'        => 'resize,maximize',
            ]
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
