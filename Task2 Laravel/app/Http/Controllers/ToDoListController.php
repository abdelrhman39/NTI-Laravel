<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\toDoList;
use Carbon\Carbon;

class ToDoListController extends Controller
{
    public function __construct(){
        
        $this->middleware('auth',['except'=>['login']]);
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = toDoList::select()->get();
        
        
        return view('ToDoList.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ToDoList.create');
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
            'title'         => 'required',
            'description'   => 'required',
            'd_from'        => 'required|date',
            'd_to'          => 'required|date',
            'user_id'        => 'required'
        ]);

        $date = Carbon::now();
        $dateNow = $date->toDateTimeString();
        if($request->d_from < $dateNow){
            session()->flash('SMSError','From Date < Date Now');
            return redirect(url('list/create'));
        }elseif($request->d_to < $dateNow){
            session()->flash('SMSError','To Date < Date Now');
            return redirect(url('list/create'));
        }elseif($request->d_from < $request->d_to){
            session()->flash('SMSError','From Date < To Date ');
            return redirect(url('list/create'));
        }else{

            toDoList::create($vaidate);
            return redirect(url('list'));
        }
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
    public function edit($id)
    {
        $data = toDoList::findorfail($id);
       return view('toDoList.edit',['data'=>$data]);
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
            'title'         => 'required',
            'description'   => 'required',
            'd_from'        => 'required|date',
            'd_to'          => 'required|date'
        ]);

        $date = Carbon::now();
        $dateNow = $date->toDateTimeString();
        if($request->d_from < $dateNow){
            session()->flash('SMSError','From Date < Date Now');
            return redirect(url('list/create'));
        }elseif($request->d_to < $dateNow){
            session()->flash('SMSError','To Date < Date Now');
            return redirect(url('list/create'));
        }elseif($request->d_from < $request->d_to){
            session()->flash('SMSError','From Date < To Date ');
            return redirect(url('list/create'));
        }else{
            toDoList::where('id', $id)->update($data);
            return redirect(url('list'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        toDoList::where('id',$id)->delete();
        return redirect(url('list'));
    }
}
