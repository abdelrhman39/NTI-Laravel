<?php
use Carbon\Carbon;
$date = Carbon::now();


$dateNow = $date->toDateTimeString();

?>
@extends('main')



@section('content')



    <div class="container mt-5">
        <a class="link fa-lg" href=" {{ url('logOut')}} ">LogOut</a> || 
        <a class="link fa-lg" href=" {{ url('list/create')}} ">Create Task</a>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Dscription</th>
                <th scope="col">From</th>
                <th scope="col">To</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    @if ($item->user_id == auth()->user()->id)
                    <tr>
                        <th>{{ $item->id }}</th>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->d_from }}</td>
                        <td>{{ $item->d_to }}</td>
                        <td>
                            @if ($item->d_to < $dateNow)
                                <a href="#" class="btn btn-info disabled">Edit</a>
                                <button data-toggle="modal" class="btn btn-danger disabled">Delete</button>
    
                                
                            @else
                            <a href=" {{ url('list/'.$item->id .'/edit')}} " class="btn btn-info">Edit</a>
                            <button data-toggle="modal" data-target="#exampleModal{{$item->id }}" class="btn btn-danger">Delete</button>
                                
                            @endif
                            
                            {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Open modal for @getbootstrap</button> --}}
    
                            <div class="modal fade" id="exampleModal{{$item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <form method="POST" action="{{ url('list/'.$item->id)}}" >
                                        @csrf
                                        @method('delete')
    
                                        <div class="form-group">
                                            <p>Delete : {{$item->title}}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Delete</button>
                                          </div>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                        </td>
                    </tr>
                    @endif
               
                    
                @endforeach
            </tbody>
        </table>

    </div>



@endsection

