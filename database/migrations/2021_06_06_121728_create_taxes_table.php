<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Domain\Contracts\TaxContract;

class CreateTaxesTable extends Migration
{

    public function up()
    {
        Schema::create(TaxContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->bigInteger(TaxContract::USER_ID);
            $table->bigInteger(TaxContract::ORGANIZATION_ID);
            $table->string(TaxContract::IIN);
            $table->string(TaxContract::FULL_NAME);
            $table->year(TaxContract::YEAR);
            $table->enum(TaxContract::SEMESTER,[
                TaxContract::FIRST,
                TaxContract::SECOND
            ])->default(TaxContract::FIRST);
            $table->smallInteger(TaxContract::SEPARATE_CATEGORIES)->default(1);
            $table->smallInteger(TaxContract::DECLARATION_TYPE)->default(1);
            $table->string(TaxContract::NOTIFICATION_NUMBER)->nullable();
            $table->date(TaxContract::NOTIFICATION_DATE)->nullable();
            $table->enum(TaxContract::RESIDENT,[
                TaxContract::ON,
                TaxContract::OFF
            ])->default(TaxContract::ON);
            $table->longText(TaxContract::BODY)->nullable();
            $table->string(TaxContract::FULL_NAME_TAXPAYER);
            $table->date(TaxContract::DECLARATION_DATE);
            $table->string(TaxContract::GOVERNMENT_REVENUE_CODE);
            $table->string(TaxContract::GOVERNMENT_REVENUE_CODE_BY_PLACE);
            $table->enum(TaxContract::SENT,[
                TaxContract::ON,
                TaxContract::OFF
            ])->default(TaxContract::ON);
            $table->enum(TaxContract::STATUS,[
                TaxContract::ON,
                TaxContract::OFF
            ])->default(TaxContract::ON);
            $table->timestamps();
            $table->index(TaxContract::USER_ID);
            $table->index(TaxContract::ORGANIZATION_ID);
        });
    }

    public function down()
    {
        Schema::dropIfExists(TaxContract::TABLE);
    }

}
