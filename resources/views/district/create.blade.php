@extends('layouts.app')
@section('content')
    <h1 class="text-center">Add District</h1>

    @include('_components.errors')

    <form action="{{route('district.store', $cityId)}}" method="post">
        @csrf
        <div class="form-group">
            <label for="email">Name:</label>
            <input type="text" class="form-control" name="name" value="{{old('name')}}">
        </div>
        <div class="form-group">
            <label for="pwd">Code:</label>
            <input type="text" class="form-control" name="code" value="{{old('code')}}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
