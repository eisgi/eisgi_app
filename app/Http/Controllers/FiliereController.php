<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\Filiere;
use Illuminate\Http\Request;
use League\Csv\Reader;

class FiliereController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
public function AF(Request $request)
{
    // Validate the request
    $request->validate([
        'file' => 'required|file|mimes:csv',
    ]);

    // Retrieve the uploaded file
    $file = $request->file('file');

    // Attempt to read the CSV file
    try {
        $csv = Reader::createFromPath($file->getPathname(), 'r');
        $csv->setHeaderOffset(0); // Assuming the first row is the header row
        $data = $csv->getRecords();
    } catch (\Exception $e) {
        // Handle any exceptions that occur during file reading
        return redirect()->back()->withErrors(['file' => 'An error occurred while reading the CSV file.']);
    }

    // Process each row and insert into the database
    foreach ($data as $row) {
        try {
            // Ensure the keys exist in the $row array before accessing them
            if (isset($row['codeFiliere']) && isset($row['libelleFiliere'])) {
                Filiere::create([
                    'codeFiliere' => $row['codeFiliere'],
                    'libelleFiliere' => $row['libelleFiliere']
                ]);
            }
        } catch (\Exception $e) {
            // Handle any exceptions that occur during database insertion
            return redirect()->back()->withErrors(['file' => 'An error occurred while inserting data into the database.']);
        }
    }

    // Flash success message to the session
    Session::flash('success', 'Les filières ont été importées avec succès.');

    // Redirect back with success message
    return redirect()->back();
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