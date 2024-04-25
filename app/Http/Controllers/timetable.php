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
        // Generate PDF content here (you can fetch data from the database, etc.)
        $pdfContent = 'This is a sample PDF generated using Laravel and Dompdf.';

        // Generate PDF using Dompdf
        $pdf = PDF::loadHTML($pdfContent);

        // Download the PDF file with a custom name
        return $pdf->download('time_table.pdf');
    }
}