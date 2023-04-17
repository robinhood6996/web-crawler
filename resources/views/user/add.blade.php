@extends('layouts.admin-dash-layout')

@section('content')

    <div class="container" style="margin-top:40px">

        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">add users</h3>
                </div>
                <!-- /.card-header -->

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <!-- form start -->


                <form action="{{route('store-user')}}" method="POST" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1"> Name</label>
                            <input type="text" class="form-control" value="{{old('name')}}" id="" name="name"
                                   placeholder="Enter Title"/>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Email</label>
                            <input type="text" class="form-control" value="{{old('email')}}" id="" name="email"
                                   placeholder="Enter Title"/>
                        </div>


                        <div class="row">

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>password</label>
                                    <input type="password" name="password" value="" class="form-control"
                                           placeholder="Enter ...">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>confirm password</label>
                                    <input type="password" name="password_confirmation" value="" class="form-control"
                                           placeholder="Enter ...">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>role</label>
                                    <select class="form-control" name="role" required>
                                        <option value="0" selected  disabled></option>
                                        <option value="admin" @if(old('role') =='amin' ) selected @endif>admin</option>
                                        <option value="manager" @if(old('role') == 'manager') selected @endif>manager</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>

    </div>

@endsection
@section('script')

    <script>
    </script>
@endsection
