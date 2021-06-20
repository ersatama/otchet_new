<?php

namespace App\Models;

use App\Domain\Contracts\SocialSecurityContributionsContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialSecurityContributions extends Model
{
    use HasFactory;
    protected $fillable =   SocialSecurityContributionsContract::FILLABLE;
}
