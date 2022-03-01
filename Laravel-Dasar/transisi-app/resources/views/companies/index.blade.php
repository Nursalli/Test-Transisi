@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if (session()->has('success'))
            <div class="alert alert-success col-md-8" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if (session()->has('danger'))
            <div class="alert alert-danger col-md-8" role="alert">
                {{ session('danger') }}
            </div>
        @endif
        <div class="col-md-8">
            <a href="/companies/create" class="btn btn-success mb-3"><i class="fa-solid fa-plus"></i> Add Company</a>
            <div class="card">
                <div class="card-header">{{ __('Companies') }}</div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($data as $item)
                            <li class="list-group-item">
                                <div class="mb-2"> <b>{{ $item->nama }}</b> </div>
                                <div class="justify-content-start">
                                    <a href="/companies/{{ $item->id }}" class="btn btn-info me-2 mb-2"><i class="fa-solid fa-eye"></i> View Company</a>
                                    <a href="/export/employees/{{ $item->id }}" class="btn btn-dark me-2 mb-2"><i class="fa-solid fa-download"></i> Export Employees</a>
                                    <a href="/companies/{{ $item->id }}/edit" class="btn btn-warning me-2 mb-2"><i class="fa-solid fa-edit"></i> Edit Company</a>
                                    <a href="/companies/{{ $item->id }}" class="btn btn-danger deleteCompany mb-2" data-id="{{ $item->id }}" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="fa-solid fa-trash"></i> Delete Company</a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="mt-4 d-flex justify-content-end">
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">Delete Company</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="#" method="POST">
                @csrf
                @method('delete')
                <p>Are You Sure?</p>
        </div>
        <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <button type="submit" class="btn btn-primary">Yes</button>
            </form>
        </div>
      </div>
    </div>
  </div>
@endsection
