@extends('main')



@section('content')
    
    <div class="container mt-5">
        <h2>Login</h2>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    {{ $error }}
                </div>                
            @endforeach
        @endif

        @if (session()->get('SMSError') )
            <div class="alert alert-danger">
                {{ session()->get('SMSError') }}
            </div>
        @endif
         
        <a class="float-right fa-lg" href="{{ url('User/create') }}" >Register</a>

        <hr class="mt-5">
        <form method="POST" action="{{ url('login') }}" >
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>    
            
            <button type="submit" class="btn btn-danger">Save</button>
        </form>

    </div>
@endsection
