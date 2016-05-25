@extends('Backend.Admin.layouts.master')

@section('sidebar')

@include ('Backend.Admin.layouts.sidebar')

@endsection

@section('content')

<div id="page-wrapper" class="pending_advertisements">

	@include ('Backend.modals.approve_advertisement_modal')

	@include ('Backend.modals.remove_advertisement_modal')

	<div class="row">

		<div class="col-lg-12">

			<h3 class="page-header">
				List of all <strong>Pending</strong> Advertisements
			</h3>

		</div>

		<!-- /.col-lg-12 -->

	</div>
	<!-- /.row -->

	<div class="table-responsive advertisements_table">

		@if (count($pending_advertisements)>0)

		<table class="table offerbd_table">
			<caption>Available Pending Advertisements</caption>
			<thead>
				<tr>
					<th>SL#</th>
					<th>Image</th>
					<th>Approved</th>
					<th>Delete</th>
					<th>Owner</th>
				</tr>
			</thead>
			<tbody>

				<?php foreach ($pending_advertisements as $key => $advertisement): ?>

					<tr>
						<td>{{ $key+1 }}</td>
						<td>
							<a href="/admin/advertisements/details/{{$advertisement->id}}" title="click to see the detail page" target="_blank">
								<img src="{{ asset($advertisement->ad_image) }}" alt="adno{{$advertisement->id}}">
							</a>
						</td>
						<td class="approve_advertisement">
							<a href="#" title="click to approve" id="{{$advertisement->id}}">
								<i class="glyphicon glyphicon-ok"></i>
							</a>
						</td>
						<td class="remove_advertisement">
							<a href="#" title="click to delete" id="{{$advertisement->id}}">
								<i class="glyphicon glyphicon-remove"></i>
							</a>						
						</td>
						<td>
							<a href="/profile/members/{{ $advertisement->profile->id }}">
								{{ $advertisement->profile->first_name." ".$advertisement->profile->last_name }}
							</a>
						</td>
					</tr>
				<?php endforeach ?>

			</tbody>
		</table>

		@else

		<strong>No pending advertisement available</strong>

		@endif

	</div>

</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

@endsection