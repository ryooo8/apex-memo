<?php

namespace App\Http\Controllers;

use App\Memo;

class MainController extends Controller
{
    public function index()
    {
        $memos = Memo::with(['user', 'comments'])->get();

        foreach ($memos as $memo) {
            $memo['name'] = $memo->user->name;
            $memo['count_comments'] = $memo->comments->count();
        }

        return view('index', ['memos' => $memos]);
    }
}
