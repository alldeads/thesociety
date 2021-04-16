@extends('layouts/contentLayoutMaster')

@section('title', 'Edit Supply')

@section('content')
	@livewire('supply.edit', [
		'company_id' => $company->id,
		'supply'     => $supply
	])
@endsection
