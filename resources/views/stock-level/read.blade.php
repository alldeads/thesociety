@extends('layouts/contentLayoutMaster')

@section('title', 'View Stock')

@section('content')
	@livewire('stock-level.read', [
		'stock'      => $stock
	])
@endsection
