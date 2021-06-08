<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ContactsService;

class ContactsController extends Controller
{
    protected $contactsService;
    public function __construct(ContactsService $contactsService)
    {
        $this->contactsService  =   $contactsService;
    }

    public function faq()
    {
        return $this->contactsService->faq();
    }

    public function news()
    {
        return $this->contactsService->news();
    }
}
