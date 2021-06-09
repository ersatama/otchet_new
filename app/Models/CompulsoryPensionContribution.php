<?php

namespace App\Models;

use App\Domain\Contracts\CompulsoryPensionContributionContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompulsoryPensionContribution extends Model
{
    use HasFactory;
    protected $fillable =   CompulsoryPensionContributionContract::FILLABLE;
}
