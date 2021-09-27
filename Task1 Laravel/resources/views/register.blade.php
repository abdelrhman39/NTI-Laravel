<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="container mt-5 w-50 bg-info p-4 rounded-lg ">
        <form method="POST" action="{{ url('create/') }}"  >

            <input type="hidden" name="_token" value="{{ csrf_token() }}" >
    
            <div class="form-group">
                <label for="exampleInputPassword1">Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputPassword1">
              </div>
              
            <div class="form-group">
              <label for="exampleInputEmail1">Email </label>
              <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            
            <div class="form-group">
                <label for="exampleInputEmail1">password  </label>
                <input type="password" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">address </label>
              <input type="text" name="address" class="form-control" id="exampleInputPassword1">
            </div>


            <div class="form-check form-check-inline">
                <label class="mr-5">Gender</label>
                <br>
                <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Male">
                <label class="form-check-label" for="inlineRadio1">Male</label>
              
                <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Female">
                <label class="form-check-label" for="inlineRadio2">Female</label>
            </div>

            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">linkedin url</label>
                <div class="col-sm-10">
                  <input type="text" name="linkedin" class="form-control" id="inputEmail3">
                </div>
              </div>
            
            <button type="submit" class="btn btn-danger">Submit</button>
        </form>
    </div>










    </body>
</html>