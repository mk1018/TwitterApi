@extends('layouts.app')

@section('content')
<!-- <div class="container-fluid" style="margin-top:100px;">
   <div class="row">
      <div class=" col-md-6">
         @foreach ($tweet as $tw)
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
         @endforeach
      </div>
   </div>
</div> -->
<div class="container-fluid" style="margin-top:100px;">
   <div class="row">
      <div class=" col-md-6">
      <table border="1">
      <?php $i=0; ?>
         @foreach ($tweet as $tw)
         <tr>
            <td><?php echo $i++; ?></td>
            <td><b>{{ $tw['user']['name'] }}</b></td>
            <td><p id="screen_name">@ {{ $tw['user']['screen_name'] }}</p></td>
            <td><p id="created_at">{{ $tw['created_at'] }}</p></td>
            <td><p id="text">{{ $tw['text'] }}</p></td>
            <td><p id="retweet_count">{{ $tw['retweet_count']}}</p></td>
            <td><p id="favorite_count">{{ $tw['favorite_count']}}</p></td>
         </tr>
         @endforeach
         </table>
      </div>
   </div>
</div>
@endsection
