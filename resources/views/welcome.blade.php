@extends('layouts.main')
@section('content')

<div class="container">
<h1>Welcome Page</h1>

@if (session('successMsg'))

<div class="alert alert-success" role="alert">
    {{ session('successMsg')}}
</div>

@endif

<table class="table">
    <thead class="black white-text">
      <tr>
        <th scope="col">No.</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach($Students as $Student)
      <tr>
        <td scope="row">{{ $Student->id }}</td>
        <td>{{ $Student->first_name }}</td>
        <td>{{ $Student->last_name }}</td>
        <td>{{ $Student->email }}</td>
        <td>{{ $Student->phone }}</td>
        <td>
            <a class="btn btn-raised btn-primary btn-sm" href=" {{ route('edit', $Student->id)}}"> <i class="fa fa-pencil-square-o" aria-hidden="true"> </i> </a>
           ||
           <form method="POST" id="delete-form-{{ $Students }}"></form>
           <a class="btn btn-raised btn-danger btn-sm" href=" "> <i class="fa fa-trash" aria-hidden="true"></i> </a>
          </td>
      </tr>
      @endforeach
    </tbody>
  </table>

{{ $Students -> links() }}
</div>

@endsection

