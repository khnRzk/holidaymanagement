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
                       <h6 class="card-title">EDIT HOLIDAY</h6>
                       <hr>
                
                       <form action="/update/{{ $holiday->id }}" method="POST">
                           @method('PATCH')
                        <div class="mb-3">
                            <label for="">Start Date : </label>
                            <input type="date" class="form-control" id="holiday_start" name='start_date' value="{{ old('start') ?? $holiday->start_date }}">
                            <label for="">End Date : </label>
                            <input type="date" class="form-control" id="holiday_end" name='end_date' value="{{ old('end_date') ?? $holiday->end_date  }}">
                          </div>
                         <div class="mb-3">
                            <input type="text" class="form-control" id="holiday_name" name='hol_name' placeholder="Holiday name" value="{{ old('hol_name') ?? $holiday->hol_name  }}">
                          </div>
                          <div class="mb-3">
                            <textarea class="form-control" id="holiday_des" rows="3" name='description' placeholder="Description">{{ old('description') ?? $holiday->description  }}</textarea>
                          </div>
                          <button type="submit" class="btn btn-success">UPDATE Holiday</button>
                          @csrf
                       </form>
                       
                     </div>
                   </div>
                </div>
                
            </div>
        </div>
       
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>   
    </body>
</html>
