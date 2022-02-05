@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="text-black-50">Ön bejelentkezett!</h1>
        @if (Auth::user()->is_superadmin())
        <p>SuperAdmin</p>
        @else
        <p>Felhasználó</p>
        @endif
    </div>
@endsection
