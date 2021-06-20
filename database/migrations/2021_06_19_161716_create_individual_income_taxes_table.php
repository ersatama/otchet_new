<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Domain\Contracts\IndividualIncomeTaxContract;

class CreateIndividualIncomeTaxesTable extends Migration
{

    public function up()
    {
        Schema::create(IndividualIncomeTaxContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->bigInteger(IndividualIncomeTaxContract::USER_ID);
            $table->string(IndividualIncomeTaxContract::IIN);
            $table->string(IndividualIncomeTaxContract::SUM);
            $table->enum(IndividualIncomeTaxContract::STATUS,[
                IndividualIncomeTaxContract::ON,
                IndividualIncomeTaxContract::OFF
            ])->default(IndividualIncomeTaxContract::ON);
            $table->enum(IndividualIncomeTaxContract::SENT,[
                IndividualIncomeTaxContract::ON,
                IndividualIncomeTaxContract::OFF
            ])->default(IndividualIncomeTaxContract::OFF);
            $table->timestamps();
            $table->index(IndividualIncomeTaxContract::USER_ID);
        });
    }

    public function down()
    {
        Schema::dropIfExists(IndividualIncomeTaxContract::TABLE);
    }
}
