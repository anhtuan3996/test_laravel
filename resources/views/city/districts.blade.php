@extends('layouts.app')
@section('content')
    <h1 class="text-center">{{ $city->name }} | {{ $city->code }}</h1>
    <h3>Districts</h3>
    <div class="row">
        <p>
            <a href="{{route('district.create', $city->id)}}" class="btn btn-primary pull-right">Add district</a>
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
                <th></th>
                {{--            <th>Detail</th>--}}
            </tr>
            </thead>
            <tbody>
            @forelse($districts as $district)
                <tr>
                    <td>
                        {{ $district->id }}
                    </td>
                    <td>{{$district->name}}</td>
                    <td>{{$district->code}}</td>
                    <td>{{$district->created_at}}</td>
                    <td><a href="{{ route('district.communes', ['district' => $district->id]) }}" class="btn btn-info">Detail</a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="12"><h3 class="text-center">NO DATA</h3></td>
                </tr>
            @endforelse
            </tbody>
        </table>
        {{ $districts->appends(request()->query())->links() }}
    </div>

@endsection
