<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Domain\Contracts\FaqListContract;

class CreateFaqListsTable extends Migration
{

    public function up()
    {
        Schema::create(FaqListContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->bigInteger(FaqListContract::FAQ_ID);
            $table->text(FaqListContract::DESCRIPTION)->nullable();
            $table->string(FaqListContract::IMAGE)->nullable();
            $table->enum(FaqListContract::STATUS,[
                FaqListContract::ON,
                FaqListContract::OFF
            ])->default(FaqListContract::ON);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists(FaqListContract::TABLE);
    }
}
