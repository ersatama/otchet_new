<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Domain\Contracts\UserContract;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(UserContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->smallInteger(UserContract::ROLE_ID);
            $table->enum(UserContract::RESIDENT,[
                UserContract::ON,
                UserContract::OFF,
                UserContract::UNDEFINED
            ])->default(UserContract::UNDEFINED);
            $table->bigInteger(UserContract::IIN)->unique();
            $table->string(UserContract::NAME)->nullable();
            $table->string(UserContract::SURNAME)->nullable();
            $table->string(UserContract::LAST_NAME)->nullable();
            $table->string(UserContract::EMAIL)->unique()->nullable();
            $table->timestamp(UserContract::EMAIL_VERIFIED_AT)->nullable();
            $table->text(UserContract::GOVERNMENT_REVENUE_CODE)->nullable();
            $table->text(UserContract::GOVERNMENT_REVENUE_CODE_BY_PLACE)->nullable();
            $table->enum(UserContract::STATUS,[
                UserContract::ON,
                UserContract::OFF
            ])->default(UserContract::ON);
            $table->string(UserContract::PASSWORD);
            $table->string(UserContract::API_TOKEN, 80)
                ->unique()
                ->nullable()
                ->default(null);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(UserContract::TABLE);
    }
}
