@extends('layouts.contentLayoutMaster')

@section('title', 'Contact Tracing')

@section('content')
	@livewire('covid.read', ['covid' => $covid])
@endsection
