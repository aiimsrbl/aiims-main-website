@extends('web.layouts.app')
@section('title','Telemedicine | AIIMS Raebareli')
@section('content')
   
        <!--Breadcrumb-->
		<div class="bannerimg cover-image bg-background3" data-image-src="{{asset('assets/images/banners/banner2.jpg')}}" style="background-image: url({{asset('assets/images/banners/banner1.jpg')}}); background-position: center center;">
			<div class="header-text mb-0">
				<div class="container">
					<div class="text-center text-white ">
						<h1 class="">Telemedicine</h1>
						<ol class="breadcrumb text-center">
							<li class="breadcrumb-item"><a href="/">Home</a></li>
						
							<li class="breadcrumb-item active text-white" aria-current="page">Telemedicine</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	
		<!--/Breadcrumb-->

		
   <!--Tenders listing-->
   
		<section class="sptb">
			<div class="container">
				<div class="row">
					
				    <div class="co-md-12">
				       <p>AIIMS Raebareli is running its Tele OPD from eSanjeevani portal where AIIMS Raebareli is connected to nearby CHCs and PHCs through the government portal and is actively doing Video and Audio consultations. The Schedule of Tele OPD is as follows –</p>
				       <table style="border: medium;"><colgroup><col width="177"><col width="439"></colgroup><tbody><tr style="height: 0pt;"><td style="margin: 0px; border-width: 0.5pt; border-color: rgb(0, 0, 0); vertical-align: top; padding: 0pt 5.4pt; overflow: hidden;"><div><span style="font-size: 12pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0); font-weight: 700; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; vertical-align: baseline;">Weekday</span></div></td><td style="margin: 0px; border-width: 0.5pt; border-color: rgb(0, 0, 0); vertical-align: top; padding: 0pt 5.4pt; overflow: hidden;"><div><span style="font-size: 12pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0); font-weight: 700; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; vertical-align: baseline;">Departments</span></div></td></tr><tr style="height: 0pt;"><td style="margin: 0px; border-width: 0.5pt; border-color: rgb(0, 0, 0); vertical-align: top; padding: 0pt 5.4pt; overflow: hidden;"><div><span style="font-size: 12pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0); font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; vertical-align: baseline;">Monday</span></div></td><td style="margin: 0px; border-width: 0.5pt; border-color: rgb(0, 0, 0); vertical-align: top; padding: 0pt 5.4pt; overflow: hidden;"><div><span style="font-size: 12pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0); font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; vertical-align: baseline;">Orthopaedics , OBGY and Psychiatry</span></div></td></tr><tr style="height: 0pt;"><td style="margin: 0px; border-width: 0.5pt; border-color: rgb(0, 0, 0); vertical-align: top; padding: 0pt 5.4pt; overflow: hidden;"><div><span style="font-size: 12pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0); font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; vertical-align: baseline;">Tuesday</span></div></td><td style="margin: 0px; border-width: 0.5pt; border-color: rgb(0, 0, 0); vertical-align: top; padding: 0pt 5.4pt; overflow: hidden;"><div><span style="font-size: 12pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0); font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; vertical-align: baseline;">Internal Medicine, ENT and Dermatology&nbsp;</span></div></td></tr><tr style="height: 0pt;"><td style="margin: 0px; border-width: 0.5pt; border-color: rgb(0, 0, 0); vertical-align: top; padding: 0pt 5.4pt; overflow: hidden;"><div><span style="font-size: 12pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0); font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; vertical-align: baseline;">Wednesday</span></div></td><td style="margin: 0px; border-width: 0.5pt; border-color: rgb(0, 0, 0); vertical-align: top; padding: 0pt 5.4pt; overflow: hidden;"><div><span style="font-size: 12pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0); font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; vertical-align: baseline;">General Surgery, OBGY and Paediatrics&nbsp;</span></div></td></tr><tr style="height: 0pt;"><td style="margin: 0px; border-width: 0.5pt; border-color: rgb(0, 0, 0); vertical-align: top; padding: 0pt 5.4pt; overflow: hidden;"><div><span style="font-size: 12pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0); font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; vertical-align: baseline;">Thursday&nbsp;</span></div></td><td style="margin: 0px; border-width: 0.5pt; border-color: rgb(0, 0, 0); vertical-align: top; padding: 0pt 5.4pt; overflow: hidden;"><div><span style="font-size: 12pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0); font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; vertical-align: baseline;">ENT, General Surgery and Oncology</span></div></td></tr><tr style="height: 0pt;"><td style="margin: 0px; border-width: 0.5pt; border-color: rgb(0, 0, 0); vertical-align: top; padding: 0pt 5.4pt; overflow: hidden;"><div><span style="font-size: 12pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0); font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; vertical-align: baseline;">Friday</span></div></td><td style="margin: 0px; border-width: 0.5pt; border-color: rgb(0, 0, 0); vertical-align: top; padding: 0pt 5.4pt; overflow: hidden;"><div><span style="font-size: 12pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0); font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; vertical-align: baseline;">Orthopaedics, Internal Medicine and Paediatrics&nbsp;</span></div></td></tr><tr style="height: 0pt;"><td style="margin: 0px; border-width: 0.5pt; border-color: rgb(0, 0, 0); vertical-align: top; padding: 0pt 5.4pt; overflow: hidden;"><div><span style="font-size: 12pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0); font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; vertical-align: baseline;">Saturday&nbsp;</span></div></td><td style="margin: 0px; border-width: 0.5pt; border-color: rgb(0, 0, 0); vertical-align: top; padding: 0pt 5.4pt; overflow: hidden;"><div><span style="font-size: 12pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0); font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; vertical-align: baseline;">Neurosurgery and Oncology&nbsp;</span></div></td></tr></tbody></table><p>&nbsp;</p>
					   <div class="col-lg-5 offset-5">
						<a class="mt-2 mb-4 text-center btn  btn-outline-primary" href="https://esanjeevani.mohfw.gov.in/#/patient/signin" target="_"><b>Book Your TeleOPD</b></a>
					</div>
					   <p>Tele OPD services for the rural population of Uttar Pradesh are transformative, addressing significant healthcare access challenges. Many rural areas face a shortage of healthcare facilities and specialists, leading to delayed diagnoses and treatments. Telemedicine bridges this gap by enabling remote consultations with doctors, allowing patients to receive timely medical advice without the need to travel long distances.</p><p>This service is particularly beneficial for managing chronic illnesses, mental health issues, and maternal health, ensuring that underserved populations have access to quality care. Moreover, it reduces the burden on local healthcare facilities and minimizes travel costs for patients. By enhancing healthcare accessibility, tele OPD services improve health outcomes and foster greater community engagement in health management.</p>
					   
				       <p>Telemedicine outpatient departments (OPD) are vital for modern healthcare, offering numerous benefits. They enhance access to care, allowing patients in remote areas to consult specialists without the need for travel. This is particularly crucial for those with mobility issues or chronic conditions. Telemedicine also reduces waiting times and improves efficiency, enabling healthcare providers to see more patients. Additionally, it promotes continuity of care, as patients can easily follow up on treatment plans. The convenience of virtual consultations encourages patient engagement and adherence to medical advice. Overall, telemedicine OPDs significantly improve healthcare accessibility, efficiency, and patient satisfaction.</p>
				       <div><span style="font-size: 12pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0); font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; vertical-align: baseline;">Telemedicine is increasingly vital in modern healthcare for several reasons:</span></div><ol style="caret-color: rgb(34, 34, 34); color: rgb(34, 34, 34); font-family: Arial, Helvetica, sans-serif; margin-top: 0px; margin-bottom: 0px;"><li dir="ltr" style="margin-left: 15px; list-style-type: decimal; font-size: 12pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0); font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; vertical-align: baseline; white-space: pre-wrap;"><div><span style="font-size: 12pt; font-weight: 700; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; vertical-align: baseline;">Access to Care</span><span style="font-size: 12pt; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; vertical-align: baseline;">: It bridges geographical barriers, enabling patients in remote or underserved areas to consult healthcare providers without traveling long distances.</span></div></li><li dir="ltr" style="margin-left: 15px; list-style-type: decimal; font-size: 12pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0); font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; vertical-align: baseline; white-space: pre-wrap;"><div><span style="font-size: 12pt; font-weight: 700; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; vertical-align: baseline;">Convenience</span><span style="font-size: 12pt; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; vertical-align: baseline;">: Patients can schedule appointments at their convenience, reducing wait times and allowing for consultations from the comfort of home.</span></div></li><li dir="ltr" style="margin-left: 15px; list-style-type: decimal; font-size: 12pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0); font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; vertical-align: baseline; white-space: pre-wrap;"><div><span style="font-size: 12pt; font-weight: 700; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; vertical-align: baseline;">Cost-Effectiveness</span><span style="font-size: 12pt; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; vertical-align: baseline;">: Telemedicine can lower healthcare costs by reducing the need for in-person visits, travel expenses, and time off work.</span></div></li><li dir="ltr" style="margin-left: 15px; list-style-type: decimal; font-size: 12pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0); font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; vertical-align: baseline; white-space: pre-wrap;"><div><span style="font-size: 12pt; font-weight: 700; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; vertical-align: baseline;">Continuity of Care</span><span style="font-size: 12pt; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; vertical-align: baseline;">: It facilitates regular follow-ups and ongoing management of chronic conditions, ensuring patients remain engaged in their treatment plans.</span></div></li><li dir="ltr" style="margin-left: 15px; list-style-type: decimal; font-size: 12pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0); font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; vertical-align: baseline; white-space: pre-wrap;"><div><span style="font-size: 12pt; font-weight: 700; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; vertical-align: baseline;">Emergency Response</span><span style="font-size: 12pt; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; vertical-align: baseline;">: In urgent situations, telemedicine provides quick access to medical advice, potentially saving lives.</span></div></li><li dir="ltr" style="margin-left: 15px; list-style-type: decimal; font-size: 12pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0); font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; vertical-align: baseline; white-space: pre-wrap;"><div><span style="font-size: 12pt; font-weight: 700; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; vertical-align: baseline;">Resource Optimization</span><span style="font-size: 12pt; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; vertical-align: baseline;">: Healthcare systems can allocate resources more efficiently, focusing on patients who need in-person care while managing others remotely.</span></div></li><li dir="ltr" style="margin-left: 15px; list-style-type: decimal; font-size: 12pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0); font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; vertical-align: baseline; white-space: pre-wrap;"><div><span style="font-size: 12pt; font-weight: 700; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; vertical-align: baseline;">Improved Health Outcomes</span><span style="font-size: 12pt; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; vertical-align: baseline;">: With easier access to care, patients are more likely to seek treatment early, leading to better health outcomes.</span></div></li></ol><div><span style="font-size: 12pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0); font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; vertical-align: baseline;">Overall, telemedicine enhances healthcare accessibility, efficiency, and quality, making it an essential component of contemporary medical practice.</span></div></div>
				    </div>
				    
				</div>
			</div>
		</section>

		
		<!--/Tenders Listings-->
		
			<div class="container">
				<div class="col-lg-5 offset-5">
					<a class="mt-2 text-center btn  btn-outline-primary" href="https://esanjeevani.mohfw.gov.in/#/patient/signin" target="_"><b>Book Your TeleOPD</b></a>
				</div>
			</div>
		   
		<section class="sptb">
			<div class="container">
				<div class="row">
				    <div class="co-md-12">
						<div class="card">
							<div class="row p-5">
							<div class="col-lg-4 p-5 border-end">
								<h4 class="font-weight-semibold">Dr. Ravi</h4>
								<p>Medical Officer (Tele OPD)</p>
<hr>
								<h4 class="font-weight-semibold">Ms Shahana</h4>
								<p>Coordinator (State – eSanjeevani)</p>
							</div>
							<div class="col-lg-4 p-5 border-end">
								<h4 class="font-weight-semibold">Ms Shivani Thakur</h4>
								<p>N.I.S. Tele OPD</p>
<hr>
								<h4 class="font-weight-semibold">Mr. Anant Srivastava</h4>
								<p>Facilitator</p>
							</div>
							<div class="col-lg-4 p-5">
								<h4 class="font-weight-semibold">Mr Ravi Bishnoi</h4>
								<p>Coordinator(eSanjeevani)</p>
<hr>
								<h4 class="font-weight-semibold">Dr. Suyash Singh</h4>
								<p>(Nodal Officer and Faculty-In-Charge)<br>Tele Medicine services</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
@endsection

