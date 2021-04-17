@extends('layouts/contentLayoutMaster')

@section('title', 'Tax')

@section('content')
	@livewire('tax.index', ['company_id' => $company->id])
@endsection
