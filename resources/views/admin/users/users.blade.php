@extends('admin.layouts.master')
@section('content')
    <div class="body flex-grow-1">
        <div class="container-lg px-4">
            <div class="card mb-4">
                <div class="card-header"><strong>Users</strong><span class="small ms-1">List</span></div>
                <div class="card-body">
                    <div class="example">
                        <div class="tab-content rounded-bottom">
                            <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1007">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Sr. No</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Mobile</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $index => $user)
                                            <tr>
                                                <th scope="row">{{ $index + 1 }}</th>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->mobile }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->status }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
