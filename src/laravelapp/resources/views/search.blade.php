@extends('layouts.frame')

@section('content')
<!-- Contact section-->
<div class="container py-5 my-5">
    <div class="row">
        <aside class="col-lg-3">
        </aside>
        <article class="col-lg-6">
            <div class="card center-block">
                <div class="card-body">
                    <form action="/search" method="Get">
                        <div class="mb-2">
                            <input type="text" class="form-control {{ $errors->has('free_word') ? 'is-invalid' : '' }}" name="free_word" id="free_word" value="{{$parameters->get('free_word')}}">
                            @if ($errors->has('free_word'))
                            <div class="invalid-feedback">
                                {{ $errors->first('free_word') }}
                            </div>
                            @endif
                        </div>
                        <input type="submit" class="btn btn-primary" value="検索">
                    </form>
                </div>
            </div>
            @if ($memos)
            <div>検索結果は{{ $memos->count() }}件です。</div>
            @else
            <div>検索結果は0件です。</div>
            @endif
            <div class="justify-content-center">
                @foreach ($memos as $memo)
                <div class="card mb-2">
                    <div class="card-header">
                        <a class="text-reset text-decoration-none" href="{{ route('users.show', $memo->user_id) }}">{{$memo->name}}</a>
                    </div>
                    <div class="card-body">
                        <div class="card-text">{{$memo->memo}}</div>
                        <div>
                            @foreach($memo->tags as $memo_tag)
                            <span class="badge rounded-pill bg-primary"><a class="text-reset text-decoration-none" href="/hashtag/{{$memo_tag->tag}}">{{ $memo_tag->tag }}</a></span>
                            @endforeach
                        </div>
                        <div><a href="{{ route('memos.show', $memo->id) }}">{{ $memo->count_comments }}件のコメント</a></div>
                    </div>
                </div>
                @endforeach
            </div>
        </article>
        <aside class="col-lg-3">
        </aside>
    </div>
</div>
@endsection('contents')