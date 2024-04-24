<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class Timetable extends Controller
{
       public function teacher(string $id)
    {
        return view('TimeTable.timeTable', ['id' => 154]);
    }
    
    public function group(string $groupId)
    {
        return view('TimeTable.timeTable', ['group' => 154]);
    }
     public function global()
    {
        return view('TimeTable.timeTable');
    }
    
}