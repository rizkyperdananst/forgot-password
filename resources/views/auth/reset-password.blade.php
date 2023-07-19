<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reset Passoword</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
     <div class="container mt-5">
          <div class="card shadow">
               <div class="card-header">
                    <h2>Forgot Password</h2>
               </div>
               <div class="card-body">
                    <form action="{{ route('password.update') }}" method="POST">
                         @csrf
                         <div class="form-group mb-3">
                              <input type="hidden" name="token" value="{{ request()->token }}">
                              <input type="hidden" name="email" value="{{ request()->email }}">
                              <input type="password" name="password" class="form-control" placeholder="Passowrd">
                         </div>
                         <div class="form-group mb-3">
                              <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmasi Password">
                         </div>
                         <div class="form-group">
                              <button type="submit" class="btn btn-primary w-100">Reset</button>
                         </div>
                    </form>
               </div>
          </div>
     </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>