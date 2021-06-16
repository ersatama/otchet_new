<?php


namespace App\Services;

use App\Domain\Repositories\Interfaces\NotificationRepositoryInterface;

class NotificationService extends BaseService
{

    protected $notificationRepository;
    public function __construct(NotificationRepositoryInterface $notificationRepository)
    {
        $this->notificationRepository   =   $notificationRepository;
    }

    public function create($request)
    {
        return $this->notificationRepository->create($request);
    }

    public function update($id, $request)
    {
        return $this->notificationRepository->update($id, $request);
    }

    public function getById($id)
    {
        return $this->notificationRepository->getById($id);
    }

    public function delete($id)
    {
        $this->notificationRepository->delete($id);
    }

    public function list()
    {
        return $this->notificationRepository->list();
    }

}
