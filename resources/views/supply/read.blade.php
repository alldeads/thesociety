@extends('layouts/contentLayoutMaster')

@section('title', 'View Supply')

@section('content')
	@livewire('supply.read', [
		'company_id' => $company->id,
		'supply'     => $supply
	])
@endsection
