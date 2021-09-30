
@extends('../main')



@section('content')





    <div class="container mt-5">
        <h2>Create To Do List</h2>

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



        <hr>
        <form method="POST" action="{{ url('list/') }}" >
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Tite </label>
              <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
    
            <div class="form-group">
              <label for="exampleInputEmail1">Description</label>
              <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">From Date</label>
              <input type="datetime-local" name="d_from" class="form-control" id="exampleInputPassword1">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">To</label>
                <input type="datetime-local" name="d_to" class="form-control" id="exampleInputPassword1">
            </div>

           <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            {{-- <div class="form-group">
                <label for="exampleFormControlFile1">Image Profil</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1">
            </div> --}}
              
            
            <button type="submit" class="btn btn-danger">Save</button>
        </form>

    </div>
@endsection