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
    
////////////////////////// 

     public function global()
    {
        return view('TimeTable.timeTable');
    }
////////////////////////// 
 public function group(string $groupId)
{
    
    $filePath = storage_path('app/json/schedule.json');
    $jsonData = file_get_contents($filePath);
    $schedule = json_decode($jsonData, true);
    $filteredSchedule = [];
    foreach ($schedule as $group) {
        if ($group['Group'] === $groupId) {
            $filteredSchedule = $group;
            break; 
        }
    }

    return view('TimeTable.timeTable', ['schedule' => $filteredSchedule]);
}

    
}