@extends('skill.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 6 CRUD Example from scratch - ItSolutionStuff.com</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('skill.create') }}"> Create New Skill</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>descriptions</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($skill as $skill)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $skill->name }}</td>
            <td>{{ $skill->description }}</td>
            <td>
                <form action="{{ route('skill.destroy',$skill->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('skill.show',$skill->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('skill.edit',$skill->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
      
@endsection