<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;

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
////////////////////////// 
   public function exportToPdf(Request $request)
    {
        // Retrieve the HTML content from the request
        $htmlContent = $request->input('htmlContent');

        // Generate PDF using Laravel Snappy
        $pdf = PDF::loadHTML($htmlContent);

        // Return the PDF for download
        return $pdf->download('time_table.pdf');
    }
}