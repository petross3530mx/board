
@extends('layouts.app')

@section('content')

        <div class="container">
                <h1>Bulletin Board</h1>
                <div class="row">
                    @forelse($data as $el)
                        <div class="col-md-12">
                            <div class="card flex-md-row mb-4 box-shadow h-md-250">
                                @isset($el->image)
                                <img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" alt="Thumbnail [200x250]" style="width: 200px; height: 250px;" src="{{asset('/storage/'.$el->image)}}" data-holder-rendered="true">
                                @endisset
                                <div class="card-body d-flex flex-column align-items-start">
                                  <strong class="d-inline-block mb-2 text-primary">{{ $users[$el->author] }}</strong>
                                  <h3 class="mb-0">
                                    <a class="text-dark" href="#">{{ $el->title }}</a>
                                  </h3>
                                  <div class="mb-1 text-muted">{{$el->created_at->format('d M')}}</div>
                                  <p class="card-text mb-auto">{{ $el->content}}</p>
                                </div>
                              </div>
                        </div>
                    @empty
                    <p>There is no bulletin</p>
                    @endforelse
                    <div class="build-in-pagination">
                        {{$data->links()}}
                    </div>
                </div>
            </div> 
@endsection