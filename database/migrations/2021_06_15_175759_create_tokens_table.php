<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Domain\Contracts\TokenContract;

class CreateTokensTable extends Migration
{

    public function up()
    {
        Schema::create(TokenContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->bigInteger(TokenContract::USER_ID);
            $table->enum(TokenContract::DEVICE,[
                TokenContract::ANDROID,
                TokenContract::IOS
            ])->default(TokenContract::ANDROID);
            $table->text(TokenContract::TOKEN)->nullable();
            $table->enum(TokenContract::STATUS,[
                TokenContract::ON,
                TokenContract::OFF
            ])->default(TokenContract::ON);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists(TokenContract::TABLE);
    }
}
