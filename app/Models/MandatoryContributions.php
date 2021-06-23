<?php

namespace App\Models;

use App\Domain\Contracts\MandatoryContributionsContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MandatoryContributions extends Model
{
    use HasFactory;
    protected $fillable =   MandatoryContributionsContract::FILLABLE;
}
