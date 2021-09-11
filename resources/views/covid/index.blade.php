@extends('layouts/contentLayoutMaster')

@section('title', 'Contact Tracing')

@section('content')
	@livewire('covid.index', ['company_id' => $company->id])
@endsection
