@extends('layouts/contentLayoutMaster')

@section('title', 'Accounts Payable')

@section('content')

	@if ($showPage['showPage'] === true)
		@livewire('accounts-payable.create', ['company_id' => $company->id, 'preference' => $showPage['preference']])
	@else
		@include('partials.payable-error')
	@endif
	
@endsection