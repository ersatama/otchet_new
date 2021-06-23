<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Domain\Contracts\CompulsoryDeductionsContract;

class CreateCompulsoryDeductionsTable extends Migration
{

    public function up()
    {
        Schema::create(CompulsoryDeductionsContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->bigInteger(CompulsoryDeductionsContract::USER_ID);
            $table->smallInteger(CompulsoryDeductionsContract::PAYMENT_TYPE)->default(1);
            $table->date(CompulsoryDeductionsContract::PAYMENT_DATE);
            $table->string(CompulsoryDeductionsContract::BIN);
            $table->string(CompulsoryDeductionsContract::IIN);
            $table->string(CompulsoryDeductionsContract::SUM);
            $table->enum(CompulsoryDeductionsContract::STATUS,[
                CompulsoryDeductionsContract::ON,
                CompulsoryDeductionsContract::OFF
            ])->default(CompulsoryDeductionsContract::ON);
            $table->enum(CompulsoryDeductionsContract::SENT,[
                CompulsoryDeductionsContract::ON,
                CompulsoryDeductionsContract::OFF
            ])->default(CompulsoryDeductionsContract::OFF);
            $table->timestamps();
            $table->index(CompulsoryDeductionsContract::USER_ID);
        });
    }

    public function down()
    {
        Schema::dropIfExists(CompulsoryDeductionsContract::TABLE);
    }
}
