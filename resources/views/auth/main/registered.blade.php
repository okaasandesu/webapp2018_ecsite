@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 yohaku-ue">
            <div class="card">
                <div class="card-header">本会員登録完了</div>
                <div class="card-body">
                    <p>本会員登録が完了しました。</p>
                    <a href="{{url('/ECsite')}}" class="sg-btn">トップページへ戻る</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
