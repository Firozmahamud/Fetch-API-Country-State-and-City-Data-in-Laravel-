<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- <link rel="stylesheet" href="fonts/icomoon/style.css"> -->
    {{-- <link rel="stylesheet" href="{{asset('public/cal3')}}/css/bootstrap.min.css"> --}}


    <link rel="stylesheet" href="{{asset('cal3')}}/css/classic.css">
    <link rel="stylesheet" href="{{asset('cal3')}}/css/classic.date.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('cal3')}}/css/bootstrap.min.css">

    <!-- Style -->
    <!-- <link rel="stylesheet" href="css/style.css"> -->

    <title>Calendar #3</title>
  </head>
  <body>


  <div class="content">

    <div class="container text-left">
      <div class="row justify-content-center">
        <div class="col-lg-7">
          <h2 class="mb-5 text-center">Calendar(Date Range)</h2>
          {{-- <form action="#" class="row"> --}}
            <form action="/filter3" class="row" method="GET">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="input_from">From</label>
                  <input type="text" class="form-control" id="input_from" name="start_date" placeholder="Start Date">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="input_to">To</label>
                  <input type="text" class="form-control" id="input_to"name="end_date" placeholder="End Date">
                </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="Search">Search</label> <br>
            <button class="btn btn-info" type="submit">
              <i class="fa fa-search"></i>
              <!-- <i class="bi bi-search"></i> -->
            </button>

          </div>
        </div>
          </form>
        </div>

        <table class="table">
          <thead>
              <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Date</th>
              </tr>
          </thead>
          <tbody>

              @forelse ($data as $key => $data)

              <tr>
                  <th scope="row">{{ ++$key }}</th>
                  <td>{{ $data->name }}</td>
                  <td>{{ $data->email }}</td>
                  <td>{{ $data->created_at }}</td>
              </tr>
              @empty

                    <tr>
                      <td></td>
                      <td></td>
                      <td>
                          No data found
                      </td>
                      <td></td>
                     </tr>
              @endforelse
          </tbody>
      </table>
      </div>

    </div>
  </div>



    <script src="{{asset('cal3')}}/js/jquery-3.3.1.min.js"></script>
    <!-- <script src="js/popper.min.js"></script> -->
    <!-- <script src="js/bootstrap.min.js"></script> -->
    <script src="{{asset('cal3')}}/js/picker.js"></script>
    <script src="{{asset('cal3')}}/js/picker.date.js"></script>

    <script src="{{asset('cal3')}}/js/main.js"></script>
  </body>
</html>
