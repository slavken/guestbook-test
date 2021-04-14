<?php

namespace App\Services;

use App\Models\GuestBook;

class GuestBookService
{
    public function create(array $data)
    {
        $guestBook = new GuestBook();
        $guestBook->create($data);
    }
}
