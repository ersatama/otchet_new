<?php

namespace App\Models;

use App\Domain\Contracts\OrganizationContract;
use App\Domain\Contracts\StaffContract;
use App\Domain\Contracts\UserContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $fillable =   StaffContract::FILLABLE;

    public function organization()
    {
        return $this->belongsTo(Organization::class,StaffContract::ORGANIZATION_ID,OrganizationContract::ID);
    }

    public function user()
    {
        return $this->belongsTo(User::class,StaffContract::USER_ID,UserContract::ID);
    }
}
