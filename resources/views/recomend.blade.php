@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-xs-12">
            <div class="card">
                <div class="card-header">Recomend Video</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row justify-content-center">
                    <div id="ytplayer"></div>

                    <script>
                        // Load the IFrame Player API code asynchronously.
                        var tag = document.createElement('script');
                        tag.src = "https://www.youtube.com/player_api";
                        var firstScriptTag = document.getElementsByTagName('script')[0];
                        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

                        // Replace the 'ytplayer' element with an <iframe> and
                        // YouTube player after the API code downloads.
                        var player;
                        function onYouTubePlayerAPIReady() {
                            player = new YT.Player('ytplayer', {
                            height: '360',
                            width: '640',
                            videoId: "{{$id}}",
                            });
                        }
                    </script>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection


