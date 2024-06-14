@extends('layouts.app')

@section('content')
    <x-list-item :items="$invoices" firstField="type" secondField="amount" />
@endsection
