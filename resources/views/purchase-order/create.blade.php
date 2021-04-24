@extends('layouts/contentLayoutMaster')

@section('title', 'Create Purchase Order')

@section('vendor-style')
	<link rel="stylesheet" href="{{asset('vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
@endsection

@section('page-style')
	<link rel="stylesheet" href="{{asset('css/base/plugins/forms/pickers/form-flat-pickr.css')}}">
	<link rel="stylesheet" href="{{asset('css/base/pages/app-invoice.css')}}">
@endsection

@section('content')
	@livewire('purchase-order.create', ['company' => $company])
@endsection

@section('vendor-script')
	<script src="{{asset('vendors/js/forms/repeater/jquery.repeater.min.js')}}"></script>
	<script src="{{asset('vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
@endsection

@section('page-script')
	<script src="{{asset('js/scripts/pages/app-invoice.js')}}"></script>
@endsection
