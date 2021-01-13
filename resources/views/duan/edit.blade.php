@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

                    
                    <form method="post" action="{{ route('data.update', $user->id)}}">
                        @csrf
                        @method('PUT')
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('email') ?? $user->email }}" name="email">
      {{-- Saya menggunakan text untuk memastikan bahwa validasi di-backend bekerja --}}
    {{-- <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('email') ?? $user->email }}" name="email"> --}}
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Nama</label>
    <input type="text" class="form-control" id="exampleInputPassword1" value="{{ old('name') ?? $user->name }}" name="name">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Example textarea</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat">{{ old('alamat') ?? $user->alamat}}</textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
