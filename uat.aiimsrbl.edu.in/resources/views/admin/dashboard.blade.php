@extends('admin.layouts.app')
@section('title')
@section('content')

<div class="app-content">
  <div class="side-app">

    <div class="page-header">
      <h4 class="page-title">Dashboard</h4>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="javascript:void(0);">Dashboard</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
      </ol>
    </div>

    <div class="row">

      <div class="col-xl-3 col-lg-6 col-md-12">
        <div class="card ">
          <div class="card-body text-center">
            <div class="counter-status dash3-counter">
              <div class="counter-icon bg-primary text-primary">
                <i class="icon icon-people text-white"></i>
              </div>
              <h5>Today's OPD Patient</h5>
              <h2 class="counter">{{$hospital_statistics->today_opd}}</h2>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-lg-6 col-md-12">
        <div class="card ">
          <div class="card-body text-center">
            <div class="counter-status dash3-counter">
              <div class="counter-icon bg-info text-info">
                <i class="icon icon-people text-white"></i>
              </div>
              <h5>Total OPD Patient</h5>
              <h2 class="counter">{{$hospital_statistics->total_opd}}</h2>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-lg-6 col-md-12">
        <div class="card ">
          <div class="card-body text-center">
            <div class="counter-status dash3-counter">
              <div class="counter-icon bg-success text-success">
                <i class="icon icon-people text-white"></i>
              </div>
              <h5>Today's admission</h5>
              <h2 class="counter">{{$hospital_statistics->today_ipd}}</h2>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-lg-6 col-md-12">
        <div class="card ">
          <div class="card-body text-center">
            <div class="counter-status dash3-counter">
              <div class="counter-icon bg-danger text-danger">
                <i class="icon icon-people text-white"></i>
              </div>
              <h5>Total admission</h5>
              <h2 class="counter">{{$hospital_statistics->total_ipd}}</h2>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-lg-6 col-md-12">
        <div class="card ">
          <div class="card-body text-center">
            <div class="counter-status dash3-counter">
              <div class="counter-icon bg-danger text-danger">
                <i class="icon icon-people text-white"></i>
              </div>
              <h5>Today's Lab Reporting</h5>
              <h2 class="counter">{{$hospital_statistics->today_lab_reporting}}</h2>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-lg-6 col-md-12">
        <div class="card ">
          <div class="card-body text-center">
            <div class="counter-status dash3-counter">
              <div class="counter-icon bg-success text-danger">
                <i class="icon icon-people text-white"></i>
              </div>
              <h5>Total Lab Reporting</h5>
              <h2 class="counter">{{$hospital_statistics->total_lab_reporting}}</h2>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-lg-6 col-md-12">
        <div class="card ">
          <div class="card-body text-center">
            <div class="counter-status dash3-counter">
              <div class="counter-icon bg-primary text-danger">
                <i class="icon icon-people text-white"></i>
              </div>
              <h5>Today's Radiology Reporting</h5>
              <h2 class="counter">{{$hospital_statistics->today_radiology_reporting}}</h2>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-lg-6 col-md-12">
        <div class="card ">
          <div class="card-body text-center">
            <div class="counter-status dash3-counter">
              <div class="counter-icon bg-info text-danger">
                <i class="icon icon-people text-white"></i>
              </div>
              <h5>Total Radiology Reporting</h5>
              <h2 class="counter">{{$hospital_statistics->total_radiology_reporting}}</h2>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-lg-6 col-md-12">
        <div class="card ">
          <div class="card-body text-center">
            <div class="counter-status dash3-counter">
              <div class="counter-icon bg-info text-danger">
                <i class="icon icon-people text-white"></i>
              </div>
              <h5>Today's OT Cases</h5>
              <h2 class="counter">{{$hospital_statistics->today_ot_cases}}</h2>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-lg-6 col-md-12">
        <div class="card ">
          <div class="card-body text-center">
            <div class="counter-status dash3-counter">
              <div class="counter-icon bg-info text-danger">
                <i class="icon icon-people text-white"></i>
              </div>
              <h5>Total OT Cases</h5>
              <h2 class="counter">{{$hospital_statistics->total_ot_cases}}</h2>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-lg-6 col-md-12">
        <div class="card ">
          <div class="card-body text-center">
            <div class="counter-status dash3-counter">
              <div class="counter-icon bg-info text-danger">
                <i class="icon icon-people text-white"></i>
              </div>
              <h5>Trauma and Emergency Occupied Bed</h5>
              <h2 class="counter">{{$hospital_statistics->te_occupied_beds}}</h2>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-lg-6 col-md-12">
        <div class="card ">
          <div class="card-body text-center">
            <div class="counter-status dash3-counter">
              <div class="counter-icon bg-info text-danger">
                <i class="icon icon-people text-white"></i>
              </div>
              <h5>Trauma and Emergency Vacant Bed</h5>
              <h2 class="counter">{{$hospital_statistics->te_vacant_beds}}</h2>
            </div>
          </div>
        </div>
      </div>

    </div>

    
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Contacts Inquiries</h3>
          </div>
          <div class="card-body">
            <div class="table-responsive border-top mb-0 ">
              <table class="table table-bordered table-hover mb-0">
                <thead>
                  <tr>
                    <th>Sr</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Message</th>
                    <th>Date</th>
                  </tr>
                </thead>
                <tbody>
                @if($contactus_inquiry->count())
                    @foreach($contactus_inquiry as $k => $obj)
                    <tr>
                      <td>{{$k+1}}</td>
                      <td>{{$obj->name}}</td>
                      <td>{{$obj->email}}</td>
                      <td>{{$obj->phone}}</td>
                      <td>{{$obj->message}}</td>
                      <td>{{display_date_time($obj->created_at)}}</td>
                    </tr>
                    @endforeach
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td><a href="{{route('admin.contacts.listing')}}" class="btn btn-success">View All</a></td>
                    </tr>
                @else
                <tr>
                  <td colspan="6" class="text-danger text-center">{{DATA_NOT_FOUND}}</td>
                </tr>
                @endif
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@push('scripts')
        

        <!-- Input Mask Plugin -->
		    <script src="{{asset('assets/plugins/input-mask/jquery.mask.min.js')}}"></script>


        <!-- JQVMap -->
        <script src="{{asset('assets/plugins/jqvmap/jquery.vmap.js')}}"></script>
        <script src="{{asset('assets/plugins/jqvmap/maps/jquery.vmap.world.js')}}"></script>
        <script src="{{asset('assets/plugins/jqvmap/jquery.vmap.sampledata.js')}}"></script>
        
        <!-- ECharts Plugin -->
        <script src="{{asset('assets/plugins/echarts/echarts.js')}}"></script>

       
        <!-- jQuery Sparklines -->
		    <script src="{{asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>


        <!-- Flot Chart -->
        <script src="{{asset('assets/plugins/flot/jquery.flot.js')}}"></script>
        <script src="{{asset('assets/plugins/flot/jquery.flot.fillbetween.js')}}"></script>
        <script src="{{asset('assets/plugins/flot/jquery.flot.pie.js')}}"></script>

         <!--Counters -->
         <script src="{{asset('assets/plugins/counters/counterup.min.js')}}"></script>
        <script src="{{asset('assets/plugins/counters/waypoints.min.js')}}"></script>
        <script src="{{asset('assets/plugins/counters/numeric-counter.js')}}"></script>

        <!-- CHARTJS CHART -->
        <script src="{{asset('assets/plugins/chart/Chart.bundle.js')}}"></script>
        <script src="{{asset('assets/plugins/chart/utils.js')}}"></script>

        <!-- Switcher js -->
		    <script src="{{asset('assets/switcher/js/switcher.js')}}"></script>

        <script src="{{asset('assets/js/index3.js')}}"></script>


@endpush

@push('css')
<!-- JQVMap -->
<link href="{{asset('assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet"/>

<!-- Morris.js Charts Plugin -->
<link href="{{asset('assets/plugins/morris/morris.css')}}" rel="stylesheet" />

<!-- Switcher css -->
<link  href="{{asset('assets/switcher/css/switcher.css')}}" rel="stylesheet" id="switcher-css" type="text/css" media="all"/>

@endpush