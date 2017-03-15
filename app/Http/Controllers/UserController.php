<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller{

    public function __construct(){
        // $this->middleware($attr = array(
        //     'auth' => ['edit', 'update'],
        // ));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        //return view('users.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $rules = array(
            'name' => 'required',
            'email' =>  'required|email',
            'password'  =>  'required|confirmed',
            'password_confirmation' =>  'required',
        );
        $this->validate($request, $rules);


        User::create(array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
        ));

        return redirect('login')
                ->with('flash_notification.message', 'User registered successfully')
                ->with('flash_notification.level', 'success');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $user = User::find($id);
        return view('users.profile', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $user = User::find($id);

        $rules = array(
            'name' => 'required',
            'email' =>  'required|email',
            'password'  =>  'confirmed',
         );

         $this->validate($request, $rules);

         if($request->get('password') !== ''){
             $user->password = $request->get('password');
         }

         $user->name = $request->get('name');
         $user->email = $request->get('email');


         $user->save();
         
         return redirect('/')
            ->with('flash_notification.message', 'Profile update successfully.')
            ->with('flash_notification.level', 'success');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
