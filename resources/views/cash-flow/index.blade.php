@extends('layouts/contentLayoutMaster')

@section('title', 'Cash Flow')

@section('vendor-style')
	<!-- vendor css files -->
	<link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
@endsection

@section('content')
	@livewire('cash-flow.index', ['company_id' => $company->id])
@endsection

@section('vendor-script')
	<!-- vendor files -->
	<script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
@endsection

@section('page-script')
	<!-- Page js files -->
	<script src="{{ asset(mix('js/scripts/forms/form-select2.js')) }}"></script>
@endsection