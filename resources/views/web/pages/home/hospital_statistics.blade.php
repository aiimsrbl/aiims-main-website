<section class="sptb pt-1 pb-1">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div id="small-categories" class="owl-carousel owl-carousel-icons7">
          <div class="item">
            <div class="card mb-0">
              <div class="card-body p-3">
                <div class="cat-item d-flex">
                  <a href="#"></a>
                  <div class="cat-img me-4 bg-primary-transparent p-3 brround">
                    <img src="../assets/images/icons/patient.png" alt="OPD Today's Patient " class="image-serve">
                  </div>
                  <div class="cat-desc text-start">
                    <h5 class="mb-3 mt-0">OPD  </h5>
                    <small class="badge rounded-pill badge bg-success me-2">Today's Patient: {{$hospital_statistics->today_opd}}</small><br/>
                    <small class="badge rounded-pill badge bg-warning me-2">Total Patient: {{$hospital_statistics->total_opd}}</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="card mb-0">
              <div class="card-body p-3">
                <div class="cat-item d-flex">
                  <a href="#"></a>
                  <div class="cat-img me-4 bg-success-transparent p-3 brround">
                    <img src="{{asset('assets/images/icons/p-admission.png')}}" alt="IPD" class="image-serve">
                  </div>
                  <div class="cat-desc text-start">
                    <h5 class="mb-3">IPD </h5>
                    <small class="badge rounded-pill badge bg-success me-2">Today's Admission: {{$hospital_statistics->today_ipd}}</small><br/>
                     <small class="badge rounded-pill badge bg-warning me-2">Total Admission: {{$hospital_statistics->total_ipd}}</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="card mb-0">
              <div class="card-body p-3">
                <div class="cat-item d-flex">
                  <a href="#"></a>
                  <div class="cat-img me-4 bg-warning-transparent p-3 brround">
                    <img src="{{asset('assets/images/icons/lab-technician.png')}}" alt="Lab " class="image-serve">
                  </div>
                  <div class="cat-desc text-start">
                    <h5 class="mb-3">Lab  </h5>
                    <small class="badge rounded-pill badge bg-success me-2">Today's Reporting: {{$hospital_statistics->today_lab_reporting}}</small><br/>
                    <small class="badge rounded-pill badge bg-warning me-2">Total Reporting: {{$hospital_statistics->total_lab_reporting}}</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="card mb-0">
              <div class="card-body p-3">
                <div class="cat-item d-flex">
                  <a href="#"></a>
                  <div class="cat-img me-4 bg-info-transparent p-3 brround">
                     <img src="{{asset('assets/images/icons/medical.png')}}" alt="Radiology" class="image-serve">
                  </div>
                  <div class="cat-desc text-start">
                    <h5 class="mb-3">Radiology  </h5>
                    <small class="badge rounded-pill badge bg-success me-2">Today's Reporting: {{$hospital_statistics->today_radiology_reporting}}</small><br/>
                    <small class="badge rounded-pill badge bg-warning me-2">Total Reporting: {{$hospital_statistics->total_radiology_reporting}}</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
           <!-- <div class="item">
            <div class="card mb-0">
              <div class="card-body p-3">
                <div class="cat-item d-flex">
                  <a href="#"></a>
                  <div class="cat-img me-4 bg-success-transparent p-3 brround">
                   <img src="{{asset('assets/images/icons/surgery-room.png')}}" alt="OT Today's Cases<" class="image-serve">
                  </div>
                  <div class="cat-desc text-start">
                    <h5 class="mb-3">OT </h5>
                    <small class="badge rounded-pill badge bg-success me-2">Today's Cases: {{$hospital_statistics->today_ot_cases}}</small><br/>
                    <small class="badge rounded-pill badge bg-warning me-2">Total Cases: {{$hospital_statistics->total_ot_cases}}</small>
                  </div>
                </div>
              </div>
            </div>
          </div> -->
          <div class="item">
            <div class="card mb-0">
              <div class="card-body p-3">
                <div class="cat-item d-flex">
                  <a href="#"></a>
                  <div class="cat-img me-4 bg-warning-transparent p-3 brround">
                    <img src="{{asset('assets/images/icons/hospital-bed.png')}}" alt="Trauma & Emergency " class="image-serve">
                  </div>
                  <div class="cat-desc text-start">
                    <h5 class="mb-3">Trauma & Emergency </h5>
                   
                    <small class="badge rounded-pill badge bg-success me-2">Today Admissions: {{$hospital_statistics->emg_today_admissions}}</small>  <br/>
                    <small class="badge rounded-pill badge bg-warning me-2">Total Admissions: {{$hospital_statistics->emg_total_admissions}}</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>
      </div>
    </div>
  </div>
</section>