@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('View Company') }}</div>
                <div class="card-body">
                    <div style="max-height: 350px; overflow:hidden" class="text-center">
                        <img src="{{ asset('storage/company/'. $data->logo) }}" alt="Logo">
                    </div>
                    <div class="mt-4">
                        <p>Nama: <b>{{ $data->nama }}</b></p>
                        <p>Email: <b>{{ $data->email }}</b></p>
                        <p>website: <b>{{ $data->website }}</b></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
