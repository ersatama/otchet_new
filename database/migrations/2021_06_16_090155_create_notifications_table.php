<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Domain\Contracts\NotificationContract;

class CreateNotificationsTable extends Migration
{

    public function up()
    {
        Schema::create(NotificationContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->string(NotificationContract::TITLE)->nullable();
            $table->text(NotificationContract::DESCRIPTION)->nullable();
            $table->enum(NotificationContract::STATUS,[
                NotificationContract::ON,
                NotificationContract::OFF
            ])->default(NotificationContract::ON);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists(NotificationContract::TABLE);
    }
}
