<?php


namespace App\Domain\Repositories;

use App\Domain\BaseRepository;
use App\Domain\Contracts\MainContract;
use App\Domain\Repositories\Interfaces\NewsRepositoryInterface;
use App\Models\News;

class NewsRepositoryEloquent implements NewsRepositoryInterface
{
    use BaseRepository;
    protected $model;
    public function __construct()
    {
        $this->model    =   News::class;
    }

    public function get()
    {
        return $this->model::where(MainContract::STATUS,MainContract::ON)->get();
    }
}
