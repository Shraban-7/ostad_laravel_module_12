<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>



            </ul>
            <div class="d-flex gap-3">

                    <a class="btn btn-primary"  href="#">Login</a>


                    <a class="btn btn-outline-primary" href="#">Sign Up</a>

            </div>
          </div>
        </div>
      </nav>

      <main class="container">
        <h2>Trip List</h2>

        <form action="{{ route('home') }}" method="GET" class="mb-4">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="from">From:</label>
                        <input type="text" name="from" class="form-control" value="{{ request()->from }}">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="to">To:</label>
                        <input type="text" name="to" class="form-control" value="{{ request()->to }}">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="date">Date:</label>
                        <input type="date" name="date" class="form-control" value="{{ request()->date }}">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>&nbsp;</label>
                        <button type="submit" class="btn btn-primary form-control">Search</button>
                    </div>
                </div>
            </div>
        </form>

        <div class="row">
            @foreach($trips as $item)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->trip->from }} to {{ $item->trip->to }}</h5>
                            <p class="card-text">Date: {{ $item->trip->date }}</p>
                            <p class="card-text">Seat No: {{ $item->seat_no }}</p>
                            <!-- Additional trip details can go here -->

                            @if ($item->status===0)

                            <form action="{{ route('active',$item->id) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-primary">Book Now</button>
                            </form>
                            @else
                            <p class="card-text">Traveler Name: {{ $item->t_name }}</p>
                            <form action="{{ route('inactive',$item->id) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-danger">Cancel Book</button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
           {{-- <p>{{ $trips->links() }}</p> --}}
        </div>
      </main>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>


