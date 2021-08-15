@extends('layouts/contentLayoutMaster')

@section('title', 'Branch')

@section('content')
	@livewire('branch.create', ['company_id' => $company->id])
@endsection