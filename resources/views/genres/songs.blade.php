@section ('song-data')

<section class="wrapper" >
    <div class="container-fostrap" >
        <div class="content" >    
            <div class="container" >
                <div class="row">
                @foreach ($song as $song)
                    <div class="col-xs-12 col-sm-4">
                        <div class="card"  style="width: 20rem; ">
                            <a class="img-card" href="{{route('song_info', $song['id'])}}">
                            <img src="/image/{{$song->image}}" />
                          </a>
                            <div class="card-content">
                                <h4 class="card-title">
                                    <a href=""> {{$song ['songname']}}
                                  </a>
                                </h4>
                                <h5 class="card-title">
                                <a href=""> {{$song ['author']}}
                                  </a> 
                                </h5>
                                <p class="">
                                    {{$song ['date_registered']}}
                                </p>  
                                <h5 class="card-title">
                                    <a href="">   {{$song ['genre']}}
                                  </a>
                                </h5>
                    
                                <!-- Trigger/Play button-->
                                <img src="/succesor/play-button.png" style="width: 50px; height:50px;" 
                                 type="button"  class="modal-button" data-target="play-song" 
                                  href="#song{{$song->id}}" type="button">
                            </div>
                            <div class="card-read-more">
                                <a href="{{route('song_info', $song['id'])}}" style="color:darkorchid;" class="btn btn-link btn-block">
                                    Read More
                                </a>
                            </div>
                        </div>
                    </div>  
<!--MODAL!-->
<div id="song{{$song->id}}" class="modal">
  <!-- Modal content -->
  <div class="modal-content">   
    <div class="modal-header" style="background-image: url('/succesor/ios13DarkPreview-768x432.png');
    background-repeat:no-repeat;   background-size: cover;"> 
      <span class="close">&times;</span>
      <h2 class="songh2">"{{$song ['album']}}"</h2>
    </div>
      
    <div class="modal-body" style="background-image: url('/1st_bg/{{$song ->background_image}}');
    background-repeat:no-repeat;   background-size: cover;"  >
      <h2 class="song-titleh2" >{{$song ['songname']}}</h2>
      <h2 class="song-titleh2">{{$song ['author']}}</h2>

<img src="/image/{{$song ->image}}" style="width:300px; height:300px; margin-left:80px; border-radius:3px; border:solid;"  >

<!-- Audio player !-->
<div class="container-audio">
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
    </div>

<div class="container-audio">
        <audio controls >
                   <source src="/songs/{{$song->audio}} " type="audio/ogg">
                   Your browser dose not Support the audio Tag
               </audio>
    </div>
    

<!-- partial -->
        
  <script  src="js/player.js"></script>
           
    		</div>
		
<!-- Analytics -->
<!-- End of Audio Control Parameter -->
    <div class="modal-footer" style="background-image: url('/succesor/ios13DarkPreview-768x432.png');
    background-repeat:no-repeat;   background-size: cover;"> 
      <h3 class="songh2"> {{$song ['genre']}}</h3>
    </div>
  </div>
</div>
@endforeach
@endsection