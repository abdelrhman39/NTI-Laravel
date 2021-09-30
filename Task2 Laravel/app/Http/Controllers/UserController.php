<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use GuzzleHttp\Middleware;

class UserController extends Controller
{

    public function __construct(){
        
        $this->middleware('auth',['except'=>['login','create','store']]);
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = user::select()->get();
        
        return view('index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vaidate = $request->validate([
            'name'     => 'required',
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ]); 

        $vaidate['password'] = bcrypt($vaidate['password']);

        user::create($vaidate);
        
        return redirect(url('login'));
    
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = user::findorfail($id);
       return view('edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name'     => 'required',
            'email'    => 'required|email',
        ]);
        user::where('id',$id)->update($data);
        return redirect(url('User'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        user::where('id',$id)->delete();
        return redirect(url('User'));
    }




    public function login(request $request){

        $vaidate = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:6'
        ]);

        if(auth()->attempt($vaidate,false)){
            session()->put('user',$vaidate);
            return redirect(url('User'));
        }else{
            session()->flash('SMSError','Plase Check The Email and Password');
            return redirect(url('login'));
        }

    }

    public function logOut(){
        auth()->logout();

        return redirect(url('login'));
    }
}
