<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Domain\Contracts\MandatoryContributionsContract;

class CreateMandatoryContributionsTable extends Migration
{

    public function up()
    {
        Schema::create(MandatoryContributionsContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->bigInteger(MandatoryContributionsContract::USER_ID);
            $table->smallInteger(MandatoryContributionsContract::PAYMENT_TYPE)->default(1);
            $table->date(MandatoryContributionsContract::PAYMENT_DATE);
            $table->string(MandatoryContributionsContract::IIN);
            $table->string(MandatoryContributionsContract::SUM);
            $table->enum(MandatoryContributionsContract::STATUS,[
                MandatoryContributionsContract::ON,
                MandatoryContributionsContract::OFF
            ])->default(MandatoryContributionsContract::ON);
            $table->enum(MandatoryContributionsContract::SENT,[
                MandatoryContributionsContract::ON,
                MandatoryContributionsContract::OFF
            ])->default(MandatoryContributionsContract::OFF);
            $table->timestamps();
            $table->index(MandatoryContributionsContract::USER_ID);
        });
    }

    public function down()
    {
        Schema::dropIfExists(MandatoryContributionsContract::TABLE);
    }
}
