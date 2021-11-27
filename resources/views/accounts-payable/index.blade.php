@extends('layouts.contentLayoutMaster')

@section('title', 'Accounts Payable')

@section('content')
	{{-- @include('panels.report') --}}
	
	@if ($showPage['showPage'] === true)
		@livewire('accounts-payable.index', ['company_id' => $company->id])
	@else
		@include('partials.payable-error')
	@endif

@endsection
