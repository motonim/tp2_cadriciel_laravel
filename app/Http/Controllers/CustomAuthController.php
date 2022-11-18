<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.create');
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
            'name' => 'required|unique:users|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|max:255',
        ]);

        $user = new User;
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $user->save();

        //email
        // $to_name = $request->name;
        // $to_email = $request->email;
        // $body="<a href='route'>Cliquez ici pour confirmer votre compte</a>";

        // Mail::send('auth.mail', $data =[
        //     'name'=>$to_name,
        //     'body' => $body
        // ],function($message) use ($to_name, $to_email) {
        //     $message->to($to_email, $to_name)->subject('Courriel de test de Laravel ');
        // });
            
        // return redirect("login")->withSuccess('Message envoyé');

        // return redirect('login');
        // return redirect()->back()->withSuccess('User enregistré');
        return redirect(route('login'))->withSuccess('User enregistré');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function authentication(Request $request){
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|max:255'
        ]);

        $credentials = $request->only('email', 'password');

        if(!Auth::validate($credentials)) :
            return redirect('login')
                ->withErrors(trans('auth.failed')); // if there is error, it will find the 'failed' line on resources/lang/auth.php
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user, $request->get('remember'));

        return redirect()->intended('dashboard')->withSuccess('Signed in');
    }

    public function logout() {
        Session::flush();
        Auth::logout();

        return redirect(route('login'));
    }

    public function dashboard() {

        $name = 'Guest';

        if(Auth::check()) {
            $name = Auth::user()->name;
        }

        $author = Auth::user()->id;

        $articles = Article::select()
        ->where('author_id', '=', $author)
        ->get();

        return view('etudiant.dashboard', ['name' => $name, 'articles' => $articles]);
    }
}
