@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Listes utilisateurs</div>
                     <h1>Listes utilisateurs</h1>
               <?php $user = Auth::user()->orderBy('name')->get();
                     $selected = Auth::user()->id;?>
               <div class="dropdown-menu">
                     <div class="dropdown-divider"></div>
                     <button id="{{ Auth::user()->id }}" class="dropdown-item">{{ Auth::user ()->name }}</button>
                     @foreach($user as $user)
                     <button id="{{$user->id}}" class="dropdown-item" onclick="essai()">{{ $user->name }}</button>
                     @endforeach
               
                </div>
            </div>
        </div>
    </div>
</div>
@endsection