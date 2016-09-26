@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-body text-center">
                    <form class="form-inline">
                        <div class="form-group">
                            <input type="text" class="form-control" id="keyword" placeholder="Keyword" name="keyword" value="{{$filters['keyword'] or null}}">
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="popularity">
                                <option value="">Select popularity...</option>
                                @foreach($availablePopularities as $popularity)
                                <option value="{{$popularity}}" {{ isset($filters['popularity']) &&  $filters['popularity'] == $popularity ? 'selected="selected"' : '' }}>{{$popularity}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @if($mascots->isEmpty())
        <div class="col-sm-12">
            <div class="well no-data">
                <h2>No results found :(</h2>
            </div>
        </div>
        @else
        @foreach($mascots as $mascot)
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img src="{{$mascot->image_url}}" alt="{{$mascot->name}}" class="img-rounded">
                <div class="caption">
                    <h2>{{$mascot->name}} <span class="label label-primary">{{$mascot->popularity}}</span></h2>
                    <p>
                        {{$mascot->description}}
                        <span class="label label-default">{{$mascot->domain}}</span>
                    </p>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>
@endsection
