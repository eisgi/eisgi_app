<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class Timetable extends Controller
{
    public function index(string $groupId)
    {
        return view('TimeTable.timeTable', ['group' => 154]);
    }
}