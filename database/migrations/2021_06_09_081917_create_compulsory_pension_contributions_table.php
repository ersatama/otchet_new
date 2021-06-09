<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Domain\Contracts\CompulsoryPensionContributionContract;

class CreateCompulsoryPensionContributionsTable extends Migration
{

    public function up()
    {
        Schema::create(CompulsoryPensionContributionContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->bigInteger(CompulsoryPensionContributionContract::USER_ID);
            $table->smallInteger(CompulsoryPensionContributionContract::PAYMENT_TYPE)->default(1);
            $table->date(CompulsoryPensionContributionContract::PAYMENT_DATE);
            $table->string(CompulsoryPensionContributionContract::BIN);
            $table->string(CompulsoryPensionContributionContract::IIN);
            $table->string(CompulsoryPensionContributionContract::SUM);
            $table->enum(CompulsoryPensionContributionContract::STATUS,[
                CompulsoryPensionContributionContract::ON,
                CompulsoryPensionContributionContract::OFF
            ])->default(CompulsoryPensionContributionContract::ON);
            $table->enum(CompulsoryPensionContributionContract::SENT,[
                CompulsoryPensionContributionContract::ON,
                CompulsoryPensionContributionContract::OFF
            ])->default(CompulsoryPensionContributionContract::OFF);
            $table->timestamps();
            $table->index(CompulsoryPensionContributionContract::USER_ID);
        });
    }

    public function down()
    {
        Schema::dropIfExists(CompulsoryPensionContributionContract::TABLE);
    }
}
