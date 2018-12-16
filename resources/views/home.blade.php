@extends('layouts.app')

@section('content')
<div class="container">
    <!-- <div class="row justify-content-center"> -->
        <div class="panel panel-default rounded p-5" style="text-align:center;">
        {{-- <div class="col-md-8"> --}}
        
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        
        <style>
            #cover {
                
                padding-top: 35px;
                margin-bottom: 25px;

            }
        </style>

        <div id="cover">
            <img src="{{ asset('storage/'.auth()->user()->avatar)}}" class="mx-auto d-block rounded-circle" style="max-width: 20%"><br><br>
            <h2 class="font-weight-bold">Halo,   {{ Auth::user()->name }}.</h2><br><h4>Selamat Datang di ManusiaOnline!</h4><br><br>
        </div>
        
        @if(count($posts)>0)
        <div class="justify-content-center">
            <div class="card">
                <div class="card-header font-weight-bold text-center"><h3>Pos Terbaru Anda</h3></div>

                <div class="card-body">
                    <table class="table table-stripped">
                        @foreach($posts as $post)
                        <tr style="text-align: left;">
                            <td><a href="{{ route('post.show', $post)}}">{{$post->title}}</a></td>
                            <!--<td><a href="{{ route('post.show', $post)}}" class="btn btn-primary">Baca</a></td>-->
                            <td class="pull-right"><br><br>
                                <a href="{{ route('post.edit', $post)}}">
                                    <button type="submit" class="btn btn-xs btn-outline-success btn-block">Edit</button> 
                                </a><br>
                                <form class="" action="{{ route('post.destroy', $post)}}" method="post">
                                    {{ csrf_field()}}
                                    {{ method_field('DELETE')}}
                                    <button type="submit" class="btn btn-xs btn-outline-danger btn-block">Delete</button> 
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            
            </div>
        </div>
        @else
        <div class="col-md-5">
            <h4 class="font-weight-bold"><br>
            Anda tidak memiliki pos. <a href="{{ route('post.create') }}">Buat Sekarang!</a></h4>
        </div>
        @endif
        </div>
        </div>
    <!--</div>-->
</div>
@endsection
