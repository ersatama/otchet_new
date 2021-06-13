<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Domain\Contracts\BankContract;

class CreateBanksTable extends Migration
{

    public function up()
    {
        Schema::create(BankContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->bigInteger(BankContract::USER_ID);
            $table->string(BankContract::BIC)->nullable();
            $table->string(BankContract::IIC)->nullable();
            $table->string(BankContract::NAME)->nullable();
            $table->enum(BankContract::STATUS,[
                BankContract::ON,
                BankContract::OFF
            ])->default(BankContract::ON);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists(BankContract::TABLE);
    }
}
