@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              
                
                <div class="card-header">Data pribadi {{ $user->name }}</div>

                <div class="card-body">
                    <p>Hallo guys, nama saya adalah <strong>{{ $user->name }}</strong>, alamat email saya adalah <strong>{{$user->email }}</strong>, sedangkan alamat rumah saya adalah <strong>{{ $user->alamat }}</strong>. Salam kenal ya </p>
                </div>
               
            </div>
        </div>
    </div>
</div>
@endsection
