@extends('layouts/contentLayoutMaster')

@section('title', 'View Accounts Payable')

@section('content')

	@if ($showPage['showPage'] === true)
		@livewire('accounts-payable.read', ['preference' => $showPage['preference'], 'payable' => $payable])
	@else
		@include('partials.payable-error')
	@endif
	
@endsection