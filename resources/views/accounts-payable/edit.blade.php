@extends('layouts/contentLayoutMaster')

@section('title', 'Edit Accounts Payable')

@section('content')

	@if ($showPage['showPage'] === true)
		@livewire('accounts-payable.edit', ['preference' => $showPage['preference'], 'payable' => $payable])
	@else
		@include('partials.payable-error')
	@endif
	
@endsection