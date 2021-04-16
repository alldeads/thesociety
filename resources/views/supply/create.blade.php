@extends('layouts/contentLayoutMaster')

@section('title', 'New Supply')

@section('content')
	@livewire('supply.create', ['company_id' => $company->id])
@endsection
