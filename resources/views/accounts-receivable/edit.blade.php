@extends('layouts/contentLayoutMaster')

@section('title', 'Edit Accounts Receivable')

@section('content')

	@if ($showPage['showPage'] === true)
		@livewire('accounts-receivable.edit', ['preference' => $showPage['preference'], 'receivable' => $receivable])
	@else
		@include('partials.receivable-error')
	@endif
	
@endsection