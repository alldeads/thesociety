@extends('layouts/contentLayoutMaster')

@section('title', 'Company Details')

@section('vendor-style')
  	<link rel="stylesheet" href="{{asset(mix('vendors/css/tables/datatable/dataTables.bootstrap4.min.css'))}}">
  	<link rel="stylesheet" href="{{asset(mix('vendors/css/tables/datatable/responsive.bootstrap4.min.css'))}}">
  	<link rel="stylesheet" href="{{asset(mix('vendors/css/tables/datatable/buttons.bootstrap4.min.css'))}}">
@endsection

@section('page-style')
	<link rel="stylesheet" href="{{ asset(mix('css/base/pages/app-invoice-list.css')) }}">
	<link rel="stylesheet" href="{{ asset(mix('css/base/pages/app-user.css')) }}">
@endsection

@section('content')
	@livewire('company.details')
@endsection

@section('vendor-script')
	<script src="{{asset(mix('vendors/js/extensions/moment.min.js'))}}"></script>
	<script src="{{asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js'))}}"></script>
	<script src="{{asset(mix('vendors/js/tables/datatable/datatables.bootstrap4.min.js'))}}"></script>
	<script src="{{asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js'))}}"></script>
	<script src="{{asset(mix('vendors/js/tables/datatable/responsive.bootstrap4.js'))}}"></script>
	<script src="{{asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js'))}}"></script>
	<script src="{{asset(mix('vendors/js/tables/datatable/buttons.bootstrap4.min.js'))}}"></script>
@endsection

@section('page-script')
  	<script src="{{ asset(mix('js/scripts/pages/app-user-view.js')) }}"></script>
@endsection
