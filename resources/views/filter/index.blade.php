<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <title>Get Data Between Two Dates in Laravel 8</title>
    </head>
    <body>
        <div class="container my-4">
            <div class="row">
                <h2 class="fs-3 text-center my-3">Get Data Between Two Dates in Laravel 8</h2>
                <div class="my-2">
                    <form action="/filter" method="GET">


                        <div class="row justify-content-center">
                            <div class="col-lg-6">


                        <div class="input-group md-12">


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="input_from">From</label>
                                  {{-- <input type="text" class="form-control" id="input_from" name="start_date" placeholder="Start Date"> --}}
                            <input type="date" class="form-control" name="start_date">

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="input_to">To</label>
                                  {{-- <input type="text" class="form-control" id="input_to"name="end_date" placeholder="End Date"> --}}
                            <input type="date" class="form-control" name="end_date">

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


                            {{-- <input type="date" class="form-control" name="start_date">
                            <input type="date" class="form-control" name="end_date"> --}}
                            {{-- <button class="btn btn-primary" type="submit">GET</button> --}}
                        </div>
                    </form>
                </div>
                </div>
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
                        {{-- @foreach ($data as $key => $data) --}}
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
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    </body>
</html>
