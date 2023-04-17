@extends('layouts.admin-dash-layout')

@section('content')

    <div class="container" style="margin-top:40px;max-width: 100%;">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="card-body table-responsive">
            <div>
                <h2 class="text-center">Users List</h2>
                <a type="button" href="{{route('add-user')}}" class="btn btn-info float-right"> add user</a>
            </div>

            <table  class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                </tr>
                </thead>
                <tbody id="pending">
                @forelse($users as $user)

                    <tr>
                        <td>{{ @$user->id }}</td>
                        <td>{{ @$user->name }}</td>
                        <td>{{ @$user->email }}</td>
                        <td>{{ @$user->role == 1?'Manager':'Admin' }}</td>

                    </tr>
                @empty
                    <tr></tr>
                @endforelse

                </tbody>

            </table>
            {{ @$users->links('pagination::bootstrap-4') }}
        </div>
        <!-- /.card-body -->
    </div>

@endsection



