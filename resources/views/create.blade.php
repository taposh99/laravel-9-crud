<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, Crud!</title>
  </head>
  <body>
      <div class="text-center">
        <h1>Hello, Crud!</h1>
        <p>This is a simple CRUD application.</p>

      </div>
      <!-- message -->
@if(session()->has('message'))
<p class="alert alert-success text-center mt-4">{{ session()->get('message') }}</p>
@elseif(session()->has('error'))
<p class="alert alert-danger text-center mt-4">{{ session()->get('error') }}</p>
@endif


      <div class="container">
        <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
          @csrf
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">first Name</label>
              <input type="text" name="firstname" class="form-control"  required>
              
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Last Name</label>
                <input type="text" name="lastname" class="form-control" required >
                
              </div>

              
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">E-mail</label>
                <input type="email" name="email" class="form-control"  required>
              </div>
              
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Image</label>
                <input type="file" name="image" class="form-control">
              </div>
            
            
          
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
      </div>

    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
