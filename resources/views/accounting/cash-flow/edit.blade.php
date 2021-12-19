@extends('layouts/contentLayoutMaster')

@section('title', 'Edit Cash Flow')

@section('content')
	@livewire('cash-flow.edit', ['cashflow' => $cashflow])
@endsection