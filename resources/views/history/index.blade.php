@extends('layouts/contentLayoutMaster')

@section('title', 'Inventory Histories')

@section('content')
	@livewire('history.index', ['company_id' => $company->id])
@endsection
