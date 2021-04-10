@extends('layouts/contentLayoutMaster')

@section('title', 'Edit Employee')

@section('vendor-style')
  	{{-- Vendor Css files --}}
  	<link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
  	<link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('page-style')
  	{{-- Page Css files --}}
  	<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
  	<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
  	<link rel="stylesheet" href="{{ asset(mix('css/base/pages/app-user.css')) }}">
@endsection

@section('content')
	@livewire('employee.edit', [
		'company_id' => $company->id,
		'employee'   => $emp
	])
@endsection

@section('vendor-script')
  	{{-- Vendor js files --}}
	<script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
	<script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
	<script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
@endsection

@section('page-script')
  	{{-- Page js files --}}
  	<script src="{{ asset(mix('js/scripts/pages/app-user-edit.js')) }}"></script>
  	<script src="{{ asset(mix('js/scripts/components/components-navs.js')) }}"></script>
@endsection
