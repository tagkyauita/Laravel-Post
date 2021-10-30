@extends('layouts.app')

@section('content')

<div class="jumbotron">
    <h1 class="display-4 text-center">Laravel Posts /Solo <i class="fas fa-mail-bulk"></i></h1>
</div>

<div class="col-md-8 col-md-2 mx-auto">
  @include('commons.error_messages')
</div>

@foreach ($posts as $post)
<div class="col-md-8 col-md-2 mx-auto">
    <div class="card-wrap">
        <div class="card mt-3">
            <div class="card-header align-items-center d-flex">
                <a class="no-text-decoration" href="{{ route('users.show', $post->user_id) }}">
                    <i class="fas fa-user-circle fa-2x mr-1"></i>
                </a>
                <a class="black-color" title="" href="{{ route('users.show', $post->user->id ) }}">
                    <strong>
                      {{ $post->user->name }}
                    </strong>
                </a>
            </div>
            <div class="card-body">
                @if (Auth::id() == $post->user_id)
                <div class="post_edit">
                    <form class="edit_button" method="get" action="{{ route('posts.edit', $post->id ) }}">
                        @csrf
                        <button class="btn btn-primary btn-sm"><i class="far fa-edit"></i>編集</button>
                    </form>
                    <form class="edit_button" method="post" action="{{ route('posts.destroy', $post->id )}}" accept-charset="UTF-8">
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">
                        <button type="submit" class="btn btn-danger btn-sm" rel="nofollow" ><i class="far fa-trash-alt"></i>削除</button>
                    </form>
                </div>
                @endif
                <h3 class="h5 title">
                    {{ $post->title }}
                </h3>
                <div class="mb-5 text">
                    {{ $post->text }}
                </div>
                <section>
                
                <div id="comment-post-1">
                    <span class="help-block">
                    <!-- @include('commons.error_messages') -->
                    </span>
                    @foreach($post->comments as $comment)
                        <div class="container mt-4">
                            <div class="border-top p-1">
                                <span>
                                    <strong>
                                        <a class="no-text-decoration black-color" href="{{ route('users.show', $comment->user->id) }}">{{ $comment->user->name }}</a>
                                    </strong>
                                </span>
                                <div class="comments mt-1">
                                    <span>
                                        {{ $comment->comment }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach    
                        <div class="m-4">
                            <form class="w-100" action="{{ route('comments.store') }}" method="post">
                                @csrf
                                @method('POST')
                                    <input name="utf8" type="hidden" value=""/>
                                    <input value="{{ Auth::id() }}" type="hidden" name="user_id" />
                                    <input value="{{ $post->id }}" type="hidden" name="post_id" />
                                    <input name="comment" value="" class="form-control comment-input border border-light mx-auto" placeholder="コメントを入力する">
                                    </input>
                                    <div class="text-right">
                                        <input type="submit" value="&#xf075;コメント送信" class="far fa-comment btn btn-default btn-sm">
                                        </input>
                                    </div>
                            </form>
                        </div>
                </div>

                </section>
            </div>
        </div>
    </div>
</div>
@endforeach


<div class="pagination justify-content-center mt-5">
    {{ $posts->links('pagination::bootstrap-4') }}
</div>

@endsection

