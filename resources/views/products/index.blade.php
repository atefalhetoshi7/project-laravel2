@extends('products.layout')

@section('content')
<br>
<div class="row">
    <div class="col align-self-start">
        <a class="btn btn-primary" href="{{ route('products.create') }}">Create New Product</a>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success" role="alert">
    {{ $message }}
</div>
@endif
<br>
<div class="table-responsive">
    <table class="table table-striped table-hover table-borderless table-primary align-middle">
        <thead class="table-light">
            <caption>Table Name</caption>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Details</th>
                <th>Image</th>
                <th width="300px">Actions</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($products as $item)
            <tr class="table-primary">
                <td>{{ $item->id }}</td>
                <td><img src="/images/{{ $item->image }}"></td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->details }}</td>
                <td>
                    <form action="{{route('products.destroy', $item->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <a class="btn btn-primary" href="{{route('products.edit', $item->id)}}">Edit</a>
                    <a class="btn btn-info" href="{{route('products.show', $item->id)}}">Show</a>
                </td>
            </tr>
            @endforeach
            
        </tbody>
        <tfoot>
        </tfoot>
    </table>
    {!! $products->links() !!}
</div>

@endsection