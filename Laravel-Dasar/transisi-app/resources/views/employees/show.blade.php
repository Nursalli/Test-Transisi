@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('View Employee') }}</div>
                <div class="card-body">
                    <div>
                        <p>Nama: <b>{{ $data->nama }}</b></p>
                        <p>Email: <b>{{ $data->email }}</b></p>
                        <p>Company: <b>{{ $data->company->nama }}</b></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
