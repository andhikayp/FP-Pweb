@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">
						{{ $post->title}} | <small>{{ $post->category->name}}</small>
					</div>
					<div class="panel-body">
						<p>{{ $post->content}}</p>
					</div>

					
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						Tambahkan Komentar
					</div>
					<div class="panel-body">
						<form action="{{route('post.comment.store',$post)}}" method="POST" class="form-horizontal">
							{{csrf_field()}}
							<div class="form-grup">
								<textarea name="message" id="" cols="30" rows="5" class="form-control" placeholder="Add Your Comments..."></textarea>
							</div>
							<div class="form-group">
								<input type="submit" value="Komentar" class="btn btn-primary">
							</div>
						</form>
						@foreach($post->comments()->latest()->get() as $comment)
							<h3>{{$comment->user->name}} - {{$comment->created_at->diffForHumans()}}</h3>
							<img src="{{ asset('storage/'.auth()->user()->avatar)}}" alt="" style="width: 40px; height: 40px; border-radius: 50%; margin-left: 10px">
							<p>{{$comment->message}}</p>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>    
@endsection