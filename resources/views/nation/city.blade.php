@extends('layouts.app')
@section('content')
    <h1 class="text-center">{{ $nation->name }} | {{ $nation->code }}</h1>
    <h3>Cities</h3>
    <div class="row">
        <p>
            <a href="{{route('city.create', $nation->id)}}" class="btn btn-primary pull-right">Add city</a>
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
    {{--            <th>Detail</th>--}}
            </tr>
            </thead>
            <tbody>
            @forelse($cities as $city)
                <tr>
                    <td>
                        {{ $city->id }}
                    </td>
                    <td>{{$city->name}}</td>
                    <td>{{$city->code}}</td>
                    <td>{{$city->created_at}}</td>
    {{--                <td><a href="{{ route('nations.detail', $nation->id) }}" class="btn btn-info">Detail</a></td>--}}
                </tr>
            @empty
                <tr>
                    <td colspan="4"><h3 class="text-center">NO DATA</h3></td>
                </tr>
            @endforelse
            </tbody>
        </table>
        {{ $cities->appends(request()->query())->links() }}
    </div>

@endsection
