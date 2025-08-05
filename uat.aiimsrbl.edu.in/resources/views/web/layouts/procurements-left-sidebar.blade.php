<div class="col-xl-4 col-lg-4 col-md-12">
	<!-- <div class="card">
		<div class="card-body">
			<div class="input-group">
				<input type="text" class="form-control br-tl-3  br-bl-3" placeholder="Search">
				<div class="">
					<button type="button" class="btn btn-primary br-tr-3  br-br-3">
						Search
					</button>
				</div>
			</div>
		</div>
	</div> -->
	<div class="card">
		<div class="card-header">
			<h3 class="card-title">Procurements</h3>
		</div>
		<div class="card-body p-0">
			<div class="list-catergory">
				<div class="item-list">
					<ul class="list-group mb-0">
						<li class="list-group-item {{($active =='ct')?'active':''}}">
							<a href="{{route('web.tenders',['current'])}}" class="text-dark">
								<i class="fa fa-file-text-o bg-primary text-primary"></i> Current Tenders
								<span class="badgetext badge rounded-pill bg-light mb-0 mt-1">{{$left_data['current_tender']}}</span>
							</a>
						</li>
						<li class="list-group-item {{($active =='at')?'active':''}}">
							<a href="{{route('web.tenders',['archived'])}}" class="text-dark">
								<i class="fa fa-file-text-o bg-success text-success"></i>Archived Tenders
								<span class="badgetext badge rounded-pill bg-light mb-0 mt-1">{{$left_data['archived_tenders']}}</span>
							</a>
						</li>
						<li class="list-group-item {{($active =='cq')?'active':''}}">
							<a href="{{route('web.quotation',['current'])}}" class="text-dark">
								<i class="fa fa-file-text-o bg-info text-info"></i> Current Quotations
								<span class="badgetext badge rounded-pill bg-light mb-0 mt-1">{{$left_data['current_quotation']}}</span>
							</a>
						</li>
						<li class="list-group-item {{($active =='aq')?'active':''}}">
							<a href="{{route('web.quotation',['archived'])}}" class="text-dark">
								<i class="fa fa-file-text-o bg-warning text-warning"></i> Archived Quotations
								<span class="badgetext badge rounded-pill bg-light mb-0 mt-1">{{$left_data['archived_quotation']}}</span>
							</a>
						</li>
						<li class="list-group-item {{($active =='pac')?'active':''}}">
							<a href="{{route('web.pac',['current'])}}" class="text-dark">
								<i class="fa fa-file-text-o bg-danger text-danger"></i> PAC
								<span class="badgetext badge rounded-pill bg-light mb-0 mt-1">{{$left_data['pac']}}</span>
							</a>
						</li>
						
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>