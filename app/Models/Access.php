<?php

namespace App\Models;

use App\Domain\Contracts\AccessContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
    use HasFactory;
    protected $fillable =   AccessContract::FILLABLE;
}
