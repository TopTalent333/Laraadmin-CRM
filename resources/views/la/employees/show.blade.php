@extends('la.layouts.app')

@section('htmlheader_title')
	Employee View
@endsection


@section('main-content')
<div id="page-content" class="profile2">
	<div class="bg-success clearfix">
		<div class="col-md-4">
			<div class="row">
				<div class="col-md-3">
					<img class="profile-image" src="{{ Gravatar::fallback(asset('/img/avatar5.png'))->get(Auth::user()->email, ['size'=>400]) }}" alt="">
				</div>
				<div class="col-md-9">
					<h4 class="name">{{ $employee->$view_col }}</h4>
					<div class="row stats">
						<div class="col-md-6 stat"><div class="label2" data-toggle="tooltip" data-placement="top" title="Designation">{{ $employee->designation }}</div></div>
						<div class="col-md-6 stat"><i class="fa fa-map-marker"></i> {{ $employee->city or "NA" }}</div>
					</div>
					<p class="desc">{{ substr($employee->about, 0, 33) }}@if(strlen($employee->about) > 33)...@endif</p>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="dats1"><i class="fa fa-envelope-o"></i> {{ $employee->email }}</div>
			<div class="dats1"><i class="fa fa-phone"></i> {{ $employee->mobile }}</div>
			<div class="dats1"><i class="fa fa-clock-o"></i> Joined on {{ date("M d, Y", strtotime($employee->date_hire)) }}</div>
		</div>
		<div class="col-md-4">
		<!--
			<div class="teamview">
				<a class="face" data-toggle="tooltip" data-placement="top" title="John Doe"><img src="{{ asset('la-assets/img/user1-128x128.jpg') }}" alt=""><i class="status-online"></i></a>
				<a class="face" data-toggle="tooltip" data-placement="top" title="John Doe"><img src="{{ asset('la-assets/img/user2-160x160.jpg') }}" alt=""></a>
				<a class="face" data-toggle="tooltip" data-placement="top" title="John Doe"><img src="{{ asset('la-assets/img/user3-128x128.jpg') }}" alt=""></a>
				<a class="face" data-toggle="tooltip" data-placement="top" title="John Doe"><img src="{{ asset('la-assets/img/user4-128x128.jpg') }}" alt=""><i class="status-online"></i></a>
				<a class="face" data-toggle="tooltip" data-placement="top" title="John Doe"><img src="{{ asset('la-assets/img/user5-128x128.jpg') }}" alt=""></a>
				<a class="face" data-toggle="tooltip" data-placement="top" title="John Doe"><img src="{{ asset('la-assets/img/user6-128x128.jpg') }}" alt=""></a>
				<a class="face" data-toggle="tooltip" data-placement="top" title="John Doe"><img src="{{ asset('la-assets/img/user7-128x128.jpg') }}" alt=""></a>
				<a class="face" data-toggle="tooltip" data-placement="top" title="John Doe"><img src="{{ asset('la-assets/img/user8-128x128.jpg') }}" alt=""></a>
				<a class="face" data-toggle="tooltip" data-placement="top" title="John Doe"><img src="{{ asset('la-assets/img/user5-128x128.jpg') }}" alt=""></a>
				<a class="face" data-toggle="tooltip" data-placement="top" title="John Doe"><img src="{{ asset('la-assets/img/user6-128x128.jpg') }}" alt=""><i class="status-online"></i></a>
				<a class="face" data-toggle="tooltip" data-placement="top" title="John Doe"><img src="{{ asset('la-assets/img/user7-128x128.jpg') }}" alt=""></a>
			</div>
		-->
			
		</div>
		<div class="col-md-1 actions">
			@la_access("Employees", "edit")
				<a href="{{ url(config('laraadmin.adminRoute') . '/employees/'.$employee->id.'/edit') }}" class="btn btn-xs btn-edit btn-default"><i class="fa fa-pencil"></i></a><br>
			@endla_access
			
			@la_access("Employees", "delete")
				{{ Form::open(['route' => [config('laraadmin.adminRoute') . '.employees.destroy', $employee->id], 'method' => 'delete', 'style'=>'display:inline']) }}
					<button class="btn btn-default btn-delete btn-xs" type="submit"><i class="fa fa-times"></i></button>
				{{ Form::close() }}
			@endla_access
		</div>
	</div>

	<ul data-toggle="ajax-tab" class="nav nav-tabs profile" role="tablist">
		<li class=""><a href="{{ url(config('laraadmin.adminRoute') . '/employees') }}" data-toggle="tooltip" data-placement="right" title="Back to Employees"><i class="fa fa-chevron-left"></i></a></li>
		<li class="active"><a role="tab" data-toggle="tab" class="active" href="#tab-info" data-target="#tab-info"><i class="fa fa-bars"></i> General Info</a></li>
		<li class=""><a role="tab" data-toggle="tab" href="#tab-timeline" data-target="#tab-timeline"><i class="fa fa-clock-o"></i> Timeline</a></li>
		<li class=""><a role="tab" data-toggle="tab" href="#tab-organizations" data-target="#tab-organizations"><i class="fa {{ Module::get('Tickets')->fa_icon }}"></i> Organizations</a></li>
		<li class=""><a role="tab" data-toggle="tab" href="#tab-contacts" data-target="#tab-contacts"><i class="fa {{ Module::get('Contacts')->fa_icon }}"></i> Contacts</a></li>
		<li class=""><a role="tab" data-toggle="tab" href="#tab-leads" data-target="#tab-leads"><i class="fa {{ Module::get('Leads')->fa_icon }}"></i> Leads</a></li>
		<li class=""><a role="tab" data-toggle="tab" href="#tab-opportunities" data-target="#tab-opportunities"><i class="fa {{ Module::get('Opportunities')->fa_icon }}"></i> Opportunities</a></li>
		<li class=""><a role="tab" data-toggle="tab" href="#tab-projects" data-target="#tab-projects"><i class="fa {{ Module::get('Projects')->fa_icon }}"></i> Projects</a></li>
		<li class=""><a role="tab" data-toggle="tab" href="#tab-tickets" data-target="#tab-tickets"><i class="fa {{ Module::get('Tickets')->fa_icon }}"></i> Tickets</a></li>
		@if($employee->id == Auth::user()->id || Entrust::hasRole("SUPER_ADMIN"))
			<li class=""><a role="tab" data-toggle="tab" href="#tab-account-settings" data-target="#tab-account-settings"><i class="fa fa-key"></i> Account settings</a></li>
		@endif
	</ul>

	<div class="tab-content">
		<div role="tabpanel" class="tab-pane active fade in" id="tab-info">
			<div class="tab-content">
				<div class="panel infolist">
					<div class="panel-default panel-heading">
						<h4>General Info</h4>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-6">@la_display($module, 'name')</div>
							<div class="col-md-6">@la_display($module, 'designation')</div>
						</div>
						<div class="row">
							<div class="col-md-6">@la_display($module, 'gender')</div>
							<div class="col-md-6">@la_display($module, 'phone_primary')</div>
						</div>
						<div class="row">
							<div class="col-md-6">@la_display($module, 'phone_secondary')</div>
							<div class="col-md-6">@la_display($module, 'email')</div>
						</div>
						<div class="row">
							<div class="col-md-6">@la_display($module, 'dept')</div>
							<div class="col-md-6">@la_display($module, 'city')</div>
						</div>
						<div class="row">
							<div class="col-md-6">@la_display($module, 'address')</div>
							<div class="col-md-6">@la_display($module, 'about')</div>
						</div>
						<div class="row">
							<div class="col-md-6">@la_display($module, 'date_birth')</div>
							<div class="col-md-6">@la_display($module, 'date_hire')</div>
						</div>
						<div class="row">
							<div class="col-md-6">@la_display($module, 'date_left')</div>
							<div class="col-md-6">@la_display($module, 'salary_cur')</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div role="tabpanel" class="tab-pane fade in p20 bg-white" id="tab-timeline">
			<ul class="timeline timeline-inverse">
				<!-- timeline time label -->
				<li class="time-label">
					<span class="bg-red">
						10 Feb. 2014
					</span>
				</li>
				<!-- /.timeline-label -->
				<!-- timeline item -->
				<li>
				<i class="fa fa-envelope bg-blue"></i>

				<div class="timeline-item">
					<span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

					<h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

					<div class="timeline-body">
					Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
					weebly ning heekya handango imeem plugg dopplr jibjab, movity
					jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
					quora plaxo ideeli hulu weebly balihoo...
					</div>
					<div class="timeline-footer">
					<a class="btn btn-primary btn-xs">Read more</a>
					<a class="btn btn-danger btn-xs">Delete</a>
					</div>
				</div>
				</li>
				<!-- END timeline item -->
				<!-- timeline item -->
				<li>
				<i class="fa fa-user bg-aqua"></i>

				<div class="timeline-item">
					<span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

					<h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
					</h3>
				</div>
				</li>
				<!-- END timeline item -->
				<!-- timeline item -->
				<li>
				<i class="fa fa-comments bg-yellow"></i>

				<div class="timeline-item">
					<span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

					<h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

					<div class="timeline-body">
					Take me to your leader!
					Switzerland is small and neutral!
					We are more like Germany, ambitious and misunderstood!
					</div>
					<div class="timeline-footer">
					<a class="btn btn-warning btn-flat btn-xs">View comment</a>
					</div>
				</div>
				</li>
				<!-- END timeline item -->
				<!-- timeline time label -->
				<li class="time-label">
					<span class="bg-green">
						3 Jan. 2014
					</span>
				</li>
				<!-- /.timeline-label -->
				<!-- timeline item -->
				<li>
				<i class="fa fa-camera bg-purple"></i>

				<div class="timeline-item">
					<span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

					<h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

					<div class="timeline-body">
					<img src="http://placehold.it/150x100" alt="..." class="margin">
					<img src="http://placehold.it/150x100" alt="..." class="margin">
					<img src="http://placehold.it/150x100" alt="..." class="margin">
					<img src="http://placehold.it/150x100" alt="..." class="margin">
					</div>
				</div>
				</li>
				<!-- END timeline item -->
				<li>
				<i class="fa fa-clock-o bg-gray"></i>
				</li>
			</ul>
			<!--<div class="text-center p30"><i class="fa fa-list-alt" style="font-size: 100px;"></i> <br> No posts to show</div>-->
		</div>

		<div role="tabpanel" class="tab-pane fade" id="tab-organizations">
			<div class="tab-content">
				<div class="panel">
					<div class="panel-default panel-heading">
						<h4>Organizations assigned to {{ $employee->name }}</h4>
					</div>
					<div class="panel-body p20">
						<table id="dt-employee-organizations" class="table table-bordered" style="width:100%;">
							<thead>
								<?php
								$listing_cols = Module::getListingColumns('Organizations', true);
								?>
								<tr class="success">
									@foreach( $listing_cols as $col )
										<th>{{ $col['label'] }}</th>
									@endforeach
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<div role="tabpanel" class="tab-pane fade" id="tab-contacts">
			<div class="tab-content">
				<div class="panel">
					<div class="panel-default panel-heading">
						<h4>Contacts assigned to {{ $employee->name }}</h4>
					</div>
					<div class="panel-body p20">
						<table id="dt-employee-contacts" class="table table-bordered" style="width:100%;">
							<thead>
								<?php
								$listing_cols = Module::getListingColumns('Contacts', true);
								?>
								<tr class="success">
									@foreach( $listing_cols as $col )
										<th>{{ $col['label'] }}</th>
									@endforeach
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<div role="tabpanel" class="tab-pane fade" id="tab-leads">
			<div class="tab-content">
				<div class="panel">
					<div class="panel-default panel-heading">
						<h4>Leads assigned to {{ $employee->name }}</h4>
					</div>
					<div class="panel-body p20">
						<table id="dt-employee-leads" class="table table-bordered" style="width:100%;">
							<thead>
								<?php
								$listing_cols = Module::getListingColumns('Leads', true);
								?>
								<tr class="success">
									@foreach( $listing_cols as $col )
										<th>{{ $col['label'] }}</th>
									@endforeach
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<div role="tabpanel" class="tab-pane fade" id="tab-projects">
			<div class="tab-content">
				<div class="panel">
					<div class="panel-default panel-heading">
						<h4>Projects assigned to {{ $employee->name }}</h4>
					</div>
					<div class="panel-body p20">
						<table id="dt-employee-projects" class="table table-bordered" style="width:100%;">
							<thead>
								<?php
								$listing_cols = Module::getListingColumns('Projects', true);
								?>
								<tr class="success">
									@foreach( $listing_cols as $col )
										<th>{{ $col['label'] }}</th>
									@endforeach
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<div role="tabpanel" class="tab-pane fade" id="tab-tickets">
			<div class="tab-content">
				<div class="panel">
					<div class="panel-default panel-heading">
						<h4>Tickets assigned to {{ $employee->name }}</h4>
					</div>
					<div class="panel-body p20">
						<table id="dt-employee-tickets" class="table table-bordered" style="width:100%;">
							<thead>
								<?php
								$listing_cols = Module::getListingColumns('Tickets', true);
								?>
								<tr class="success">
									@foreach( $listing_cols as $col )
										<th>{{ $col['label'] }}</th>
									@endforeach
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<div role="tabpanel" class="tab-pane fade" id="tab-opportunities">
			<div class="tab-content">
				<div class="panel">
					<div class="panel-default panel-heading">
						<h4>Opportunities assigned to {{ $employee->name }}</h4>
					</div>
					<div class="panel-body p20">
						<table id="dt-employee-opportunities" class="table table-bordered" style="width:100%;">
							<thead>
								<?php
								$listing_cols = Module::getListingColumns('Opportunities', true);
								?>
								<tr class="success">
									@foreach( $listing_cols as $col )
										<th>{{ $col['label'] }}</th>
									@endforeach
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		
		@if($employee->id == Auth::user()->id || Entrust::hasRole("SUPER_ADMIN"))
		<div role="tabpanel" class="tab-pane fade" id="tab-account-settings">
			<div class="tab-content">
				<form action="{{ url(config('laraadmin.adminRoute') . '/change_password/'.$employee->id) }}" id="password-reset-form" class="general-form dashed-row white" method="post" accept-charset="utf-8">
					{{ csrf_field() }}
					<div class="panel">
						<div class="panel-default panel-heading">
							<h4>Account settings</h4>
						</div>
						<div class="panel-body">
							@if (count($errors) > 0)
								<div class="alert alert-danger">
									<ul>
										@foreach ($errors->all() as $error)
											<li>{{ $error }}</li>
										@endforeach
									</ul>
								</div>
							@endif
							@if(Session::has('success_message'))
								<p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success_message') }}</p>
							@endif
							<div class="form-group">
								<label for="password" class=" col-md-2">Password</label>
								<div class=" col-md-10">
									<input type="password" name="password" value="" id="password" class="form-control" placeholder="Password" autocomplete="off" required="required" data-rule-minlength="6" data-msg-minlength="Please enter at least 6 characters.">
								</div>
							</div>
							<div class="form-group">
								<label for="password_confirmation" class=" col-md-2">Retype password</label>
								<div class=" col-md-10">
									<input type="password" name="password_confirmation" value="" id="password_confirmation" class="form-control" placeholder="Retype password" autocomplete="off" required="required" data-rule-equalto="#password" data-msg-equalto="Please enter the same value again.">
								</div>
							</div>
						</div>
						<div class="panel-footer">
							<button type="submit" class="btn btn-primary"><span class="fa fa-check-circle"></span> Change Password</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		@endif
	</div>
	</div>
	</div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('la-assets/plugins/datatables/datatables.min.css') }}"/>
