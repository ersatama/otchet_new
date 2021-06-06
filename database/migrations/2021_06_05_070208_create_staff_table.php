<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Domain\Contracts\StaffContract;

class CreateStaffTable extends Migration
{

    public function up()
    {
        Schema::create(StaffContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->bigInteger(StaffContract::ORGANIZATION_ID);
            $table->bigInteger(StaffContract::USER_ID);
            $table->string(StaffContract::SALARY);
            $table->enum(StaffContract::STATUS,[
                StaffContract::ON,
                StaffContract::OFF
            ])->default(StaffContract::ON);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists(StaffContract::TABLE);
    }

}
