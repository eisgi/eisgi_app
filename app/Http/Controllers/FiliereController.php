<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\Filiere;
use Illuminate\Http\Request;
use League\Csv\Reader;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class FiliereController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


public function AF(Request $request)
{
  

    $file = $request->file('file');

    try {
        $csv = Reader::createFromPath($file->getPathname(), 'r');
        $csv->setHeaderOffset(0);
        $data = $csv->getRecords();

        DB::beginTransaction();

        foreach ($data as $row) {
            if (isset($row['codeFiliere']) && isset($row['libelleFiliere'])) {
                Filiere::create([
                    'codeFiliere' => $row['codeFiliere'],
                    'libelleFiliere' => $row['libelleFiliere']
                ]);
            }
        }

        DB::commit();

        // Flash success message to the session
        return redirect()->back()->with('success', 'Les filières ont été importées avec succès.');
    } catch (\Exception $e) {
        DB::rollBack();
     Log::error($e->getMessage());

        // Redirect back with error message
        return redirect()->back()->withErrors(['file' => 'Une erreur s\'est produite lors de l\'importation des données.']);
    }
}



    public function index()
    {
        $filieres = Filiere::all();
        return view('admin.filieres.filieres', compact('filieres'));
    }

    public function returnForm(){
        return view('admin.filieres.insertFilieres');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Filiere  $filiere
     * @return \Illuminate\Http\Response
     */
    public function show(Filiere $filiere)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Filiere  $filiere
     * @return \Illuminate\Http\Response
     */
    public function edit(Filiere $filiere)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Filiere  $filiere
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Filiere $filiere)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Filiere  $filiere
     * @return \Illuminate\Http\Response
     */
    public function destroy(Filiere $filiere)
    {
        //
    }
}