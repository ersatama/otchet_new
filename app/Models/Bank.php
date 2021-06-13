<?php

namespace App\Models;

use App\Domain\Contracts\BankContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;
    protected $fillable =   BankContract::FILLABLE;
}
