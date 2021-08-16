@extends('layouts/contentLayoutMaster')

@section('title', 'View Branch')

@section('content')
	@livewire('branch.read', ['branch' => $branch])
@endsection