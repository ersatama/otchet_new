<?php


namespace App\Domain\Repositories;

use App\Domain\BaseRepository;
use App\Domain\Repositories\Interfaces\NotificationRepositoryInterface;
use App\Models\Notification;
use App\Domain\Contracts\NotificationContract;

class NotificationRepositoryEloquent implements NotificationRepositoryInterface
{
    use BaseRepository;
    protected $model;

    public function __construct()
    {
        $this->model    =   Notification::class;
    }

    public function create($data)
    {
        return $this->model::create($data);
    }

    public function update($id, $data)
    {
        return $this->model::where(NotificationContract::ID,$id)->update($data);
    }

    public function getById(int $id)
    {
        return $this->model::where([
            [NotificationContract::ID,$id],
            [NotificationContract::STATUS,NotificationContract::ON]
        ])->first();
    }

    public function delete($id)
    {
        $this->model::where(NotificationContract::ID,$id)->update([
            NotificationContract::STATUS    =>  NotificationContract::OFF
        ]);
    }

    public function list()
    {
        return $this->model::where(NotificationContract::STATUS,NotificationContract::ON)->get();
    }


}
