@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h3 class="card-title">Regisztrált felhasználók</h3>
                    <div class="card-tools">
                        <a href="" class="btn btn-sm btn-primary">
                            <i class="fas fa-plus"></i>&nbsp;Új felhasználó
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="users-table" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Név</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
