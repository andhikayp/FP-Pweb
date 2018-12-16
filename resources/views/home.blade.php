@extends('layouts.app')

@section('content')
<div class="container shadow-lg" id="home-container">
    <!-- <div class="row justify-content-center"> -->
        <div class="panel panel-default rounded p-5" style="text-align:center;">
        {{-- <div class="col-md-8"> --}}
        
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        
        <style>
            #post-link {
                font-size: 18px;
                font-weight: bold;
            }
            #home-container {
                padding-top: 0px;
                border-bottom-left-radius: 10px;
                border-bottom-right-radius: 10px;
            }
            #cover {
                padding-top: 0px;
                margin-bottom: 25px;
                
            }
            #welcome-title {
                font-family: "Fredoka One"
            }
        </style>

        <div id="cover">
            <img src="{{ asset('storage/'.auth()->user()->avatar)}}" class="mx-auto d-block rounded-circle" style="max-width: 20%"><br><br>
            <h2 id="welcome-title" class="">Halo,   {{ Auth::user()->name }}.</h2><br><h4>Selamat Datang di ManusiaOnline!</h4><br><br>
        </div>

        @if(count($posts)>0)
            <div class="justify-content-center">
                <div class="card">
                    <div class="card-header font-weight-bold text-center" style="background: #002977; color:white;border: none;"><h3>Pos Terbaru Anda</h3></div>

                    <div class="card-body">
                        <table class="table">
                            @foreach($posts as $post)
                            <tr style="text-align: left;">
                                <td>
                                    <a id="post-link" href="{{ route('post.show', $post)}}">
                                        {{$post->title}}
                                    </a>
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a style="margin-right:8px;" href="{{ route('post.edit', $post)}}" style="display:inline-block;">
                                            <button type="submit" class="btn btn-outline-primary">Sunting</button> 
                                        </a>
                                        <form class="" action="{{ route('post.destroy', $post)}}" method="post">
                                            {{ csrf_field()}}
                                            {{ method_field('DELETE')}}
                                            <button type="submit" class="btn btn-outline-danger">Hapus</button> 
                                        </form>
                                    </div>
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
