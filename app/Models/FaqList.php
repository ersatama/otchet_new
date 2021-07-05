<?php

namespace App\Models;

use App\Domain\Contracts\FaqContract;
use App\Domain\Contracts\FaqListContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class FaqList extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;
    protected $fillable =   FaqListContract::FILLABLE;

    public function faq()
    {
        return $this->belongsTo(Faq::class,FaqListContract::FAQ_ID,FaqContract::ID);
    }

    public function setImageAttribute($value)
    {
        $disk               =   config('backpack.base.root_disk_name');
        $destination_path   =   'public/uploads/';
        if ($value == null) {
            Storage::disk($disk)->delete($this->{FaqListContract::IMAGE});
            $this->attributes[FaqListContract::IMAGE] = null;
        }
        if (Str::startsWith($value, 'data:image'))
        {
            $image = Image::make($value)->encode('jpg', 90);
            $filename = md5($value.time()).'.jpg';
            Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());
            Storage::disk($disk)->delete($this->{FaqListContract::IMAGE});
            $public_destination_path = Str::replaceFirst('public/', '', $destination_path);
            $this->attributes[FaqListContract::IMAGE] = $public_destination_path.'/'.$filename;
        }
    }

}
