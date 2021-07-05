<?php

namespace App\Models;

use App\Domain\Contracts\NewsContract;
use App\Domain\Contracts\NewsListContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class NewsList extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;
    protected $fillable =   NewsListContract::FILLABLE;

    public function news()
    {
        return $this->belongsTo(News::class,NewsListContract::NEWS_ID,NewsContract::ID);
    }

    public function setImageAttribute($value)
    {
        $disk               =   config('backpack.base.root_disk_name');
        $destination_path   =   'public/uploads/';
        if ($value == null) {
            Storage::disk($disk)->delete($this->{NewsListContract::IMAGE});
            $this->attributes[NewsListContract::IMAGE] = null;
        }
        if (Str::startsWith($value, 'data:image'))
        {
            $image = Image::make($value)->encode('jpg', 90);
            $filename = md5($value.time()).'.jpg';
            Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());
            Storage::disk($disk)->delete($this->{NewsListContract::IMAGE});
            $public_destination_path = Str::replaceFirst('public/', '', $destination_path);
            $this->attributes[NewsListContract::IMAGE] = $public_destination_path.'/'.$filename;
        }
    }

}
