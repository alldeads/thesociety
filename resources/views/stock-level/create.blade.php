@extends('layouts/contentLayoutMaster')

@section('title', 'New Stock')

@section('content')
	@livewire('stock-level.create', ['company_id' => $company->id])
@endsection
