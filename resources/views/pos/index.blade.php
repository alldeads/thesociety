@extends('pos.layouts.master')

@section('content')
	@livewire('pos.product', ['company_id' => $company->id])
@endsection