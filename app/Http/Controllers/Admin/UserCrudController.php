<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Contracts\MainContract;
use App\Http\Requests\UserRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Domain\Contracts\UserContract;

class UserCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\User::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/user');
        CRUD::setEntityNameStrings('Пользователь', 'Пользователи');
    }

    protected function setupShowOperation()
    {
        $this->crud->set('show.setFromDb', false);

        CRUD::column(UserContract::RESIDENT)->label('Резидент');
        CRUD::column(UserContract::IIN)->label('ИИН');
        CRUD::column(UserContract::NAME)->label('Имя');
        CRUD::column(UserContract::SURNAME)->label('Фамилия');
        CRUD::column(UserContract::LAST_NAME)->label('Отчество');
        CRUD::column(UserContract::EMAIL)->label('Эл.почта');
        CRUD::column(UserContract::EMAIL_VERIFIED_AT)->label('Статус эл.почта');
        CRUD::column(UserContract::GOVERNMENT_REVENUE_CODE)->label('Код органа гос. доходов');
        CRUD::column(UserContract::GOVERNMENT_REVENUE_CODE_BY_PLACE)->label('Код органа гос. доходов по месту жительства');
        CRUD::column(UserContract::STATUS)->label('Статус');
    }

    protected function setupListOperation()
    {
        CRUD::column(UserContract::IIN)->label('ИИН');
        CRUD::column(UserContract::NAME)->label('Имя');
        CRUD::column(UserContract::SURNAME)->label('Фамилия');
        CRUD::column(UserContract::LAST_NAME)->label('Отчество');
        CRUD::column(UserContract::EMAIL)->label('Эл.почта');
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(UserRequest::class);

        CRUD::field(UserContract::RESIDENT)->label('Резидент')->type('select_from_array')->options([
            MainContract::ON    =>  'Да',
            MainContract::OFF   =>  'Нет'
        ]);

        CRUD::field(UserContract::IIN)->label('ИИН')->attributes([
            'required'  =>  true,
            'readonly'  =>  true
        ]);
        CRUD::field(UserContract::NAME)->label('Имя');
        CRUD::field(UserContract::SURNAME)->label('Фамилия');
        CRUD::field(UserContract::LAST_NAME)->label('Отчество');
        CRUD::field(UserContract::EMAIL)->label('Эл.почта')->attributes([
            'required'  =>  true,
            'readonly'  =>  true
        ]);
        CRUD::field(UserContract::EMAIL_VERIFIED_AT)->label('Статус эл.почта');
        CRUD::field(UserContract::GOVERNMENT_REVENUE_CODE)->label('Код органа гос. доходов');
        CRUD::field(UserContract::GOVERNMENT_REVENUE_CODE_BY_PLACE)->label('Код органа гос. доходов по месту жительства');

        CRUD::field(UserContract::STATUS)->label('Статус')->type('select_from_array')->options([
            MainContract::ON    =>  'Активный',
            MainContract::OFF   =>  'Заблокирован'
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
