<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Domain\Contracts\FaqContract;

class Faq extends Model
{
    use HasFactory;

    protected $fillable =   FaqContract::FILLABLE;
}
