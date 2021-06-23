<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Domain\Contracts\AccessContract;

class CreateAccessesTable extends Migration
{

    public function up()
    {
        Schema::create(AccessContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->bigInteger(AccessContract::USER_ID);
            $table->string(AccessContract::IIN);
            $table->enum(AccessContract::TAX,[
                AccessContract::ON,
                AccessContract::OFF
            ])->default(AccessContract::ON);
            $table->enum(AccessContract::VIRTUAL_WAREHOUSE,[
                AccessContract::ON,
                AccessContract::OFF
            ])->default(AccessContract::ON);
            $table->enum(AccessContract::CASH_MACHINE,[
                AccessContract::ON,
                AccessContract::OFF
            ])->default(AccessContract::ON);
            $table->enum(AccessContract::DOCUMENTS,[
                AccessContract::ON,
                AccessContract::OFF
            ])->default(AccessContract::ON);
            $table->enum(AccessContract::STATUS,[
                AccessContract::ON,
                AccessContract::OFF
            ])->default(AccessContract::ON);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists(AccessContract::TABLE);
    }
}
