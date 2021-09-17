@extends('layouts/contentLayoutMaster')

@section('title', 'Edit Payment Type')

@section('content')
	@livewire('payment-type.edit', ['payment' => $payment])
@endsection