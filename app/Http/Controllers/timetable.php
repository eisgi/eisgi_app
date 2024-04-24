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
        // Get the path to the JSON file
        $filePath = storage_path('app/json/schedule.json');

        // Read the JSON data from the file
        $jsonData = file_get_contents($filePath);

        // Decode the JSON data to an associative array
        $schedule = json_decode($jsonData, true);

        // Pass the schedule data to the view
        return view('TimeTable.timeTable', ['schedule' => $schedule]);
    }
     public function global()
    {
        return view('TimeTable.timeTable');
    }
    
}