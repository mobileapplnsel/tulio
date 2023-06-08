@extends('layouts.admin')

@section('content')
{!! Form::model($user,['route'=>['admin.user.update',$user->id],'method'=>'PUT']) !!}

<div class="card">
    <div class="card-header">
        <h4>User</h4>
    </div>
    {{-- <div class="card-body">
        <div class="row">
        <div class="col-sm-6">
                <div class="form-group">
                <label for="username">user name</label>
                {!! Form::text('user_name',$user->name, ["placeholder"=>"Enter user name ","class"=>"form-control", "id"=>"username"]) !!}
                @error('user_name')
                <strong>{{ $message }}</strong>
                @enderror
                </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
               <label for="useremail">user email</label>
               {!! Form::email('user_email',$user->email, ["placeholder"=>"Enter user email ","class"=>"form-control", "id"=>"useremail"]) !!}
               @error('user_email')
               <strong>{{ $message }}</strong>
               @enderror
           </div>
        </div>
        </div>        
        <div class="row">
            <div class="col-sm-6">
                 <div class="form-group">
                <label for="usertype">user type</label>
                 {!! Form::select('user_type',['2'=>'Designer','3'=>'Architect','4'=>'Tulio'],$user->user_type, ["placeholder"=>"Select User Type ","class"=>"form-control", "id"=>"usertype"]) !!}
                @error('user_type')
                <strong>{{ $message }}</strong>
                @enderror
                </div>
            </div>
        </div>
    </div> --}}
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="name">First Name</label>
                    {!! Form::text('name',null, ["placeholder"=>"Enter name ","class"=>"form-control", "id"=>"name"]) !!}
                    @error('name')
                    <strong>{{ $message }}</strong>
                    @enderror
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="username">Last Name</label>
                    {!! Form::text('last_name',null, ["placeholder"=>"Enter name ","class"=>"form-control", "id"=>"userlastname"]) !!}
                    @error('last_name')
                    <strong>{{ $message }}</strong>
                    @enderror
                </div>
            </div>
        </div>   

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="email">Email</label>
                    {!! Form::email('email',null, ["placeholder"=>"Enter email ","class"=>"form-control", "id"=>"email"]) !!}
                    @error('email')
                    <strong>{{ $message }}</strong>
                    @enderror
                </div>
            </div>
            <div class="col-sm-6">
                <label for="company_studio_name">Company / Studio Name</label>
                {!! Form::text('company_studio_name',null,['placeholder'=>'Company / Studio name',"class"=>"form-control", "id"=>"company_studio_name"]) !!}
                @error('company_studio_name')
                <strong>{{ $message }}</strong>
                @enderror
                </div>
            
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="phone_number">Contact Phone</label>
                    {!! Form::text('phone_number',null,['placeholder'=>'Enter Contact Phone Number',"class"=>"form-control","id"=>"phone_number"]) !!}
                    @error('phone_number')
                    <strong>{{ $message }}</strong>
                    @enderror
                </div>
            </div>
                
        </div>
             
        <div class="row">
            <div class="col-sm-6">
               <div class="form-group">
                  <label for="user_pass">Password</label>
                  {!! Form::text('user_pass',null, ["placeholder"=>"Enter password ","class"=>"form-control", "id"=>"user_pass"]) !!}
                  @error('user_pass')
                  <strong>{{ $message }}</strong>
                  @enderror
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                     <label for="user_type">Type</label>
                    {!! Form::select('user_type',['2'=>'Designer','3'=>'Architect','4'=>'Tulio Admin'],null, ["placeholder"=>"Select Type ","class"=>"form-control", "id"=>"user_type"]) !!}
                        @error('user_type')
                        <strong>{{ $message }}</strong>
                        @enderror
                  </div>
            </div>
        </div>

            <div class="card-header">
                <h4>Reach Out Contact Information</h4>
            </div>
           
            <div class="row">
                <div class="col-sm-6">
                <div class="form-group">
                    <label for="pocname">Contact Name</label>
                    {!! Form::text('poc_name',null,['placeholder'=>'Enter Contact Name',"class"=>"form-control","id"=>"poc-name"]) !!}
                    @error('poc_name')
                    <strong>{{ $message }}</strong>
                    @enderror
                </div>
                </div>

                <div class="col-sm-6">
                <div class="form-group">
                    <label for="useremail">Contact Phone</label>
                    {!! Form::number('poc_number',null,['placeholder'=>'Enter Contact Phone Number',"class"=>"form-control","id"=>"poc-number"]) !!}
                    @error('poc_name')
                    <strong>{{ $message }}</strong>
                    @enderror
                </div>
                    

                    
                    
                </div>
            </div>
        
        
    </div>
    <div class="row">
        <div class="col-sm-1">
            <a href="{{route('admin.user.index')}}" class="btn btn-secondary">Back</a>
        </div>
        <div class="col-sm-10"></div>
        <div class="col-sm-1">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</div>

