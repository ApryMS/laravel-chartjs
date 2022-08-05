<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('title')</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
       
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            <div class="row">

           <div class="col-md-12">
                <div class="card">
                <div class="card-header">
                    <strong>Data sertifikat</strong>
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">    
                            <div class="form-group col-md-3">
                                <label for="bulan" id="bulan" class="text-muted d-block">Area</label>
                                    <select name="bulan" class="custom-select" required>
                                        <option value="">Select</option>
                                        @foreach ($area as $data)
                                        <option value="{{ $data->area_id }}">{{ $data->area_name }}</option>
                                        @endforeach
                                    </select>
                            </div>
                        <div class="form-group col-md-3">
                            <label class="text-muted">Select Date From</label>
                            <input type="date" id="date_expired" name="date_expired"  class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label class="text-muted">Select Date To</label>
                            <input type="date" id="date_expired" name="date_expired"  class="form-control">
                        </div>
                        <div class="col-md-3 " style="margin-top: -25px">
                            <button type="submit" class="btn btn-primary mt-5 float-right">View</button>
                        </div>
                        </div>
                   
                    </form>
                </div>
            </div>
    </div>

        <div class="col-xl-12 mt-4">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-bar me-1"></i>
                    Bar Chart Example
                </div>
                <div class="card-body mt-5"><canvas id="myBarChart" width="100%" height="35"></canvas></div>
            </div>
        </div>

        </div>
    </div>
        </main>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('assets/scripts.js') }}"></script>
        
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        {{-- <script src="{{asset('public')}}/js/datatables-simple-demo.js"></script> --}}
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script type="text/javascript">

            Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
            Chart.defaults.global.defaultFontColor = '#292b2c';

            // Bar Chart Example
            var ctx = document.getElementById("myBarChart");
            var myLineChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: JSON.parse('{!! json_encode($name) !!}'),
                datasets: [{
                label: "Presentage" ,
                backgroundColor: "rgba(2,117,216,1)",
                borderColor: "rgba(2,117,216,1)",
                data: JSON.parse('{!! json_encode($jumlah) !!}'),
                }],
            },
            options: {
                scales: {
                xAxes: [{
                    time: {
                    unit: 'month'
                    },
                    gridLines: {
                    display: false
                    },
                    ticks: {
                    maxTicksLimit: 6
                    }
                }],
                yAxes: [{
                    ticks: {
                    min: 0,
                    max: 30,
                    maxTicksLimit: 10
                    },
                    gridLines: {
                    display: true
                    }
                }],
                },
                legend: {
                display: false
                }
            }
            });
	        // var _ydata=JSON.parse('{!! json_encode($name) !!}');
	        // var _xdata=JSON.parse('{!! json_encode($jumlah) !!}');
        </script>
        <script src="{{ asset('assets/chart-bar-demo.js') }}"></script>


    </body>
</html>
