<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Domain\Contracts\NewsListContract;

class CreateNewsListsTable extends Migration
{

    public function up()
    {
        Schema::create(NewsListContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->bigInteger(NewsListContract::NEWS_ID);
            $table->text(NewsListContract::DESCRIPTION)->nullable();
            $table->string(NewsListContract::IMAGE)->nullable();
            $table->enum(NewsListContract::STATUS,[
                NewsListContract::ON,
                NewsListContract::OFF
            ])->default(NewsListContract::ON);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists(NewsListContract::TABLE);
    }
}
