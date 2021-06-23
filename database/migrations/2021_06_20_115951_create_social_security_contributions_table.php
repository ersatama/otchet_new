<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Domain\Contracts\SocialSecurityContributionsContract;

class CreateSocialSecurityContributionsTable extends Migration
{

    public function up()
    {
        Schema::create(SocialSecurityContributionsContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->bigInteger(SocialSecurityContributionsContract::USER_ID);
            $table->smallInteger(SocialSecurityContributionsContract::PAYMENT_TYPE)->default(1);
            $table->date(SocialSecurityContributionsContract::PAYMENT_DATE);
            $table->string(SocialSecurityContributionsContract::BIN);
            $table->string(SocialSecurityContributionsContract::IIN);
            $table->string(SocialSecurityContributionsContract::SUM);
            $table->enum(SocialSecurityContributionsContract::STATUS,[
                SocialSecurityContributionsContract::ON,
                SocialSecurityContributionsContract::OFF
            ])->default(SocialSecurityContributionsContract::ON);
            $table->enum(SocialSecurityContributionsContract::SENT,[
                SocialSecurityContributionsContract::ON,
                SocialSecurityContributionsContract::OFF
            ])->default(SocialSecurityContributionsContract::OFF);
            $table->timestamps();
            $table->index(SocialSecurityContributionsContract::USER_ID);
        });
    }

    public function down()
    {
        Schema::dropIfExists(SocialSecurityContributionsContract::TABLE);
    }
}
