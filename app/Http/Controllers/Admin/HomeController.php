<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GuestBook;

class HomeController extends Controller
{
    public function index()
    {
        $this->authorize('admin');

        $messages = GuestBook::inActive()
            ->paginate(10);

        return view('admin.home', ['messages' => $messages]);
    }

    public function confirm(GuestBook $guestBook)
    {
        $this->authorize('admin');

        $guestBook->status = true;
        $guestBook->save();

        return back();
    }

    public function delete(GuestBook $guestBook)
    {
        $this->authorize('admin');
        $guestBook->delete();

        return back();
    }
}
