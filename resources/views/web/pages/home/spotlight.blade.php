@if($spotlights->count())
<style>
      .blink {
        animation: blink-animation 2s steps(10, start) infinite;
        -webkit-animation: blink-animation 2s steps(10, start) infinite;
      }
      @keyframes blink-animation {
        to {
          visibility: hidden;
        }
      }
      @-webkit-keyframes blink-animation {
        to {
          visibility: hidden;
        }
      }
    </style>
<div class="bg-white border-bottom">
  <div class="announcement-banner-container container-fluid bg-danger">
    <div class="announcement-banner Announcement_Banner ">
      <div class="title bg-success-transparent" style="color: rgb(77, 181, 52);">
        <div class="title-content" style="background-image: linear-gradient(90deg, rgb(16, 142, 47) 0%, rgb(16, 142, 47) 50%, rgb(77, 181, 52) 100%);">
          <div id="announcement-banner-title-instant-activation-status-banner" class="title-content-wrapper ">Spotlight </div>
        </div>
      </div>
      <div class="content bg-success-transparent font-weight-semibold">
        <marquee onmouseover="this.stop();" onmouseout="this.start();">
          <ul class="d-flex flex-row">
            @foreach($spotlights as $obj)
                <li style="margin-right:15px;">
                    <i class="fa fa-hand-o-right text-success" aria-hidden="true"></i>
                        @if($obj->link_type == 'file')
                            <a target="_blank" class="text-dark" href="{{ route('image.displayImage',['p'=>'spotlights/'.$obj->file]) }}">{{$obj->title}}
                            </a>
                        @elseif($obj->link_type == 'url')
                            <a class="text-dark" target="_blank" href="{{ $obj->url }}">{{$obj->title}}</a>
                        @else
                            <a href="javascript:void(0);">{{$obj->title}}</a>
                        @endif
                </li>
            @endforeach
          </ul>
        </marquee>
       
      </div>
    </div>
  </div>
</div>

<div class="col-md-12 text-center pt-1 pb-1"> <span class="badge rounded-pill badge bg-warning-transparent card-title fs-12 me-2 text-dark blink"><i class="fa fa-hand-o-right text-success " aria-hidden="true"></i>
 OPD Registration Timings:- Monday to Friday 08:00 AM to 10:30 AM | Saturday 08:00 AM to 10:00 AM</span>
 <span class="badge rounded-pill badge bg-primary-transparent card-title fs-12 me-2 text-dark blink"><i class="fa fa-hand-o-right text-success " aria-hidden="true"></i>
 OPD Consultation Timings:- Monday to Friday 09:00 AM to 05:00 PM | Saturday 09:00 AM to 01:00 PM</span><br/>
 <span class="badge rounded-pill badge bg-success-transparent card-title fs-12 me-2 text-dark blink"><i class="fa fa-hand-o-right text-success " aria-hidden="true"></i>
 Special Clinic Registration:- Monday to Friday 12:00 PM to 12:30 PM</span>
</div>


@endif