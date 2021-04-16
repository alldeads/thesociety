@extends('layouts/contentLayoutMaster')

@section('title', 'New Supplier')

@section('vendor-style')
  	<!-- vendor css files -->
  	<link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/wizard/bs-stepper.min.css')) }}">
@endsection

@section('page-style')
  	<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-wizard.css')) }}">
@endsection

@section('content')
	@livewire('supplier.create', ['company_id' => $company->id])
@endsection

@section('vendor-script')
  	<!-- vendor files -->
  	<script src="{{ asset(mix('vendors/js/forms/wizard/bs-stepper.min.js')) }}"></script>
@endsection
@section('page-script')
  	<!-- Page js files -->
  	<script src="{{ asset(mix('js/scripts/forms/form-wizard.js')) }}"></script>
@endsection
