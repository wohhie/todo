@extends('layouts.master')
@section('title', 'Register')

@section('content')
    <h1>Register New User</h1>
    <hr/>

    {!! Form::open(['url' => '/user', 'class' => 'form-horizontal', 'role' => 'form']) !!}
        <!-- Name Field -->
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        {!! Form::label('name', 'Name', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
            <span class="help-block text-danger">
                {{ $errors -> first('name') }}
            </span>
        </div>
        </div>

        <!-- Email Field -->
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        {!! Form::label('email', 'Email Address', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::text('email', null, ['class' => 'form-control']) !!}
            <span class="help-block text-danger">
                {{ $errors -> first('email') }}
            </span>
        </div>
        </div>

        <!-- Password Field -->
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        {!! Form::label('password', 'Password', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::password('password', ['class' => 'form-control']) !!}
            <span class="help-block text-danger">
                {{ $errors -> first('password') }}
            </span>
        </div>
        </div>

        <!-- Password Confirmation Field -->
        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
        {!! Form::label('password_confirmation', 'Conform Password', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
            <span class="help-block text-danger">
                {{ $errors -> first('password_confirmation') }}
            </span>
        </div>
        </div>

        <!-- submit button -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-5">
                {!! Form::submit('Register', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
    {!! Form::close() !!}
@endsection
