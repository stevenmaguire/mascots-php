@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-8 col-md-offset-2">
            <h1>Submit Mascot to Database</h1>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('submit.process') }}" method="post">
              {{ csrf_field() }}
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{old('name')}}">
              </div>
              <div class="form-group">
                <label for="domain">Domain</label>
                <input type="text" class="form-control" id="domain" name="domain" placeholder="Domain" value="{{old('domain')}}">
              </div>
              <div class="form-group">
                <label for="image_url">Public Image URL</label>
                <input type="text" class="form-control" id="image_url" name="image_url" placeholder="Publicly accessible image url" value="{{old('image_url')}}">
              </div>
              <div class="form-group">
                <label for="description">Physical Description</label>
                <textarea class="form-control" id="description" name="description" placeholder="Physical description; species, height, breed, gender, colors, etc.">{{old('description')}}</textarea>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
