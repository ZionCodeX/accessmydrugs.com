
@extends('layouts.base_email')



@section('company')
    AccessMyDrugs
@endsection



@section('title')
    {{ $data['message_title'] ?? 'AccessMyDrug Team' }}
@endsection



@section('content')
    {!! $data['message_body'] ?? 'No message available.' !!}
@endsection



@section('designation')
    {!! $data['message_designation'] ?? 'AMD Team' !!}
@endsection