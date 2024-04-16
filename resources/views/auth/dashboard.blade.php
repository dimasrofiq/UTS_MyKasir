@extends('auth.header')
@section('content')

@if ($message = Session::get('success'))
@else
<p>You are logged in!</p>
@endif  
   
  @endsection



