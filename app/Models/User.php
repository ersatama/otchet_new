<?php

namespace App\Models;

use App\Domain\Contracts\OrganizationContract;
use App\Domain\Contracts\RoleContract;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Domain\Contracts\UserContract;

class User extends Authenticatable
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory, Notifiable;

    protected $fillable =   UserContract::FILLABLE;
    protected $hidden   =   UserContract::HIDDEN;
    protected $casts    =   UserContract::CASTS;

    public function roles()
    {
        return $this->belongsTo(Role::class,UserContract::ROLE_ID,RoleContract::ID);
    }

    public function organization()
    {
        return $this->hasMany(Organization::class,UserContract::ID,OrganizationContract::USER_ID);
    }
}