{!! Form::close() !!}
@endsection

@section('script')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
        var gradient = ctx.createLinearGradient(0, 0, 0, 225);
        gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
        gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
        // Line chart
        new Chart(document.getElementById("chartjs-dashboard-line"), {
            type: "line",
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Sales ($)",
                    fill: true,
                    backgroundColor: gradient,
                    borderColor: window.theme.primary,
                    data: [
                        2115,
                        1562,
                        1584,
                        1892,
                        1587,
                        1923,
                        2566,
                        2448,
                        2805,
                        3438,
                        2917,
                        3327
                    ]
                }]
            },
            options: {
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                tooltips: {
                    intersect: false
                },
                hover: {
                    intersect: true
                },
                plugins: {
                    filler: {
                        propagate: false
                    }
                },
                scales: {
                    xAxes: [{
                        reverse: true,
                        gridLines: {
                            color: "rgba(0,0,0,0.0)"
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            stepSize: 1000
                        },
                        display: true,
                        borderDash: [3, 3],
                        gridLines: {
                            color: "rgba(0,0,0,0.0)"
                        }
                    }]
                }
            }
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Pie chart
        new Chart(document.getElementById("chartjs-dashboard-pie"), {
            type: "pie",
            data: {
                labels: ["Chrome", "Firefox", "IE"],
                datasets: [{
                    data: [4306, 3801, 1689],
                    backgroundColor: [
                        window.theme.primary,
                        window.theme.warning,
                        window.theme.danger
                    ],
                    borderWidth: 5
                }]
            },
            options: {
                responsive: !window.MSInputMethodContext,
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                cutoutPercentage: 75
            }
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Bar chart
        new Chart(document.getElementById("chartjs-dashboard-bar"), {
            type: "bar",
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "This year",
                    backgroundColor: window.theme.primary,
                    borderColor: window.theme.primary,
                    hoverBackgroundColor: window.theme.primary,
                    hoverBorderColor: window.theme.primary,
                    data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
                    barPercentage: .75,
                    categoryPercentage: .5
                }]
            },
            options: {
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            display: false
                        },
                        stacked: false,
                        ticks: {
                            stepSize: 20
                        }
                    }],
                    xAxes: [{
                        stacked: false,
                        gridLines: {
                            color: "transparent"
                        }
                    }]
                }
            }
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var markers = [{
                coords: [31.230391, 121.473701],
                name: "Shanghai"
            },
            {
                coords: [28.704060, 77.102493],
                name: "Delhi"
            },
            {
                coords: [6.524379, 3.379206],
                name: "Lagos"
            },
            {
                coords: [35.689487, 139.691711],
                name: "Tokyo"
            },
            {
                coords: [23.129110, 113.264381],
                name: "Guangzhou"
            },
            {
                coords: [40.7127837, -74.0059413],
                name: "New York"
            },
            {
                coords: [34.052235, -118.243683],
                name: "Los Angeles"
            },
            {
                coords: [41.878113, -87.629799],
                name: "Chicago"
            },
            {
                coords: [51.507351, -0.127758],
                name: "London"
            },
            {
                coords: [40.416775, -3.703790],
                name: "Madrid "
            }
        ];
        var map = new jsVectorMap({
            map: "world",
            selector: "#world_map",
            zoomButtons: true,
            markers: markers,
            markerStyle: {
                initial: {
                    r: 9,
                    strokeWidth: 7,
                    stokeOpacity: .4,
                    fill: window.theme.primary
                },
                hover: {
                    fill: window.theme.primary,
                    stroke: window.theme.primary
                }
            },
            zoomOnScroll: false
        });
        window.addEventListener("resize", () => {
            map.updateSize();
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var date = new Date(Date.now() - 5 * 24 * 60 * 60 * 1000);
        var defaultDate = date.getUTCFullYear() + "-" + (date.getUTCMonth() + 1) + "-" + date.getUTCDate();
        document.getElementById("datetimepicker-dashboard").flatpickr({
            inline: true,
            prevArrow: "<span title=\"Previous month\">&laquo;</span>",
            nextArrow: "<span title=\"Next month\">&raquo;</span>",
            defaultDate: defaultDate
        });
    });
</script>
@endsection