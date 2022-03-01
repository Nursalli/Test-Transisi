@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Employee') }}</div>
                <div class="card-body">
                    <form action="/employees" method="POST">
                        @csrf
                        <div class="mb-3">
                          <label for="nama" class="form-label">Nama</label>
                          <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                          value="{{ old('nama') }}">
                          @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                            value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
							<label for="company_id" class="form-label">Company</label>
							<select class="form-control select2 select2-primary"
								data-dropdown-css-class="select2-primary" name="company_id" id="company_id" style="width: 100%;">
								@foreach ($data as $item)
                                    @if (old('company_id') == $item->id)
                                    <option value="{{ $item->id }}" selected>{{ $item->nama }}</option>
                                    @else
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endif
                                @endforeach
							</select>
						</div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
