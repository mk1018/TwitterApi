@extends('layouts.app')

@section('content')
<div class="row col-md-12">
   <div class="col-md-6" ><div class="card text-white bg-primary"><div class="card-header text-center">ツイート</div></div></div>
   <div class="col-md-6" ><div class="card bg-light"             ><div class="card-header text-center">リツイート</div></div></div>
</div>

<div class="container-fluid" style="margin-top:100px;">
   <div class="row">
      <div class=" col-md-6">
         @foreach ($tweet as $tw)
            @if (!$tw['retweet_count'])
               <blockquote class="twitter-tweet" aligin="center" >
                  <p lang="ja" dir="ltr">
                     {{ $tw['text'] }}
                  </p>— {{ $tw['user']['name'] }}
                  <a href="https://twitter.com/{{ $tw['user']['screen_name'] }}/status/{{ $tw['id'] }}"></a>
               </blockquote>
               <script async="" src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
            @endif
         @endforeach
      </div>
      <div class=" col-md-6">
         @foreach ($tweet as $tw)
            @if ($tw['retweet_count'])
               <blockquote class="twitter-tweet">
                  <p lang="ja" dir="ltr">
                     {{ $tw['text'] }}
                  </p>— {{ $tw['user']['name'] }}
                  <a href="https://twitter.com/{{ $tw['user']['screen_name'] }}/status/{{ $tw['id'] }}"></a>
               </blockquote>
               <script async="" src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
            @endif
         @endforeach
      </div>
   </div>
</div>



@endsection