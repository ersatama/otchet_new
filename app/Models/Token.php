<?php

namespace App\Models;

use App\Domain\Contracts\TokenContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    use HasFactory;

    protected $fillable =   TokenContract::FILLABLE;
}
