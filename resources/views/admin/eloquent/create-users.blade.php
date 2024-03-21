<!doctype html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Users - Eloquent </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>

  <body>
    <div class="container">
      <form method="POST" action="{{ route('eloquent.store') }}" class="w-50 mx-auto mt-5">
        @csrf
        @method('POST')
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="name" class="form-control" name="name" id="name" aria-describedby="name">
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="text" name="password" class="form-control" id="password">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </body>

</html>