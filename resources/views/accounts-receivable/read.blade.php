@extends('layouts/contentLayoutMaster')

@section('title', 'View Accounts Receivable')

@section('content')

	@if ($showPage['showPage'] === true)
		@livewire('accounts-receivable.read', ['preference' => $showPage['preference'], 'receivable' => $receivable])
	@else
		@include('partials.receivable-error')
	@endif
	
@endsection