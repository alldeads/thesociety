@extends('layouts/contentLayoutMaster')

@section('title', 'Stock Levels')

@section('content')
	@livewire('stock-level.index', ['company_id' => $company->id])
@endsection
