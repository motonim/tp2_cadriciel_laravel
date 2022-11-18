<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Ville;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Welcome to Maisonneuve{2196102}';
        $etudiants = Etudiant::orderBy('nom')->paginate(15);
        return view('etudiant.index', ['etudiants' => $etudiants])->with('title', $title);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $villes = Ville::all();
        return view('etudiant.create', ['villes' => $villes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|unique:etudiants|max:100',
            'adresse' => 'required|max:255',
            'phone' => 'required|max:255',
            'email' => 'required|email|max:255',
            'birthday' => 'required|date',
            'ville_id' => 'required'
        ]);

        $etudiantsUesrsId = Etudiant::pluck('id')->all();
        $users = User::whereNotIn('id', $etudiantsUesrsId)->select()->get();
        // print_r($users->random()->id);
        $newId = $users->random()->id;

        //   SELECT * FROM `users` LEFT JOIN `etudiants` on etudiants.users_id = users.id where users.id NOT IN (SELECT users_id FROM `etudiants`)


        // print_r(User::all('name')->unique);

        // $users = User::select()
        //     ->leftJoin('etudiants', 'users.id', '!=', 'etudiants.users_id')
        //     ->get();

    //     $users = User::leftJoin('etudiants', 'etudiants.users_id', '=', 'users.id')
    //   ->whereNotIn('book_price', [100,200])
    //   ->get();

       



        // return $request;
        $nouvelEtudiant = Etudiant::create([
            'id' => $newId,
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'phone' => $request->phone,
            'email' => $request->email,
            'birthday' => $request->birthday,
            'ville_id' => $request->ville_id
        ]);
        // return $newPost;
        // return $nouvelEtudiant;
        // die();
        return redirect('etudiant/' . $newId);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function show(Etudiant $etudiant)
    {
        $name = $etudiant->nom;
        return view('etudiant.show', ['etudiant' => $etudiant])->with('title', $name);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function edit(Etudiant $etudiant)
    {
        $villes = Ville::all();
        $title = "Modifier l'information";
        return view('etudiant.edit', ['etudiant' => $etudiant, 'villes' => $villes])->with('title', $title);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Etudiant $etudiant)
    {        
        $request->validate([
            'nom' => 'required|unique:etudiants|max:100',
            'adresse' => 'required|max:255',
            'phone' => 'required|max:255',
            'email' => 'required|email|max:255',
            'birthday' => 'required|date',
            'ville_id' => 'required'
        ]);
        
        $etudiant->update([
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'phone' => $request->phone,
            'email' => $request->email,
            'birthday' => $request->birthday,
            'ville_id' => $request->ville_id        
        ]);

        return redirect(route('etudiant.show', $etudiant->id));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etudiant $etudiant)
    {
        $etudiant->delete();
        return redirect(route('etudiant.index'));
    }
}
