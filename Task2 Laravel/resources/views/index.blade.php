@extends('main')

@section('content')

    <div class="container mt-5">
        <a class="link fa-lg" href=" {{ url('logOut')}} ">LogOut</a> || {{ auth()->user()->name }} 
        <a href="{{ url('list') }}" >To Do List</a>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                @if ($item->id == auth()->user()->id)
                    
                <tr>
                    <th>{{ $item->id }}</th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td><img src="#" width="150px" ></td>
                    <td>
                      
                        <a href=" {{ url('User/'.$item->id .'/edit')}} " class="btn btn-info">Edit</a>
                        <button data-toggle="modal" data-target="#exampleModal{{$item->id }}" class="btn btn-danger">Delete Acount</button>
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
                                  <form method="POST" action="{{ url('User/'.$item->id)}}" >
                                    @csrf
                                    @method('delete')

                                    <div class="form-group">
                                        <p>Delete : {{$item->name}}</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Delete Acount</button>
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

