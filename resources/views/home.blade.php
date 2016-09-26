@extends('layouts.app')
@section('content')
  <div class="jumbotron text-center">
    <h1>Search The Mascot Database</h1>
    <form class="form-inline" action="{{ route('results') }}">
      <div class="form-group">
        <input type="text" class="form-control" id="keyword" placeholder="Keyword" name="keyword" value="{{$filters['keyword'] or null}}">
      </div>
      <button type="submit" class="btn btn-primary">Search</button>
    </form>
    <p>Suggested searches: <a href="{{ route('results', ['keyword' => 'cereal']) }}">Cereal</a>, <a href="{{ route('results', ['keyword' => 'basketball']) }}">Basketball</a></p>
  </div>
@endsection
