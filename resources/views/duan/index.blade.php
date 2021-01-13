@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <a class="btn btn-sm btn-warning" href="{{ route('data.create') }}">Tambah Data</a>
                            @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
            
             
            <div class="card mb-3">

                
                <div class="card-header">{{ __('Dashboard') }}</div>


                <div class="card-body">
                     <?php $pos=1 ?>
                    @foreach ($datas as $user)
                    <h3>{{ $pos++ }}. This is user {{ $user->name }} </h3>
                    <a class="btn btn-sm btn-danger" href="{{ route('data.destroy', $user->id) }}" onclick="event.preventDefault(); document.getElementById('deletebtn').submit();">Hapus</a>
                    <form id="deletebtn" action="{{ route('data.destroy', $user->id) }}" method="POST" class="d-none">
                        @csrf
                        @method('DELETE')
                    </form>
                    <a class="btn btn-sm btn-primary" href="{{ route('data.show', $user->id) }}">View</a> 
                    <a class="btn btn-sm btn-warning" href="{{ route('data.edit', $user->id) }}">Edit</a>
                    <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

