@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ Auth::user()->name }}さんのタイムライン</div>

                <!-- //@FIXME ツイートを一覧で表示  -->

                    @foreach($TweetDate as $tweets)


                
                    <div class="card-body">
                        <!-- //@FIXME ツイートを表示 --> 

                        {{$tweets ->tweet }}

                        <br>
                        <div style="display:flex; justify-content: left;align-items: center;">
                            <div style="float:left">
                              <!--   //@FIXME ツイートした人の名前と時間を表示 ?> -->
                        {{$tweets -> user ->name}}
                        {{$tweets -> created_at}}

                            </div>
                            <!-- //@FIXME Favはマウスオーバーでアニメーションするだけの状態 ?> -->
                            <div style="float:left" class="heart"></div>
                            
                        </div>
                    </div>

                    <hr style="margin-top:0px; margin-bottom:0px">
                     @endforeach
            </div>

                {{$TweetDate->links()}}


                   




            <?php //{{ $tweets->links() }} ?>
        </div>
    </div>
</div>
@endsection
