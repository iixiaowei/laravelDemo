@extends('layouts.master')

@section('title','Page Title')

@section('sidebar')
	@parent
	<p>This is appended to the master sidebar.</p>
@endsection

@section('content')
	<p>This is Page content</p>
	<p>
		student/index
		{{ $name }}
	</p>
	<p>
		{{ date('Y-m-d H:i:s') }}		
	</p>
	<p>{{ $age or 20 }}</p>
	<p>
		
		Hello,{!!  $name !!}.

	</p>
@endsection

