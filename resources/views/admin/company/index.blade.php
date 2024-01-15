@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Companies</h1>
          </div>
          <div class="col-sm-6">
                <a class="btn btn-primary float-sm-right" href="{{ route('companies.create') }}"> Create Company</a>
           
            
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
            <th>Logo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Website</th>
            <th >Action</th>
        </tr>
        @foreach ($rows as $i => $item)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>
                @if ($item->logo && Storage::disk('public')->exists($item->logo))                                    
                <img src="{{ asset('storage/' . $item->logo) }}" alt="{{ $item->name }}" class="img-thumbnail m-1" style="width: 75px;">
                @endif
            </td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->website }}</td>
            <td>
                <form action="{{ route('companies.destroy',$item->id) }}" method="POST">
   
                    
    
                    <a class="btn btn-primary" href="{{ route('companies.edit',$item->id) }}">Edit</a>
   
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
