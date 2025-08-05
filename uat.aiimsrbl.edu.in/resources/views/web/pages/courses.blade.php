@extends('web.layouts.app')
@section('title','Courses | All India Institute of Medical Sciences Raebareli')
@section('content')
<!--Breadcrumb-->
		<div class="bannerimg cover-image bg-background3" data-image-src="{{asset('assets/images/banners/banner2.jpg')}}" style="background-image: url({{asset('assets/images/banners/banner1.jpg')}}); background-position: center center;">
			<div class="header-text mb-0">
				<div class="container">
					<div class="text-center text-white ">
						<h1 class="">Courses</h1>
						<ol class="breadcrumb text-center">
							<li class="breadcrumb-item"><a href="/">Home</a></li>
						
							<li class="breadcrumb-item active text-white" aria-current="page">Courses</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	
		<!--/Breadcrumb-->
    <!--Tenders listing-->
	<section class="sptb pb-0">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title"> Undergraduate Courses</h3>
							</div>
							<div class="card-body">
								<div class="table-responsive border-top mb-0 ">
									<table class="table table-bordered table-hover  mb-0">
										<thead class="bg-primary text-white text-nowrap">
											<tr>
												<th class="text-white">S. No.</th>
											
												<th class="text-white">Name of the Courses</th>
											
												<th class="text-white">No. of Seats (Annually)</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>1-</td>	
												<td> M.B.B.S.</td>
												<td> 100</td>
											</tr>											
											<tr>
												<td>2-</td>	
												<td> B.Sc. (Hons) Nursing.</td>
												<td> 50</td>
											</tr>
											<tr colspan="3">
												<td></td>	
												<td> B.Sc. Paramedical & Allied Health Sciences<br> (total 50 seats)</td>
												<td> </td>
											</tr>											
											<tr>
												<td>3-</td>	
												<td> B.Sc. Anaesthesia Technology</td>
												<td> 10</td>
											</tr>
											<tr>
												<td>4-</td>	
												<td> B.Sc. Cardiac Technology.</td>
												<td> 2</td>
											</tr>											
											<tr>
												<td>5-</td>	
												<td> B.Sc. Dialysis Therapy.</td>
												<td> 2</td>
											</tr>
											<tr>
												<td>6-</td>	
												<td> B.Sc. Lab Technology</td>
												<td> 16</td>
											</tr>
											<tr>
												<td>7-</td>	
												<td> B.Sc. O.T. Technology</td>
												<td> 12</td>
											</tr>
											<tr>
												<td>8-</td>	
												<td> B.Sc. Optometry Technology.</td>
												<td> 2</td>
											</tr>
											<tr>
												<td>9-</td>	
												<td> B.Sc. Radiology Technology.</td>
												<td> 6</td>
											</tr>
											<tr>
												<td></td>	
												<td> Total (1 to 9)</td>
												<td> 200</td>
											</tr>
										</tbody>
									</table>
								</div>						
							
						</div>
					</div>
				</section>

		<section class="sptb pt-0 pb-0">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="card">
							<div class="card-header">
							<h3 class="card-title"> Postgraduate Courses</h3>
							</div>
							<div class="card-body">
								<div class="table-responsive border-top mb-0 ">
									<table class="table table-bordered table-hover  mb-0">
										<thead class="bg-primary text-white text-nowrap">
											<tr>
												<th class="text-white">S. No.</th>
											
												<th class="text-white"> MD/MS Course (3 years)</th>
											
												<th class="text-white">Total Seats in Jan-2024</th>

												<th class="text-white">Total Seats in July-2024</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>1-</td>	
												<td> Anatomy</td>
												<td> 2</td>
												<td> 2</td>
											</tr>
											<tr>
												<td>2-</td>	
												<td> Physiology</td>
												<td> 2</td>
												<td> 2</td>
											</tr>	
											<tr>
												<td>3-</td>	
												<td> Biochemistry.</td>
												<td> 2</td>
												<td> 3</td>
											</tr>	
											<tr>
												<td>4-</td>	
												<td> Pathology & Lab Medicine.</td>
												<td> 2</td>
												<td> 2</td>
											</tr>	
											<tr>
												<td>5-</td>	
												<td> Microbiology</td>
												<td> 2</td>
												<td> 2</td>
											</tr>	
											<tr>
												<td>6-</td>	
												<td> Pharmacology</td>
												<td> 1</td>
												<td> 2</td>
											</tr>	
											<tr>
												<td>7-</td>	
												<td> Forensic Medicine</td>
												<td> 1</td>
												<td> 2</td>
											</tr>	
											<tr>
												<td>8-</td>	
												<td> Community Medicine</td>
												<td> 2</td>
												<td> 3</td>
											</tr>	
											<tr>
												<td>9-</td>	
												<td> Transfusion Medicine</td>
												<td> 2</td>
												<td> 2</td>
											</tr>	
											<tr>
												<td>10-</td>	
												<td> Anaesthesia</td>
												<td> 4</td>
												<td> 2</td>
											</tr>	
											<tr>
												<td>11-</td>	
												<td> ENT</td>
												<td> 1</td>
												<td> 3</td>
											</tr>	
											<tr>
												<td>12-</td>	
												<td> Ophthalmology</td>
												<td> 1</td>
												<td> 2</td>
											</tr>	
											<tr>
												<td>13-</td>	
												<td> General Medicine</td>
												<td> 3</td>
												<td> 3</td>
											</tr>	
											<tr>
												<td>14-</td>	
												<td> General Surgery</td>
												<td> 3</td>
												<td> 3</td>
											</tr>	
											<tr>
												<td>15-</td>	
												<td> Obstestrics & Gynaecology</td>
												<td> 3</td>
												<td> 2</td>
											</tr>	
											<tr>
												<td>16-</td>	
												<td> Dermatology</td>
												<td> 1</td>
												<td> 0</td>
											</tr>	
											<tr>
												<td>17-</td>	
												<td> Psychiatry</td>
												<td> 1</td>
												<td> 0</td>
											</tr>	
											<tr>
												<td>18-</td>	
												<td> PMR</td>
												<td> 1</td>
												<td> 0</td>
											</tr>	
											<tr>
												<td>19-</td>	
												<td> Paediatrics</td>
												<td> 3</td>
												<td> 0</td>
											</tr>	
											<tr>
												<td>20-</td>	
												<td> Orthopedics</td>
												<td> 2</td>
												<td> 0</td>
											</tr>
											<tr>
												<td></td>	
												<td> Total</td>
												<td> 39</td>
												<td> 35</td>
											</tr>												
											
										</tbody>
									</table>
								</div>
							</div>							
						</div>	
					</div>	

				</div>
			</div>
		</section>

		<section class="sptb pt-0 pb-0">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="card">
							<div class="card-header">
							<h3 class="card-title">Super-speciality Course</h3>
							</div>
							<div class="card-body">
								<div class="table-responsive border-top mb-0 ">
									<table class="table table-bordered table-hover  mb-0">
										<thead class="bg-primary text-white text-nowrap">
											<tr>
												<th class="text-white">S. No.</th>											
												<th class="text-white"> Department DM/MCh (6 years)</th>											
												<th class="text-white">Total Seats Jan-2024</th>
												<th class="text-white">Total Seats in July-2024</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>1-</td>	
												<td> Neurosurgery</td>
												<td> 0</td>
												<td> 2</td>
											</tr>
											<tr>
												<td>2-</td>	
												<td> Paediatric Surgery</td>
												<td> 0</td>
												<td> 1</td>
											</tr>	
											
											<tr>
												<td></td>	
												<td> Total</td>
												<td> 0</td>
												<td> 3</td>
											</tr>												
											
										</tbody>
									</table>
								</div>
							</div>							
						</div>	
					</div>	

				</div>
			</div>
		</section>

		<section class="sptb pt-0 pb-0">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="card">
							<div class="card-header">
							<h3 class="card-title">Super-speciality Course</h3>
							</div>
							<div class="card-body">
								<div class="table-responsive border-top mb-0 ">
									<table class="table table-bordered table-hover  mb-0">
										<thead class="bg-primary text-white text-nowrap">
											<tr>
												<th class="text-white">S. No.</th>											
												<th class="text-white"> Department DM/MCh (3 years)</th>											
												<th class="text-white">Total Seats Jan-2024</th>
												<th class="text-white">Total Seats in July-2024</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>1-</td>	
												<td> Neurosurgery</td>
												<td> 2</td>
												<td> 1</td>
											</tr>
											<tr>
												<td>2-</td>	
												<td> Paediatric Surgery</td>
												<td> 2</td>
												<td> 1</td>
											</tr>	
											
											<tr>
												<td></td>	
												<td> Total</td>
												<td> 4</td>
												<td> 2</td>
											</tr>												
											
										</tbody>
									</table>
								</div>
							</div>							
						</div>	
					</div>	

				</div>
			</div>
		</section>


		
		<!--/Tenders Listings-->
@endsection

