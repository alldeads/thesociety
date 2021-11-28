@extends('layouts.contentLayoutMaster')

@section('title', 'Accounts Receivable')

@section('content')
	
	@if ($showPage['showPage'] === true)
		@livewire('accounts-receivable.index', ['company_id' => $company->id])
	@else
		@include('partials.receivable-error')
	@endif

@endsection
