@extends('layouts/contentLayoutMaster')

@section('title', 'Edit Company')

@section('vendor-style')
  	<!-- vendor css files -->
  	<link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/wizard/bs-stepper.min.css')) }}">
  	<link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
@endsection

@section('page-style')
  	<!-- Page css files -->
  	<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
  	<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-wizard.css')) }}">
@endsection

@section('content')
	@livewire('company.edit', ['company' => $company])
@endsection

@section('vendor-script')
  	<!-- vendor files -->
  	<script src="{{ asset(mix('vendors/js/forms/wizard/bs-stepper.min.js')) }}"></script>
  	<script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
  	<script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
@endsection
@section('page-script')
  	<!-- Page js files -->
  	<script src="{{ asset(mix('js/scripts/forms/form-wizard.js')) }}"></script>
@endsection
