<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use App\Domain\Contracts\NewsContract;
use App\Domain\Contracts\NewsListContract;
use App\Http\Requests\NewsListRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class NewsListCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\NewsList::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/newslist');
        CRUD::setEntityNameStrings('Список новостей', 'Список новостей');
    }

    protected function setupShowOperation()
    {
        CRUD::column(NewsListContract::FAQ_ID)->type('select')->label('Новость')->entity('news')->model(News::class)->attribute(NewsContract::TITLE);
        CRUD::column(NewsListContract::TITLE)->label('Заголовок');
        CRUD::column(NewsListContract::DESCRIPTION)->label('Описание');
        CRUD::column(NewsListContract::IMAGE)->type('photo')->label('Заголовок');
        CRUD::column(NewsListContract::STATUS)->label('Статус');
    }

    protected function setupListOperation()
    {
        CRUD::column(NewsListContract::NEWS_ID)->type('select')->label('Новость')->entity('news')->model(News::class)->attribute(NewsContract::TITLE);
        CRUD::column(NewsListContract::TITLE)->label('Заголовок');
        CRUD::column(NewsListContract::DESCRIPTION)->label('Описание');
        CRUD::column(NewsListContract::STATUS)->label('Статус');
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(NewsListRequest::class);

        CRUD::field(NewsListContract::NEWS_ID)->type('select')->label('Новость')->entity('news')->model(News::class)->attribute(NewsContract::TITLE);
        CRUD::field(NewsListContract::DESCRIPTION)->label('Описание');
        CRUD::field(NewsListContract::IMAGE)->type('image')->label('Фото');
        CRUD::field(NewsListContract::STATUS)->label('Статус')->type('select_from_array')->options([
            NewsListContract::ON    =>  'Включен',
            NewsListContract::OFF   =>  'Отключен'
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
