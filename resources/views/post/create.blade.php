@extends('layouts.app')
@section('content')

	<style>
		label.tex {
			font-size: 17px;
			font-weight: bold;
			padding: 15px 10px 15px 10px;
		}
		.inp {
			padding: 20px;
			font-size: 13px;
		}
		#form-box {
			padding: 10px 40px 40px 40px;
			border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
		}
		#page-title-section {
			padding: 30px 30px 30px 40px;
			border-top-left-radius: 10px;
			border-top-right-radius: 10px;
			background-image: linear-gradient(-90deg, rgb(0,41,119), rgb(73,22,71));
			color: white;
			font-family: Niramit, sans-serif;
			font-size: 30px;
			font-weight: bold;
		}
	</style>
	
	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-md-2" id="page-title-section">
				Tulis Pos Baru
			</div>
			<div class="col-md-8 offset-md-2 shadow-lg" id="form-box">			
				<form action="{{ route('post.store')}}" method="post" class="" enctype="multipart/form-data">
					{{ csrf_field()}}
					<div class="form-group has-feedback{{ $errors->has('title') ? 'has-error' : ''}}">
						<label for="" class="tex">Judul</label>
						<input type="text" class="form-control inp" name="title" placeholder="Judul Pos" value="{{ old('title')}}">
						@if($errors->has('title'))
							<span class="help-block"><p>{{ $errors->first('title')}}</p></span>
						@endif
					</div>
					<div class="form-group">
						<label for="" class="tex">Kategori</label>
						<select name="category_id" id="" class="form-control">
							<option value="0">Pilih Kategori...</option>
							@foreach ($categories as $category)
								<option value="{{ $category->id}}">{{ $category->name}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group has-feedback{{ $errors->has('content') ? 'has-error' : ''}}">
						<label for="" class="tex">Konten</label>
						<textarea class="form-control inp" name="content" id='article-ckeditor' cols="" rows="5" placeholder="Konten Pos" value="{{ old('content')}}"></textarea>
						@if($errors->has('content'))
							<span class="help-block"><p>{{ $errors->first('content')}}</p></span>
						@endif
					</div>
					<div class="form-group">
					<label for="avatar" class="tex">Gambar/Foto</label>
						<div class="custom-file">
							<input type="file" class="custom-file-input form-control{{ $errors->has('avatar') ? ' is-invalid' : '' }}" id="avatar" name="avatar">
							@if ($errors->has('avatar'))
								<span class="invalid-feedback" role="alert"><strong>{{ $errors->first('avatar') }}</strong></span>
							@endif
							<label class="custom-file-label" for="customFile">Pilih File</label>
						</div> 
					</div>
					<div class="form-group">
						<input type="submit" value="Simpan" class="btn btn-lg btn-primary">
						<a href="{{ route('home.index') }}" class="btn btn-lg btn-light">Batal</a>
					</div>
				</form>
				
			</div>
		</div>
	</div>    
@endsection

