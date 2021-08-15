@extends('layouts/contentLayoutMaster')

@section('title', 'Edit Branch')

@section('content')
	@livewire('branch.edit', ['branch' => $branch])
@endsection