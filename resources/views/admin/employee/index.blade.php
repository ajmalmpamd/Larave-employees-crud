@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Employees </h1>
          </div>
          <div class="col-sm-6">
                <a class="btn btn-primary float-sm-right" href="{{ route('employees.create') }}"> Add Employee </a>
           
            
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
     @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
      <!-- Default box -->
      <div class="card">
        
        <div class="card-body">
          <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Company</th>
            <th>Action</th>
        </tr>
        @foreach ($rows as $i => $item)
        <tr>
            <td>{{ $i+1 }}</td>
            <td>{{ $item->first_name }} {{ $item->last_name }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->phone }}</td>
            <td>{{ $item->company->name }}</td>
            <td>
                <form action="{{ route('employees.destroy',$item->id) }}" method="POST">
   
                    
    
                    <a class="btn btn-primary" href="{{ route('employees.edit',$item->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    </div>
        <!-- /.card-body -->
        <div class="card-footer">
          {!! $rows->links('pagination::bootstrap-4') !!}
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection
