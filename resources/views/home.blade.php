@extends('layouts.app')

@section('content')
<br>
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
<h3> {{ __('Bienvenido Usuario(a): ') }} {{ Auth::user()->name }}</h3>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
