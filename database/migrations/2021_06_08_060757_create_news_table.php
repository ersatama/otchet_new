<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Domain\Contracts\NewsContract;

class CreateNewsTable extends Migration
{

    public function up()
    {
        Schema::create(NewsContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->string(NewsContract::TITLE)->nullable();
            $table->text(NewsContract::IMAGE)->nullable();
            $table->enum(NewsContract::STATUS,[
                NewsContract::ON,
                NewsContract::OFF
            ])->default(NewsContract::ON);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists(NewsContract::TABLE);
    }
}
