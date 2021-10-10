@extends('layouts.contentLayoutMaster')

@section('title', 'Contact Tracing')

@section('content')
	@livewire('covid.create', ['company_id' => $company->id])
@endsection
