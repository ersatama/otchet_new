<?php

namespace App\Models;

use App\Domain\Contracts\FaqListContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Domain\Contracts\FaqContract;

class Faq extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    protected $fillable =   FaqContract::FILLABLE;

    public function faqList()
    {
        return $this->hasMany(FaqList::class,FaqContract::ID,FaqListContract::FAQ_ID);
    }

}
