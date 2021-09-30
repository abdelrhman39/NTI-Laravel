@extends('main')



@section('content')

    <div class="container mt-5">
        <h2>Register</h2>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    {{ $error }}
                </div>                
            @endforeach
        @endif



        <hr>
        <form method="POST" action="{{ url('User/'.$data->id) }}" >
            @method('put')
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Name</label>
              <input type="text" value=" {{$data->name}} " name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
    
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" value=" {{$data->email}} " name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            
    
            {{-- <div class="form-group">
                <label for="exampleFormControlFile1">Image Profil</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1">
            </div> --}}
              
            
            <button type="submit" class="btn btn-danger">Save</button>
        </form>

    </div>
@endsection