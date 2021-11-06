@extends('layouts.contentLayoutMaster')

@section('title', 'Tax')

@section('content')
	@livewire('tax.create', ['company_id' => $company->id])
@endsection
