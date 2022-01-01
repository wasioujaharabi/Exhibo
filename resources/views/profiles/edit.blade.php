@extends('layouts.app')

@section('content')
    <h1>Edit your profile</h1>
    {!! Form::open(['action' => ['ProfileController@update',$profile->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-row">
        <div class="col-md-6 mb-3">
            {{Form::label('first_name', 'First Name')}}
            {{Form::text('first_name', $profile->first_name, ['class' => 'form-control', 'placeholder' => 'First name'])}}
        </div>
        <div class="col-md-6 mb-3">
            {{Form::label('last_name', 'Last Name')}}
            {{Form::text('last_name', $profile->last_name, [ 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
        </div>
    </div>
        <div class="form-group">
            {{Form::label('email', 'Email')}}
            {{Form::text('email', $profile->email, [ 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
        </div>
        <div class="form-group">
            {{Form::label('based_in', 'Based in')}}
            {{Form::text('based_in', $profile->based_in, [ 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
        </div>
        <div class="form-group">
            {{Form::label('profession', 'Works as')}}
            {{Form::text('profession', $profile->profession, [ 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
        </div>
        <div class="form-group">
            {{Form::label('institute', 'Studied at')}}
            {{Form::text('institute', $profile->institute, [ 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
        </div>
        <div class="form-group">
            {{Form::label('insta', 'Instagram')}}
            {{Form::text('insta', $profile->insta, [ 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
        </div>
        
        <div class="form-group">
            Change Your Profile Picture: 
            {{Form::file('photo')}}
        </div>

        {{Form::hidden('_method','PUT')}}
        
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection

