@extends('layouts.contentLayoutMaster')

@section('title', 'Accounts Receivable')

@section('content')
	
	@if ($showPage['showPage'] === true)
		@livewire('accounts-receivable.create', ['company_id' => $company->id, 'preference' => $showPage['preference']])
	@else
		@include('partials.receivable-error')
	@endif

@endsection
