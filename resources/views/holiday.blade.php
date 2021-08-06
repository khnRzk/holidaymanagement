<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Holiday Management</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body class="antialiased">
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
              <span class="navbar-brand mb-0 h1">HOLIDAY MANAGEMENT</span>
            </div>
        </nav>

        <div class="container p-2">
            <div class="row">
                <div class="col-sm-4">
                 <div class="card">
                     <div class="card-body">
                       <h6 class="card-title">NEW HOLIDAY</h6>
                       <hr>
                         
                        <div >
                          <span class="text-danger">{{ $errors->first() }}</span>
                        </div>
                       
                       <form action="/" method="POST">
                        <div class="mb-3">
                            <label for="">Start Date : </label>
                            <input type="date" class="form-control" id="holiday_start" name='start_date' value="{{ old('start') }}">
                            <label for="">End Date : </label>
                            <input type="date" class="form-control" id="holiday_end" name='end_date' value="{{ old('End') }}">
                          </div>
                         <div class="mb-3">
                            <input type="text" class="form-control" id="holiday_name" name='hol_name' placeholder="Holiday name" value="{{ old('holiday_name') }}">
                          </div>
                          <div class="mb-3">
                            <textarea class="form-control" id="holiday_des" rows="3" name='description' placeholder="Description" value=""> {{ old('description') }}</textarea>
                          </div>
                          <button type="submit" class="btn btn-success">Add Holiday</button>
                          @csrf
                       </form>
                       
                     </div>
                   </div>
                </div>
                <div class="col-sm-8">
                    <div class="card mb-2">
                        <div class="card-body">
                        <h6>SELECT DATE RANGE</h6>
                          <form action="/search" class="row g-3">   
                              <div class="col-auto">from</div>
                            <div class="col-auto">
                              <input type="date" class="form-control" id="from" name="from">
                            </div>
                            <div class="col-auto">to</div>
                            <div class="col-auto">
                              <input type="date" class="form-control" id="to" name="to">
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-warning btn-sm"> Filter Holidays</button>
                            </div>
                            <div class="col-auto">
                                <a href="/" class="btn btn-primary btn-sm"> All Holidays</a>
                            </div>
                          </form>
                        </div>
                      </div>
                    <div class="card" style="height: 500px;overflow: auto;">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">Date</th>
                                    <th scope="col">Holiday</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($holidays as $holiday)
                                  <tr>
                                    <td scope="row" class="text-muted">{{ $holiday->start_date}}</td>
                                    <td>{{ $holiday->hol_name}}</td>
                                    <td>{{ $holiday->description }}</td>
                                    <td>
                                        <a href="/{{ $holiday->id}}/edit"class="btn btn-info btn-sm" value="{{ $holiday->id}}">edit</a>

                                        <form action="/{{ $holiday->id}}/delete" method="POST" style=" display:inline!important;">
                                          @method('DELETE')
                                          <button class="btn btn-danger btn-sm" value="{{ $holiday->id}}">Delete</button>
                                          @csrf
                                        </form>
                                        
                                    </td>
                                  </tr>
                                  @endforeach
                                 
                                 
                                </tbody>
                              </table>
                        </div>
                      </div>

                </div>
            </div>
        </div>
       
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>   
    </body>
</html>
