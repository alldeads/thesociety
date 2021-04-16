@extends('layouts/contentLayoutMaster')

@section('title', 'Supplies')

@section('content')
	@livewire('supply.index', ['company_id' => $company->id])
@endsection
