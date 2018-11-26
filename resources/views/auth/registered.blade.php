@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 yohaku-ue">
            <div class="card">
                <div class="card-header">仮会員登録完了</div>

                <div class="card-body">
                    <p class='text-info'>この度は、ご登録いただき、誠にありがとうございます。</p>
                    <p class='text-info'>
                        ご本人様確認のため、ご登録いただいたメールアドレスに、<br>
                        本登録のご案内のメールが届きます。
                    </p>
                    <p class='text-info'>
                        そちらに記載されているURLにアクセスし、<br>
                        アカウントの本登録を完了させてください。
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection