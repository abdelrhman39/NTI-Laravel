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


        <a class="float-right fa-lg" href="{{ url('login') }}" >Login</a>
        <hr class="mt-5">
        <form method="POST" action="{{ url('User/') }}" >
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Name</label>
              <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
    
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
    
            {{-- <div class="form-group">
                <label for="exampleFormControlFile1">Image Profil</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1">
            </div> --}}
              
            
            <button type="submit" class="btn btn-danger">Save</button>
        </form>

    </div>
@endsection