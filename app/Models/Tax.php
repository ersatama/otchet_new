<?php

namespace App\Models;

use App\Domain\Contracts\TaxContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    use HasFactory;

    protected $fillable =   TaxContract::FILLABLE;
}
