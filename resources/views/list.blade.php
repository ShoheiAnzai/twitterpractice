@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <!-- 実際どんなコードを書けばいいか自分で考える

            ステップ1 この画面はどんなことをする画面になるか考える
            →アカウント一覧を出す。フォローボタンを押すとフォローされる画面を作る
            
            一覧とは
            →自分以外の全てのユーザーデータを出す。

            ステップ2 
            →ユーザーデータの存在チェック→自分以外誰もいなかったらエラーになるのを阻止

             -->


             <!-- //@FIXME ユーザーデータの存在チェック

            //empty関数を使う -->

            <!-- 空じゃないときに実行。!の使い方-->
            @if(!empty($users))


          <div class="card">
                <div class="card-header">ユーザ一覧</div>
            
            <!-- ユーザー一覧はループに入れない。位置に気をつける。 -->
                
                @foreach($users as $user)
            



                

                    <div class="card-body">
                        <!--  //@FIXME ユーザー名を表示  -->

                        {{$user->name}}

                        <div style="float:right">

                              @if(!in_array( $user->id, $follow_id_list))

                              <!-- Formはヘルパーと呼ばれているもの。HTMLとして出力する。bladeの構文。-->


                                {!! Form::open(['id' => 'formTweet', 'url' => 'users/follow/', 'enctype' => 'multipart/form-data']) !!}
                                    {{Form::hidden('followId', $user->id, ['id' => 'followId'])}}
                                    <button type="submit" class="btn btn-light">
                                        {{ __('フォローする') }}
                                    </button>
                                {!! Form::close() !!}

                                @else
                                <!--  //@FIXME フォロー中の表示  -->   
                                フォロー中

                                @endif



                              
                        </div>
                    </div>

                    <hr>

                    @endforeach
                <?php //@FIXME ページングを表示 ?>

            </div>

                
            @endif
        </div>
    </div>
</div>
@endsection

