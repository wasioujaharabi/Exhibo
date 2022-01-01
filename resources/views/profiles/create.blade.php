@extends('layouts.app')

@section('content')
    <h1>Set up your profile</h1>
    {!! Form::open(['action' => 'ProfileController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-row">
        <div class="col-md-6 mb-3">
            {{Form::label('first_name', 'First Name')}}
            {{Form::text('first_name', '', ['class' => 'form-control', 'placeholder' => 'First name'])}}
        </div>
        <div class="col-md-6 mb-3">
            {{Form::label('last_name', 'Last Name')}}
            {{Form::text('last_name', '', [ 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
        </div>
    </div>
        <div class="form-group">
            {{Form::label('email', 'Email')}}
            {{Form::text('email', '', [ 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
        </div>
        <div class="form-group">
            {{Form::label('based_in', 'Based in')}}
            {{Form::text('based_in', '', [ 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
        </div>
        <div class="form-group">
            {{Form::label('profession', 'Works as')}}
            {{Form::text('profession', '', [ 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
        </div>
        <div class="form-group">
            {{Form::label('institute', 'Studied at')}}
            {{Form::text('institute', '', [ 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
        </div>
        <div class="form-group">
            {{Form::label('insta', 'Instagram')}}
            {{Form::text('insta', '', [ 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
        </div>
        
        <div class="form-group">
            Upload Your Profile Picture: 
            {{Form::file('photo')}}
        </div>


        
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection
