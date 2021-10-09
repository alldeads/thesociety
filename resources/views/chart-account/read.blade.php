@extends('layouts.contentLayoutMaster')

@section('title', 'Chart of Accounts')

@section('content')
	@livewire('chart-of-account.read', ['account' => $account])
@endsection
