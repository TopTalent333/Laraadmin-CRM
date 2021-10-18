@extends('la.layouts.app')

@section('htmlheader_title')
	Organization View
@endsection


@section('main-content')
<div id="page-content" class="profile2">
	<div class="bg-primary clearfix">
		<div class="col-md-4">
			<div class="row">
				<div class="col-md-3">
					<!--<img class="profile-image" src="{{ asset('la-assets/img/avatar5.png') }}" alt="">-->
					<div class="profile-icon text-primary"><i class="fa {{ $module->fa_icon }}"></i></div>
				</div>
				<div class="col-md-9">
					<h4 class="name">{{ $organization->$view_col }}</h4>
					<div class="row stats">
						<div class="col-md-4"><i class="fa fa-facebook"></i> 234</div>
						<div class="col-md-4"><i class="fa fa-twitter"></i> 12</div>
						<div class="col-md-4"><i class="fa fa-instagram"></i> 89</div>
					</div>
					<p class="desc">Test Description in one line</p>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="dats1"><div class="label2">Admin</div></div>
			<div class="dats1"><i class="fa fa-envelope-o"></i> superadmin@gmail.com</div>
			<div class="dats1"><i class="fa fa-map-marker"></i> Pune, India</div>
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
			<div class="dats1 pb">
				<div class="clearfix">
					<span class="pull-left">Task #1</span>
					<small class="pull-right">20%</small>
				</div>
				<div class="progress progress-xs active">
					<div class="progress-bar progress-bar-warning progress-bar-striped" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
						<span class="sr-only">20% Complete</span>
					</div>
				</div>
			</div>
			<div class="dats1 pb">
				<div class="clearfix">
					<span class="pull-left">Task #2</span>
					<small class="pull-right">90%</small>
				</div>
				<div class="progress progress-xs active">
					<div class="progress-bar progress-bar-warning progress-bar-striped" style="width: 90%" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
						<span class="sr-only">90% Complete</span>
					</div>
				</div>
			</div>
			<div class="dats1 pb">
				<div class="clearfix">
					<span class="pull-left">Task #3</span>
					<small class="pull-right">60%</small>
				</div>
				<div class="progress progress-xs active">
					<div class="progress-bar progress-bar-warning progress-bar-striped" style="width: 60%" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">
						<span class="sr-only">60% Complete</span>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-1 actions">
			@la_access("Organizations", "edit")
				<a href="{{ url(config('laraadmin.adminRoute') . '/organizations/'.$organization->id.'/edit') }}" class="btn btn-xs btn-edit btn-default"><i class="fa fa-pencil"></i></a><br>
			@endla_access
			
			@la_access("Organizations", "delete")
				{{ Form::open(['route' => [config('laraadmin.adminRoute') . '.organizations.destroy', $organization->id], 'method' => 'delete', 'style'=>'display:inline']) }}
					<button class="btn btn-default btn-delete btn-xs" type="submit"><i class="fa fa-times"></i></button>
				{{ Form::close() }}
			@endla_access
		</div>
	</div>

	<ul data-toggle="ajax-tab" class="nav nav-tabs profile" role="tablist">
		<li class=""><a href="{{ url(config('laraadmin.adminRoute') . '/organizations') }}" data-toggle="tooltip" data-placement="right" title="Back to Organizations"><i class="fa fa-chevron-left"></i></a></li>
		<li class="active"><a role="tab" data-toggle="tab" class="active" href="#tab-general-info" data-target="#tab-info"><i class="fa fa-bars"></i> General Info</a></li>
		<li class=""><a role="tab" data-toggle="tab" href="#tab-contacts" data-target="#tab-contacts"><i class="fa {{ Module::get('Contacts')->fa_icon }}"></i> Contacts</a></li>
		<li class=""><a role="tab" data-toggle="tab" href="#tab-opportunities" data-target="#tab-opportunities"><i class="fa {{ Module::get('Opportunities')->fa_icon }}"></i> Opportunities</a></li>
		<li class=""><a role="tab" data-toggle="tab" href="#tab-projects" data-target="#tab-projects"><i class="fa {{ Module::get('Projects')->fa_icon }}"></i> Projects</a></li>
		<li class=""><a role="tab" data-toggle="tab" href="#tab-tickets" data-target="#tab-tickets"><i class="fa {{ Module::get('Tickets')->fa_icon }}"></i> Tickets</a></li>
		<li class=""><a role="tab" data-toggle="tab" href="#tab-timeline" data-target="#tab-timeline"><i class="fa fa-clock-o"></i> Timeline</a></li>
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
						<div class="col-md-6">@la_display($module, 'email_primary')</div>
					</div>
					<div class="row">
						<div class="col-md-6">@la_display($module, 'email_secondary')</div>
						<div class="col-md-6">@la_display($module, 'phone_primary')</div>
					</div>
					<div class="row">
						<div class="col-md-6">@la_display($module, 'phone_secondary')</div>
						<div class="col-md-6">@la_display($module, 'website')</div>
					</div>
					<div class="row">
						<div class="col-md-6">@la_display($module, 'type')</div>
						<div class="col-md-6">@la_display($module, 'assigned_to')</div>
					</div>
					<div class="row">
						<div class="col-md-6">@la_display($module, 'connected_since')</div>
						<div class="col-md-6">@la_display($module, 'address')</div>
					</div>
					<div class="row">
						<div class="col-md-6">@la_display($module, 'country')</div>
						<div class="col-md-6">@la_display($module, 'city')</div>
					</div>
					<div class="row">
						<div class="col-md-6">@la_display($module, 'postal_code')</div>
						<div class="col-md-6">@la_display($module, 'description')</div>
					</div>
					<div class="row">
						<div class="col-md-6">@la_display($module, 'profile_image')</div>
						<div class="col-md-6">@la_display($module, 'profile')</div>
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

		<div role="tabpanel" class="tab-pane fade" id="tab-contacts">
			<div class="tab-content">
				<div class="panel">
					<div class="panel-default panel-heading">
						<h4>Contacts assigned to {{ $organization->name }}</h4>
					</div>
					<div class="panel-body p20">
						<table id="dt-organization-contacts" class="table table-bordered" style="width:100%;">
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

		<div role="tabpanel" class="tab-pane fade" id="tab-opportunities">
			<div class="tab-content">
				<div class="panel">
					<div class="panel-default panel-heading">
						<h4>Opportunities assigned to {{ $organization->name }}</h4>
					</div>
					<div class="panel-body p20">
						<table id="dt-organization-opportunities" class="table table-bordered" style="width:100%;">
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

		<div role="tabpanel" class="tab-pane fade" id="tab-projects">
			<div class="tab-content">
				<div class="panel">
					<div class="panel-default panel-heading">
						<h4>Projects assigned to {{ $organization->name }}</h4>
					</div>
					<div class="panel-body p20">
						<table id="dt-organization-projects" class="table table-bordered" style="width:100%;">
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
						<h4>Tickets assigned to {{ $organization->name }}</h4>
					</div>
					<div class="panel-body p20">
						<table id="dt-organization-tickets" class="table table-bordered" style="width:100%;">
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
	var dt_employee_contacts = $("#dt-organization-contacts").DataTable({
		processing: true,
		serverSide: true,
		ajax: {
			"url": "{{ url(config('laraadmin.adminRoute') . '/contact_dt_ajax') }}",
			"data": function ( data_custom ) {
				data_custom.filter_column = "organization";
				data_custom.filter_column_value = "{{ $organization->id }}";
			}
		},
		language: {
			lengthMenu: "_MENU_",
			search: "_INPUT_",
			searchPlaceholder: "Search"
		},
		columnDefs: [ { orderable: false, targets: [-1] }]
	});

	var dt_employee_opportunities = $("#dt-organization-opportunities").DataTable({
		processing: true,
		serverSide: true,
		ajax: {
			"url": "{{ url(config('laraadmin.adminRoute') . '/opportunity_dt_ajax') }}",
			"data": function ( data_custom ) {
				data_custom.filter_column = "organization";
				data_custom.filter_column_value = "{{ $organization->id }}";
			}
		},
		language: {
			lengthMenu: "_MENU_",
			search: "_INPUT_",
			searchPlaceholder: "Search"
		},
		columnDefs: [ { orderable: false, targets: [-1] }]
	});

	var dt_employee_projects = $("#dt-organization-projects").DataTable({
		processing: true,
		serverSide: true,
		ajax: {
			"url": "{{ url(config('laraadmin.adminRoute') . '/project_dt_ajax') }}",
			"data": function ( data_custom ) {
				data_custom.filter_column = "organization";
				data_custom.filter_column_value = "{{ $organization->id }}";
			}
		},
		language: {
			lengthMenu: "_MENU_",
			search: "_INPUT_",
			searchPlaceholder: "Search"
		},
		columnDefs: [ { orderable: false, targets: [-1] }]
	});

	var dt_employee_tickets = $("#dt-organization-tickets").DataTable({
		processing: true,
		serverSide: true,
		ajax: {
			"url": "{{ url(config('laraadmin.adminRoute') . '/ticket_dt_ajax') }}",
			"data": function ( data_custom ) {
				data_custom.filter_column = "organization";
				data_custom.filter_column_value = "{{ $organization->id }}";
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

