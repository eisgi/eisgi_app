<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Jour;
use Illuminate\Http\Request;
use App\Traits\SchoolSession;
use App\Interfaces\SchoolSessionInterface;

class JourController extends Controller
{
    use SchoolSession;
    protected $schoolSessionRepository;

    public function __construct(SchoolSessionInterface $schoolSessionRepository) {
        $this->schoolSessionRepository = $schoolSessionRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $current_school_session_id = $this->getSchoolCurrentSession();

            $data = Jour::whereDate('start', '>=', $request->start)
                    ->whereDate('end',   '<=', $request->end)
                    ->where('session_id', $current_school_session_id)
                    ->get(['id', 'title', 'start', 'end']);
            return response()->json($data);
        }
        return view('Jours.index');
    }

    public function calendarJours(Request $request)
    {
        $current_school_session_id = $this->getSchoolCurrentSession();
        $Jour = null;
        switch ($request->type) {
            case 'create':
                $Jour = Jour::create([
                    'title' => $request->title,
                    'start' => $request->start,
                    'end' => $request->end,
                    'session_id' => $current_school_session_id
                ]);
                break;
  
            case 'edit':
                $Jour = Jour::find($request->id)->update([
                    'title' => $request->title,
                    'start' => $request->start,
                    'end' => $request->end,
                ]);
                break;
  
            case 'delete':
                $Jour = Jour::find($request->id)->delete();
                break;
             
            default:
                break;
        }
        dd($Jour);
        return response()->json($Jour);
    }
}