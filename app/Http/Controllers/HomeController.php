<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuestBook\StoreRequest;
use App\Models\GuestBook;
use App\Services\GuestBookService;

class HomeController extends Controller
{
    public function index()
    {
        $messages = GuestBook::active()
            ->latest()
            ->paginate(10);

        return view('guestbook.index', ['messages' => $messages]);
    }

    public function store(StoreRequest $request, GuestBookService $service)
    {
        $service->create($request->validated());

        return redirect()
            ->route('home')
            ->with('status', 'Сообщение будет доступно после проверки модератором');
    }

    public function login()
    {
        return view('admin.login');
    }
}
