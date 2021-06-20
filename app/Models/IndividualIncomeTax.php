<?php

namespace App\Models;

use App\Domain\Contracts\IndividualIncomeTaxContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndividualIncomeTax extends Model
{
    use HasFactory;
    protected $fillable =   IndividualIncomeTaxContract::FILLABLE;
}
