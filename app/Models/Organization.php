<?php

namespace App\Models;

use App\Domain\Contracts\OrganizationContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;
    protected $fillable =   OrganizationContract::FILLABLE;
}
