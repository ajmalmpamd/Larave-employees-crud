@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Company</h1>
          </div>
          <div class="col-sm-6">
                <a class="btn btn-secondary float-sm-right" href="{{ route('companies.index') }}"> Companies</a>
           
            
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
     @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
      <!-- Default box -->
      <div class="row">
         <div class="col-md-6 mx-auto">
            <div class="card">
        
              <div class="card-body">
                <form action="{{ route('companies.update', $company->id) }}" method="POST"  enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                     <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{ $company->name }}" required>
                                 <span class="text-danger">{{ $errors->first('name') }}</span>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="E-mail"  value="{{ $company->email }}" >
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="logo">Logo</label>
                                @if ($company->logo)
                                    
                                        <img src="{{ asset('storage/' . $company->logo) }}" alt="{{ $company->name }}" class="img-thumbnail m-3" style="width: 100px;">
                                @endif
                                <input type="file" name="logo" id="logo" class="form-control-file">
                                <span class="text-danger">{{ $errors->first('logo') }}</span>
                            </div>
                        </div>


                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="website">Website</label>
                                <input type="text" name="website" id="website" class="form-control"  value="{{ $company->website }}" >
                                <span class="text-danger">{{ $errors->first('website') }}</span>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                   
                </form>

  
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                
              </div>
              <!-- /.card-footer-->
            </div>
      <!-- /.card -->
          </div>
      </div>
    </section>
    <!-- /.content -->
@endsection
