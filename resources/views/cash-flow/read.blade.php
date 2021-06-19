@extends('layouts/contentLayoutMaster')

@section('title', 'View Cash Flow')

@section('content')
	@livewire('cash-flow.read', ['cashflow' => $cashflow])
@endsection