@endpush

@push('scripts')
<script src="{{ asset('la-assets/plugins/datatables/datatables.min.js') }}"></script>
<script>
$(function () {
	@if($employee->id == Auth::user()->id || Entrust::hasRole("SUPER_ADMIN"))
	$('#password-reset-form').validate({
		
	});
	@endif

	var dt_employee_organizations = $("#dt-employee-organizations").DataTable({
		processing: true,
		serverSide: true,
		ajax: {
			"url": "{{ url(config('laraadmin.adminRoute') . '/organization_dt_ajax') }}",
			"data": function ( data_custom ) {
				data_custom.filter_column = "assigned_to";
				data_custom.filter_column_value = "{{ $employee->id }}";
			}
		},
		language: {
			lengthMenu: "_MENU_",
			search: "_INPUT_",
			searchPlaceholder: "Search"
		},
		columnDefs: [ { orderable: false, targets: [-1] }]
	});

	var dt_employee_contacts = $("#dt-employee-contacts").DataTable({
		processing: true,
		serverSide: true,
		ajax: {
			"url": "{{ url(config('laraadmin.adminRoute') . '/contact_dt_ajax') }}",
			"data": function ( data_custom ) {
				data_custom.filter_column = "assigned_to";
				data_custom.filter_column_value = "{{ $employee->id }}";
			}
		},
		language: {
			lengthMenu: "_MENU_",
			search: "_INPUT_",
			searchPlaceholder: "Search"
		},
		columnDefs: [ { orderable: false, targets: [-1] }]
	});

	var dt_employee_leads = $("#dt-employee-leads").DataTable({
		processing: true,
		serverSide: true,
		ajax: {
			"url": "{{ url(config('laraadmin.adminRoute') . '/lead_dt_ajax') }}",
			"data": function ( data_custom ) {
				data_custom.filter_column = "assigned_to";
				data_custom.filter_column_value = "{{ $employee->id }}";
			}
		},
		language: {
			lengthMenu: "_MENU_",
			search: "_INPUT_",
			searchPlaceholder: "Search"
		},
		columnDefs: [ { orderable: false, targets: [-1] }]
	});

	var dt_employee_projects = $("#dt-employee-projects").DataTable({
		processing: true,
		serverSide: true,
		ajax: {
			"url": "{{ url(config('laraadmin.adminRoute') . '/project_dt_ajax') }}",
			"data": function ( data_custom ) {
				data_custom.filter_column = "assigned_to";
				data_custom.filter_column_value = "{{ $employee->id }}";
			}
		},
		language: {
			lengthMenu: "_MENU_",
			search: "_INPUT_",
			searchPlaceholder: "Search"
		},
		columnDefs: [ { orderable: false, targets: [-1] }]
	});

	var dt_employee_tickets = $("#dt-employee-tickets").DataTable({
		processing: true,
		serverSide: true,
		ajax: {
			"url": "{{ url(config('laraadmin.adminRoute') . '/ticket_dt_ajax') }}",
			"data": function ( data_custom ) {
				data_custom.filter_column = "assigned_to";
				data_custom.filter_column_value = "{{ $employee->id }}";
			}
		},
		language: {
			lengthMenu: "_MENU_",
			search: "_INPUT_",
			searchPlaceholder: "Search"
		},
		columnDefs: [ { orderable: false, targets: [-1] }]
	});

	var dt_employee_opportunities = $("#dt-employee-opportunities").DataTable({
		processing: true,
		serverSide: true,
		ajax: {
			"url": "{{ url(config('laraadmin.adminRoute') . '/opportunity_dt_ajax') }}",
			"data": function ( data_custom ) {
				data_custom.filter_column = "assigned_to";
				data_custom.filter_column_value = "{{ $employee->id }}";
			}
		},
		language: {
			lengthMenu: "_MENU_",
			search: "_INPUT_",
			searchPlaceholder: "Search"
		},
		columnDefs: [ { orderable: false, targets: [-1] }]
	});
});
</script>
@endpush
