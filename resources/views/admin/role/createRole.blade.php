@extends('layouts.admin_layout')

@section('content')
    {!! Form::open(['route' => 'createRole', 'method' => 'post','role'=>'form']) !!}
    <div class="card-body">
        <div class="form-group">
        <label for="title">Title Role</label>
        {!! Form::text('name', '', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            <label for="title">Description Role</label>
            {!! Form::text('description', '', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            <label for="users">Assign role to user</label>
         {!! Form::select('users', $users , null , ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
    {!! Form::submit('Create role', ['class' => 'btn btn-success']) !!}
        </div>
    </div>
    {!! Form::close() !!}
    @endsection