@extends('Backend.Adprovider.layouts.master')

@section('title')

<title>Profile | offerbd</title>

@stop

@section('sidebar')

@include ('Backend.Adprovider.layouts.sidebar')

@endsection

@section('content')

<div id="page-wrapper">

	<div class="row">

		<div class="col-lg-12">

			<h1 class="page-header">Profile of {{ Auth::guard('adProvider')->user()->email }}</h1>

		</div>

		<!-- /.col-lg-12 -->

	</div>
	<!-- /.row -->

	@define $membership_info = $profile_info->membership;

	<div class="row profile">

		<div class="col-md-8 profile_left">

			<div class="membership_info">
				<div class="plan_name">
					Membership plan: {{ $membership_info->plan_name }}
				</div>
				<div class="adv_range">
					Advertisement range: {{ $membership_info->adv_range }}/month
				</div>
				<div class="amount">
					Amount: {{ $membership_info->amount }}/month
				</div>	
			</div>
			<hr>
			<div class="profile_com profile_first_name">First Name:

				<a href="#" id="first_name" data-pk={{Auth::guard('adProvider')->user()->id }}>{{ ($profile_info->first_name) ? $profile_info->first_name : "Set First Name" }}
				</a>

			</div>

			<div class="profile_com profile_last_name">Last Name:

				<a href="#" id="last_name" data-pk={{Auth::guard('adProvider')->user()->id }}>{{ ($profile_info->last_name) ? $profile_info->last_name : "Set Last Name" }}
				</a>
				
			</div>

			<div class="profile_com profile_mobile">Mobile:

				<a href="#" id="mobile" data-pk={{Auth::guard('adProvider')->user()->id }}>{{ ($profile_info->mobile) ? $profile_info->mobile : "Set Mobile Number" }}
				</a>

			</div>

			<div class="profile_com profile_address">Address:

				<a href="#" id="address" data-pk={{Auth::guard('adProvider')->user()->id }}>{{ ($profile_info->address) ? $profile_info->address : "Set Address" }}
				</a>

			</div>

		</div>

		<div class="col-md-4 profile_right">

			<div class="profile_image">

				@if($profile_info->image)

				<img src="{{ asset($profile_info->image) }}" alt="{{ $profile_info->first_name }}" height="150px" width="150px">

				@else

				<img src="{{ asset('images/avatar.jpg') }}" alt="image" height="150px" width="150px">

				@endif

				{!! Form::open(['method' => 'POST', 'url' => '/adprovider/saveimage', 'files' => true, 'name' => 'addAdproviderImageForm', 'data-remote' => 'data-remote', 'data-remote-success' => 'Picture saved Successfully']) !!}

				<div class="form-group{{ $errors->has('profile_image') ? ' has-error' : '' }}">
					{!! Form::file('profile_image', ['required' => 'required']) !!}
					<small class="text-danger">{{ $errors->first('profile_image') }}</small>
				</div>
				
				<div class="btn-group pull-right">
					{!! Form::submit("Update", ['class' => 'btn btn-primary']) !!}
				</div>
				
				{!! Form::close() !!}
			</div>
		</div>

	</div>

</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

@endsection
