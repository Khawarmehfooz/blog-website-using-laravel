@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="/posts/create" class="btn btn-outline-primary">Create a New Post</a>
                    <hr>
                    <h3 class="pt-2">Your Recent Posts</h3>
                    @if(count($posts)>0)
                    <table class="table table-striped">
                        <tr>
                            <th>Title</th>
                            <th colspan="2">Action</th>
                            {{-- <th></th> --}}
                        </tr>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{$post->title}}</td>
                                <td><a href="/posts/{{$post->id}}/edit" class="btn btn-outline-dark">Edit Post</a></td>
                                <td>
                                    {!!Form::open(['action'=>['App\Http\Controllers\PostController@destroy',$post->id],'method'=>'POST','class'=>'float-end'])!!}
                                    {{Form::hidden('_method','DELETE')}}
                                    {{Form::submit('Delete',['class'=>'btn btn-outline-danger'])}}

                                    {!!Form::close()!!}

                                </td>
                            </tr>
                        @endforeach

                    </table>
                    @else
                        <p>You don't have any posts</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
