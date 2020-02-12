@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>
                <?php   
                $utilsateurs = Auth::user()->get(); ?>
                      <h1>Liste des utilisateurs</h1>

                      <ul>
                        @foreach($utilsateurs as $utilisateur)
                          <li>{{$utilisateur->name}}  |  {{ $utilisateur->lastname }}  {{ $utilisateur->firstname }} | {{ $utilisateur->email }}</li>
                     
                        @endforeach
                      </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection