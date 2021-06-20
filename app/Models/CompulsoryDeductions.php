<?php

namespace App\Models;

use App\Domain\Contracts\CompulsoryDeductionsContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompulsoryDeductions extends Model
{
    use HasFactory;
    protected $fillable =   CompulsoryDeductionsContract::FILLABLE;
}
