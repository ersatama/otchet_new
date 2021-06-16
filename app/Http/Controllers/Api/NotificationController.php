<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Services\NotificationService;

use App\Http\Requests\Notification\NotificationCreateRequest;
use App\Http\Requests\Notification\NotificationUpdateRequest;

use App\Http\Resources\NotificationResource;
use App\Http\Resources\NotificationCollection;

use App\Jobs\MobileNotification;

class NotificationController extends Controller
{

    protected $notificationService;
    protected $mobileNotification;
    public function __construct(NotificationService $notificationService, MobileNotification $mobileNotification)
    {
        $this->notificationService  =   $notificationService;
        $this->mobileNotification   =   $mobileNotification;
    }

    public function create(NotificationCreateRequest $request)
    {
        return new NotificationResource($this->notificationService->create($request->validated()));
    }

    public function update($id, NotificationUpdateRequest $request)
    {
        if ($user   =   $this->notificationService->update($id, $request->validated())) {
            return new NotificationResource($user);
        }
        return response(['message'   =>  'Notification Not Found'],400);
    }

    public function getById($id)
    {
        if ($user   =   $this->notificationService->getById($id)) {
            return new NotificationResource($user);
        }
        return response(['message'   =>  'Notification Not Found'],400);
    }

    public function delete($id)
    {
        $this->notificationService->delete($id);
    }

    public function list()
    {
        return new NotificationCollection($this->notificationService->list());
    }

    public function send($id)
    {
        if ($notification   =   $this->notificationService->getById($id)) {
            MobileNotification::dispatch($notification);
            return response(['message'   =>  'Message sent'],200);
        }
        return response(['message'   =>  'Notification Not Found'],400);
    }

}
