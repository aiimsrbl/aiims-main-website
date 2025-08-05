<div class="tab-pane" id="activity">
    <div class="card-body">
        @if(isset($activity->content) && !empty($activity->content))
        {!!$activity->content!!}
        @else
        --
        @endif

        @if(isset($data->activity->images) && $data->activity->images)
        <section class="sptb bg-white">
  <div class="container">
    <div class="section-title center-block text-center">
      <h4>Events & Workshop</h4>
      
    </div>
    <div id="defaultCarousel" class="owl-carousel Card-owlcarousel owl-carousel-icons">
         @foreach($data->activity->images as $objA)
         @if($objA->image && file_exists(storage_path().'/app/public/department/activity/'.$objA->image))
      <div class="item">
        <div class="card mb-0">
          <div class="item7-card-img">
            <a href="javascript:void(0);"></a>
            <img src="{{ route('image.displayImage',['p'=>'department/activity/'.$objA->image]) }}" alt="AIIMSRBL Gallery" class="cover-image">
          </div>
          <div class="card-body p-4">
            <p class="font-weight-semibold">{{$objA->title}}
 </p>
            <div class="item7-card-desc d-flex mb-2 text-center">
              
              
                <a href="{{ route('image.displayImage',['p'=>'department/activity/'.$objA->image]) }}" target="_blank">
                  View Photo </a>
             
            </div>
          </div>
        </div>
      </div>
       @endif
       @endforeach
    </div>
  </div>
</section>
            
        @endif
    </div>
</div>