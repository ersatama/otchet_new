<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TaxRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class TaxCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\Tax::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/tax');
        CRUD::setEntityNameStrings('Налог', 'Налоги');
    }

    protected function setupListOperation()
    {
        CRUD::column('user_id');
        CRUD::column('organization_id');
        CRUD::column('iin');
        CRUD::column('full_name');
        CRUD::column('year');
        CRUD::column('semester');
        CRUD::column('separate_categories');
        CRUD::column('declaration_type');
        CRUD::column('notification_number');
        CRUD::column('notification_date');
        CRUD::column('resident');
        CRUD::column('body');
        CRUD::column('full_name_taxpayer');
        CRUD::column('declaration_date');
        CRUD::column('government_revenue_code');
        CRUD::column('government_revenue_code_by_place');
        CRUD::column('sent');
        CRUD::column('status');
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(TaxRequest::class);

        CRUD::field('user_id');
        CRUD::field('organization_id');
        CRUD::field('iin');
        CRUD::field('full_name');
        CRUD::field('year');
        CRUD::field('semester');
        CRUD::field('separate_categories');
        CRUD::field('declaration_type');
        CRUD::field('notification_number');
        CRUD::field('notification_date');
        CRUD::field('resident');
        CRUD::field('body');
        CRUD::field('full_name_taxpayer');
        CRUD::field('declaration_date');
        CRUD::field('government_revenue_code');
        CRUD::field('government_revenue_code_by_place');
        CRUD::field('sent');
        CRUD::field('status');

    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
