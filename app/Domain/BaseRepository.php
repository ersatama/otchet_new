<?php

namespace App\Domain;

use App\Domain\Contracts\MainContract;

trait BaseRepository
{
    protected $model;

    public function getById(int $id, $with = '')
    {
        if ($with) {
            if (is_array($with)) {
                $model  =   $this->model::where(MainContract::ID,$id)->first();
                foreach ($with as &$item) {
                    $model->{$item};
                }
                return $model;
            }
            return $this->model::with($with)->where(MainContract::ID,$id)->first();
        }
        return $this->model::where(MainContract::ID,$id)->first();
    }

    public function update(int $id, array $data, $with = '')
    {
        $this->model::where(MainContract::ID,$id)->update($data);
        return $this->getById($id,$with);
    }

    public function create(array $data, $with = '')
    {
        $model  =   $this->model::create($data);
        return $this->getById($model->id,$with);
    }

    public function getByColumn(string $column, $value, $limit = true)
    {
        if ($limit) {
            return $this->model::where($column,$value)->first();
        }
        return $this->model::where($column,$value)->get();
    }
}
