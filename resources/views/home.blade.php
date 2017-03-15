@extends('layouts.master')
@section('title', 'Home')

@section('content')
    <div class="text-center">
        <h1>Welcome to Laravel ToDo Application</h1>
        <hr/>

        @include('partials.flash_notification')

        <p>For any query please contact</p>
        <h3>Jewel Mahmud</h3>
        <h4><a href="http://www.jewel-mahmud.com">http://jewel-mahmud.com</a></h4>
    </div>
@endsection
