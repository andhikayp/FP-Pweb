@extends('layouts.app')

@section('content')

	<style>
		.content-section {
			padding: 30px;
		}
		.post-title {
			font-size: 28px;
			font-family: 'Fredoka One', sans-serif;
		}
		.card-header-padding {
			padding: 20px;
			line-height: 20px;
		}
		.search-bar {
			font-size: 14px;
			border-radius: 12px;
		}
	</style>
	<div class="">
	    <div class="row justify-content-center">
	        <div class="col-md-8 shadow-lg content-section">
	        	<form class="form-inline float-right" action="{{route('post.search')}}" method="get">
	        		<span class="">
						<input type="search" name="search" class="form-control mr-3 search-bar" placeholder="Cari Pos">
						<button type="submit" class="btn btn-primary search-btn">Cari</button>
					</span>
				</form><br><br><br>
	            @foreach ($posts as $post)
	            	<div class="card">
		                <div class="card-header card-header-padding">
							@if ($post->avatar)
								<div class="col-md-4">
									{{-- <img src="http://localhost/crud/public/storage/public/avatar/{{$post->avatar}}" alt="" style="width: 100%"> --}}
									<img src="{{ asset('storage/public/avatar/'.$post->avatar)}}" class="img-rounded" alt="">
								</div>
							@endif
							
							<a class="post-title" href="{{ route('post.show', $post)}}">{{ $post->title}} </a> <br>
							<small>
								{{ $post->created_at->diffForHumans()}} {{ date('F d, Y',strtotime($post->created_at)) }} at {{ date('g:ia',strtotime($post->created_at)) }} by <a href="{{ route('home.id', $post->user_id)}}"> {{ $post->user->username}}</a>
							</small>
							<br><br>
		                		@if($post->comments()->get()->count()==1){{$post->comments()->get()->count()}} Komentar
		                		@endif
		                		@if($post->comments()->get()->count() > 1){{$post->comments()->get()->count()}} Komentar
		                		@endif
		                		@if($post->comments()->get()->count() ==null) Don't have a comment
		                		@endif
							{{-- @if( Auth::user()->username == $post->user->username)
								<div class="">
									<a href="{{ route('post.edit', $post)}}">
										<button type="submit" class="btn btn-xs btn-outline-success btn-block">Edit</button> 
									</a><br>
									<form class="" action="{{ route('post.destroy', $post)}}" method="post">
										{{ csrf_field()}}
										{{ method_field('DELETE')}}
										<button type="submit" class="btn btn-xs btn-outline-danger btn-block">Delete</button> 
									</form>
								</div>
							@endif --}}
		                </div>
		                <div class="card-body">
		                    <p>
		                    	{{ str_limit($post->content, 300, ' ....')}}
							</p>
							<p>
								@if( Auth::user()->username == $post->user->username)
								<div class="form-inline">
									<a href="{{ route('post.edit', $post)}}" style="margin-right: 6px;">
										<button type="submit" class="btn btn-lg btn-outline-success">Edit</button> 
									</a><br>
									<form class="" action="{{ route('post.destroy', $post)}}" method="post">
										{{ csrf_field()}}
										{{ method_field('DELETE')}}
										<button type="submit" class="btn btn-lg btn-outline-danger">Delete</button> 
									</form>
								</div>
								@endif
							</p>
		                </div>
		            </div>
		            
				@endforeach
				{!! $posts->render()!!}
	        </div>
	    </div>
	</div>
@endsection 