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
                <a class="btn btn-secondary float-sm-right" href="{{ route('employees.index') }}"> employees</a>
           
            
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
                <form action="{{ route('employees.update', $employee->id) }}" method="POST"  enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                     <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                 <label for="first_name">First Name</label>
                                <input type="text" name="first_name" id="first_name" class="form-control" value="{{ $employee->first_name }}" required>
            
                                 <span class="text-danger">{{ $errors->first('first_name') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" name="last_name" id="last_name" class="form-control" value="{{ $employee->last_name }}" required>
                                 <span class="text-danger">{{ $errors->first('last_name') }}</span>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="company_id">Company</label>
                                <select name="company_id" id="company_id" class="form-control" required>
                                    @foreach($companies as $company)
                                        <option value="{{ $company->id }}" {{ $employee->company_id == $company->id ? 'selected' : '' }} >{{ $company->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ $employee->email }}" placeholder="E-mail">
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            </div>
                        </div>
                        
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                 <label for="phone">Phone</label>
                                <input type="text" name="phone" id="phone" class="form-control" value="{{ $employee->phone }}">          
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
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
