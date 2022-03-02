@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h3 class="card-title">Regisztrált felhasználók</h3>
                    <div class="card-tools">
                        <a href="" class="btn btn-block btn-primary">
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
                                <th>Telefon</th>
                                <th>Cím</th>
                                <th>Jogosultságok</th>
                                <th>Műveletek</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}<br />{{$user->mobile}}</td>
                            <td>{{$user->zipcode}}&nbsp;{{$user->city}}<br />{{$user->address}}</td>
                            <td>
                                <button type="button" class="btn btn-block btn-outline-primary btn-xs">Szerkeszt</button>
                                <button type="button" class="btn btn-block btn-outline-danger btn-xs">Töröl</button>
                                @if($user->active == 1)
                                    <button type="button" class="btn btn-block btn-outline-success btn-xs">Aktív</button>
                                @else
                                    <button type="button" class="btn btn-block btn-outline-dark btn-xs">Inaktív</button>
                                @endif

                            </td>
                            <td>
                                @if($user->is_user())
                                    Jogosultságok
                                @endif
                            </td>
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

@push('page_scripts')
<script>
$(document).ready(function () {
   $('#users-table').DataTable({
    language: {
            url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/hu.json'
        }
   });
});
</script>
@endpush
