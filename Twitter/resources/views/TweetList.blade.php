@extends('layouts.app')

@section('content')
<meta name="twitter:card" content="summary_large_image">
<meta property="og:url" content="https://twitter.com/Mk1018Web/status/1264548432531709952" /> 
<div class="row col-md-12">
   <div class="col-md-6" ><div class="card text-white bg-primary"><div class="card-header text-center">ツイート</div></div></div>
   <div class="col-md-6" ><div class="card bg-light"             ><div class="card-header text-center">リツイート</div></div></div>
</div>

<div class="container-fluid" style="margin-top:100px;">
   <div class="row">
      <div class=" col-md-6">
         @foreach ($tweet as $tw)
            @if (!$tw['retweet_count'])
               <div class="container card main_card" aligin="center" >
                  <div class="row">
                     <img src="{{ $tw['user']['profile_image_url_https'] }}" >
                     <div class="col">
                        <h5><b>{{ $tw['user']['name'] }}</b></h5>
                        <p id="screen_name">@ {{ $tw['user']['screen_name'] }}</p>
                        <p id="created_at">{{ $tw['created_at'] }}</p>
                        <p id="text">{{ $tw['text'] }}</p>
                     </div>
                  </div>
               </div>
            @endif
         @endforeach
      </div>
   </div>
</div>

<!-- <div class="container-fluid" style="margin-top:100px;">
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
            @endif
         @endforeach
      </div>
   </div>
</div> -->
@endsection
