@extends('layouts.app')
@section('content')
    <h1 class="text-center">{{ $district->name }} | {{ $district->code }}</h1>
    <h3>Communes</h3>
    <div class="row">
        <p>
            <a href="{{route('commune.create', $district->id)}}" class="btn btn-primary pull-right">Add commune</a>
        </p>
    </div>
    <div class="row">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>
                    ID
                </th>
                <th>
                    Name
                </th>
                <th>
                    Code
                </th>
                <th>
                    Created
                </th>
            </tr>
            </thead>
            <tbody>
            @forelse($communes as $commune)
                <tr>
                    <td>
                        {{ $commune->id }}
                    </td>
                    <td>{{$commune->name}}</td>
                    <td>{{$commune->code}}</td>
                    <td>{{$commune->created_at}}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4"><h3 class="text-center">NO DATA</h3></td>
                </tr>
            @endforelse
            </tbody>
        </table>
        {{ $communes->appends(request()->query())->links() }}
    </div>

@endsection
