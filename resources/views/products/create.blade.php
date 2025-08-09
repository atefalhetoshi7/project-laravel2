@extends ('products.layout')

@section ('content')
<br>
<a href="{{route('products.index')}}" class="btn btn-primary">All Products</a>
<br>

@if ($errors->any())
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="container p-5">
    <form action="{{route('products.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <br>
            <label for="exampleFormControlInput1" class="form-label">Name</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Details</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
    </form>
</div>
@endsection