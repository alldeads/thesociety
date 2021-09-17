@extends('layouts/contentLayoutMaster')

@section('title', 'View Payment Type')

@section('content')
	@livewire('payment-type.read', ['payment' => $payment])
@endsection