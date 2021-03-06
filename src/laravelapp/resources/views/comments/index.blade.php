@extends('layouts.frame')

@section('content')
<!-- Contact section-->
<div class="container">
    <div class="row">
        <aside class="col-lg-3">
        </aside>
        <article class="col-lg-6">
            <div class="justify-content-center">
                <div class="card mb-2">
                    <div class="card-header">
                        <a class="text-reset text-decoration-none" href="{{ route('users.show', $memo->user_id) }}">{{$memo->name}}</a>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{$memo->memo}}</p>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-body">
                        <form action="{{ route('memos.comments.store', $memo->id) }}" method="POST">
                            @csrf
                            <h6 class="card-title">コメントを追加</h6>
                            <div class="form-group mb-1">
                                <textarea class="form-control {{ $errors->has('comment') ? 'is-invalid' : '' }}" value="{{ old('comment') }}" name="comment"></textarea>
                                @if ($errors->has('comment'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('comment') }}
                                </div>
                                @endif
                            </div>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <input class="btn btn-primary" type="submit" value="投稿">
                            </div>
                        </form>
                    </div>
                </div>
                @foreach ($comments as $comment)
                <div class="card mb-2">
                    <div class="card-body">
                        <h6 class="card-title">{{ $comment->name }}</h6>
                        <p class="card-text">{{$comment->comment}}</p>
                        @if (Auth::check() && Auth::id() === $comment->user_id)
                        <div class="ud-btn">
                            <div class="me-1">
                                <form action="{{ route('memos.comments.edit', [$comment->memo_id, $comment->id]) }}" method="GET">
                                    @csrf
                                    <input class="btn btn-outline-primary btn-sm" type="submit" value="編集">
                                </form>
                            </div>
                            <div>
                                <form action="{{ route('memos.comments.destroy', [$comment->memo_id, $comment->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input class="btn btn-outline-danger btn-sm" type="submit" value="削除">
                                </form>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </article>
        <aside class="col-lg-3">
        </aside>
    </div>
</div>
@endsection('content')