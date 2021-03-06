@extends('layouts.memos')

@section('content')
<!-- Contact section-->

<div class="container">
    <div class="row">
        <aside class="col-lg-3">
        </aside>
        <article class="col-lg-6">
            <div class="result_memos">
                @foreach ($memos as $memo)
                <div class="info card mb-2">
                    <div class="card-header">
                        <a class="text-reset text-decoration-none" href="{{ route('users.show', $memo->user_id) }}">{{$memo->name}}</a>
                    </div>
                    <div class="card-body">
                        <div class="card-text text">{{ $memo->memo }}</div>
                        <p class="readmore-btn"><a href="">続きを読む</a></p>

                        <div>
                            @foreach($memo->tags as $memo_tag)
                            <span class="badge rounded-pill bg-primary"><a class="text-reset text-decoration-none" href="/hashtag/{{$memo_tag->tag}}">{{ $memo_tag->tag }}</a></span>
                            @endforeach
                        </div>
                        @if ($memo->count_comments === 0)
                        <div><a href="{{ route('memos.show', $memo->id) }}">コメントを追加</a></div>
                        @else
                        <div><a href="{{ route('memos.show', $memo->id) }}">{{ $memo->count_comments }}件のコメント</a></div>
                        @endif
                    </div>
                </div>
                @endforeach

                @if ($memos->hasMorePages())
                <p class="button more"><a href="{{ $memos->nextPageUrl() }}">もっと見る</a></p>
                @endif

            </div>
        </article>
        <aside class="col-lg-3">
            <div class="card center-block">
                <div class="card-body">
                    <form action="/search" method="Get">
                        <div class="mb-2">
                            <input type="text" class="form-control {{ $errors->has('free_word') ? 'is-invalid' : '' }}" name="free_word" id="free_word" value="{{ old('free_word') }}" placeholder="キーワード検索">
                            @if ($errors->has('free_word'))
                            <div class="invalid-feedback">
                                {{ $errors->first('free_word') }}
                            </div>
                            @endif
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </form>
                </div>
            </div>
        </aside>
    </div>
</div>
@endsection('contents')