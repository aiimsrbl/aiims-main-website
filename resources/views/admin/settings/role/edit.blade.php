@extends('admin.layouts.app')
@section('content')
<div class="app-content">
	<div class="side-app">
		<div class="page-header">
			<h4 class="page-title">Manage Role</h4>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0);">Role</a></li>
				<li class="breadcrumb-item active" aria-current="page">Edit Role</li>
			</ol>
		</div>
		<div class="row">
			<div class="col-xl-12">
				<div class="card m-b-20">
					<div class="card-header">
						<h3 class="card-title">Edit Role</h3>
					</div>
					<div class="card-body mb-0">
						<form class="form-horizontal" method="post" action="{{ route('admin.role.edit.submit',[$role->id]) }}">
							@csrf
							@php
								//dump($role)
							@endphp
							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Name*</label>
									</div>
									<div class="col-md-9">
										<input type="text" class="form-control {{$errors->first('name','is-invalid state-invalid')}}" placeholder="Enter Role Name" name="name"  value="{{ old('name',$role->name) }}">
										<div class="invalid-feedback">{{$errors->first('name')}}</div>
									</div>
								</div>
							</div>
							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Description*</label>
									</div>
									<div class="col-md-9">
										<textarea placeholder="Enter Description" class="form-control {{$errors->first('description','is-invalid state-invalid')}}" name="description">{{old('description',$role->description)}}</textarea>
										<div class="invalid-feedback">{{$errors->first('description')}}</div>
									</div>
								</div>
							</div>
							<div class="mb-3">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Select Permission*</label>
									</div>
									<div id="role_modules" class="col-md-9 tree-demo">
										<ul>
											@foreach($menues as $key => $m)
												<li data-jstree='{ "module_id" : "", "opened" : false, "selected" : false }'> {{$m->name}}
													<ul>
														@if(count($m->sub_menue) > 0)
															@foreach($m->sub_menue as $s_key => $s_value)
																<li data-jstree='{ "module_id" : "", "opened" : false, "selected" : {{ ($s_value->id == 1)?"true":"false" }} }'> {{$s_value->name}}
																	<ul>

																		@php
																			$s_selected_view = $s_selected_add = $s_selected_edit = $s_selected_del = false;
																			if(in_array($s_value->permission_name.'-view',$my_permissions))
																			{
																				$s_selected_view = ',"selected":true';       
																			}
																			if(in_array($s_value->permission_name.'-add',$my_permissions))
																			{
																				$s_selected_add = ',"selected":true';       
																			}
																			if(in_array($s_value->permission_name.'-edit',$my_permissions))
																			{
																				$s_selected_edit = ',"selected":true';       
																			}
																			if(in_array($s_value->permission_name.'-del',$my_permissions))
																			{
																				$s_selected_del = ',"selected":true';       
																			}
																		@endphp

																		<li data-jstree='{ "module_id" : "{{$s_value->permission_name}}-view", "action" : "view" {{$s_selected_view}} }'>view</li>
																		<li data-jstree='{ "module_id" : "{{$s_value->permission_name}}-add", "action" : "add" {{$s_selected_add}} }'>add</li>
																		<li data-jstree='{ "module_id" : "{{$s_value->permission_name}}-edit", "action" : "edit" {{$s_selected_edit}} }'>edit</li>
																		<li data-jstree='{ "module_id" : "{{$s_value->permission_name}}-del", "action" : "del" {{$s_selected_del}} }'>delete</li>
																	</ul>
																</li>
															@endforeach
														@else   
														@php
															$selected_view = $selected_add = $selected_edit = $selected_del = false;
															if(in_array($m->permission_name.'-view',$my_permissions))
															{
																$selected_view = ',"selected":true';       
															}
															if(in_array($m->permission_name.'-add',$my_permissions))
															{
																$selected_add = ',"selected":true';       
															}
															if(in_array($m->permission_name.'-edit',$my_permissions))
															{
																$selected_edit = ',"selected":true';       
															}
															if(in_array($m->permission_name.'-del',$my_permissions))
															{
																$selected_del = ',"selected":true';       
															}
														@endphp    
														<li data-jstree='{ "module_id" : "{{$m->permission_name}}-view", "action" : "view" {{$selected_view}} }'>view</li>
														<li data-jstree='{ "module_id" : "{{$m->permission_name}}-add", "action" : "add" {{$selected_add}} }'>add</li>
														<li data-jstree='{ "module_id" : "{{$m->permission_name}}-edit", "action" : "edit" {{$selected_edit}} }'>edit</li>
														<li data-jstree='{ "module_id" : "{{$m->permission_name}}-del", "action" : "del" {{$selected_del}} }'>delete</li>

														@endif
													</ul>
												</li>
											@endforeach
										</ul>       
									</div>
								</div>
							</div>
							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
									</div>
									<div class="col-md-9">
										<input readonly name="menu_ids" type="hidden" id="event_result" class="{{$errors->first('menu_ids','is-invalid state-invalid')}}">
										<div class="invalid-feedback">{{$errors->first('menu_ids')}}</div>
									</div>
								</div>
							</div>
							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Status</label>
									</div>
									<div class="col-md-9">
										<select name="status" class="select2">
											<option value="active" {{($role->status =='active')?'selected':''}}>Active</option>
											<option value="inactive" {{($role->status =='inactive')?'selected':''}}>In active</option>
										</select>
									</div>
								</div>
							</div>
							<div class="mb-3 mb-0 row justify-content-end">
								<div class="col-md-3">
									<button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
									<a href="{{route('admin.role.listing')}}">
										<button type="button" class="btn btn-danger waves-effect waves-light">Cancel</button>
									</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- end row -->
	</div>
</div>
@endsection

@push('scripts')
    <link href="{{asset('assets/js_tree/css/style.min.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('assets/js_tree/js/jstree.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js_tree/js/ui-tree.min.js')}}" type="text/javascript"></script>

    <script>
        $('#role_modules').jstree({
            "plugins" : [ "checkbox" ],
            "core": {
                "themes":{
                    "icons":false
                },
				"expand_selected_onload": false

            }
        });
        $('#role_modules').on('changed.jstree', function (e, data) {
              var i, j, r = [];
              for(i = 0, j = data.selected.length; i < j; i++) {
                  r.push(data.instance.get_node(data.selected[i]).state.module_id);
              }
              $('#event_result').val(r.join(','));
        }).jstree();

    </script>
@endpush

