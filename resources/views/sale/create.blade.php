@extends('layouts/contentLayoutMaster')

@section('title', 'New Sales')

@section('content')
	@livewire('sale.create', ['company' => $company])
@endsection
