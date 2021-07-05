<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\FaqListRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

use App\Domain\Contracts\FaqListContract;
use App\Domain\Contracts\FaqContract;
use App\Models\Faq;

class FaqListCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\FaqList::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/faqlist');
        CRUD::setEntityNameStrings('ЧАВО список', 'ЧАВО список');
    }

    protected function setupShowOperation()
    {
        CRUD::column(FaqListContract::FAQ_ID)->type('select')->label('ЧАВО')->entity('faq')->model(Faq::class)->attribute(FaqContract::TITLE);
        CRUD::column(FaqListContract::TITLE)->label('Заголовок');
        CRUD::column(FaqListContract::DESCRIPTION)->label('Описание');
        CRUD::column(FaqListContract::IMAGE)->type('image')->label('Заголовок');
        CRUD::column(FaqListContract::STATUS)->label('Статус');
    }

    protected function setupListOperation()
    {
        CRUD::column(FaqListContract::FAQ_ID)->type('select')->label('ЧАВО')->entity('faq')->model(Faq::class)->attribute(FaqContract::TITLE);
        CRUD::column(FaqListContract::TITLE)->label('Заголовок');
        CRUD::column(FaqListContract::STATUS)->label('Статус');
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(FaqListRequest::class);

        CRUD::field(FaqListContract::FAQ_ID)->type('select')->label('ЧАВО')->entity('faq')->model(Faq::class)->attribute(FaqContract::TITLE);
        CRUD::field(FaqListContract::TITLE)->label('Заголовок');
        CRUD::field(FaqListContract::DESCRIPTION)->label('Описание');
        CRUD::field(FaqListContract::IMAGE)->type('image')->label('Фото');
        CRUD::field(FaqListContract::STATUS)->label('Статус')->type('select_from_array')->options([
            FaqListContract::ON    =>  'Включен',
            FaqListContract::OFF   =>  'Отключен'
        ]);

    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
