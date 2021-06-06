<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Domain\Contracts\OrganizationContract;

class CreateOrganizationsTable extends Migration
{

    public function up()
    {
        Schema::create(OrganizationContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->bigInteger(OrganizationContract::USER_ID);
            $table->string(OrganizationContract::TITLE)->nullable();
            $table->bigInteger(OrganizationContract::BIN);
            $table->string(OrganizationContract::EMAIL)->unique()->nullable();
            $table->enum(OrganizationContract::STATUS,[
                OrganizationContract::ON,
                OrganizationContract::OFF
            ])->default(OrganizationContract::ON);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists(OrganizationContract::TABLE);
    }

}
