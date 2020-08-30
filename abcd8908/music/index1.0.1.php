<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"><title>XIVS</title>
    <style>
        *{
            padding: 0;
            margin: 0;
            font-family: 'Roboto', sans-serif;
        }
        header{
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 7vh;
        }
        #controls_area{
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 7vh;
        }
        audio{
            width: 60%;
        }
        #songs{
            position: fixed;
            width: 100%;
            height: 86vh;
            top: 7vh;
            overflow: auto;
        }
        .song{
            display: block;
            font-size: 2.3vh;
            height: 7vh;
            width: 100%;
            margin: 1.3vh 0 1vh 0;
        }
        #controls_span{
            display: block;
            text-align: center;
            line-height: 7vh;
            font-size: 3vh;
        }
        .cover img{
            height: 7vh;
            width: 7vh;
            border-radius: 50%;
            margin: 0.5vh;
        }
        .cover{
            display:block;
            float: left;
            height: 8vh;
            width: 8vh;
        }
        .song_name{
            display:block;
            float:left;
            height: 4vh;
            width: 70%;
        }
        .song_name span{
            display:block;
            float:left;
            line-height: 4vh;
            font-size: 2.4vh;
        }
        .song_author{
            display:block;
            float:left;
            height: 4vh;
            width: 70%;
        }
        .song_author span{
            display:block;
            float:left;
            line-height: 3vh;
            font-size: 1.8vh;
        }
        .explicit{
            height: 3vh;
            width: 3vh;
            margin: 0.5vh;
        }
        .play{
            display:flex;
            height: 8vh;
        }
        .play input{
            width: 100%;
            border: none;
            background-color: white;
            font-size: 3vh;
        }
        #news_btn{
            width: 12vw;
            height: 7vh;
        }
        #search_area{
            width: 72vw;
            height: 6.5vh;
        }
        #search_btn{
            width: 12vw;
            height: 7vh;
        }
        #cover_audio{
            width: 10%;
            height: 7vh;
            displaY:block;
            float:left;
        }
        #cover_audio img{
            width: 7vh;
            max-width: 9vw;
            height: 7vh;
            displaY:block;
            margin: 0 auto;
            border-radius: 20%;
        }
        #span_audio{
            width: 30%;
            height: 7vh;
            displaY:block;
            float:left;
            font-size: 1.2vh;
            line-height: 3.5vh;
        }
    </style>
</head>
<body>
    <header>
        <button id="news_btn" onclick="news()">News</button>
        <input id="search_area" placeholder="Search">
        <button id="search_btn" onclick="search()">Search</button>
    </header>
    <div id="controls_area">
        <span id="controls_span">Запустите любую песню на play</span>    
    </div>
    <div id="songs">
        
    </div>
    <script>
        var playlist = [];
        var playlist_new = [];
        function explicit(e){
            if(e){
                return "<img class='explicit' src='/music/explicit.png' alt='e'>";
            }else{
                return "";
            }
        }
        async function next(){
            var id = playlist[1]['id'];
            playlist = playlist.slice(1);
            $.ajax({
                type: "GET",
                url: "https://api.vitasha.tk/music/getlinkbyid/8908/?id="+id,
                dataType: 'text',
                success: function(data){
                    var array = JSON.parse(data);
                    $('#controls_area').empty();
                    $('#controls_area').append('<div id="cover_audio"><img src="'+playlist[0]['cover']+'" alt=""></div><span id="span_audio">'+playlist[0]['name']+"<br>"+playlist[0]['author']+'</span><audio src="'+array['url']+'" controls autoplay onended="next()"></audio>');
                }
            })
        }
        async function getlinkbyid(id){
            playlist_new1 = playlist_new.slice();
            var num;
            for(let i=0; i < 999; i ++){
                num = i;
                if(playlist_new1[i]['id'] == id){
                    break;
                }
            }
            playlist_new1.splice(0, num);
            playlist = playlist_new1;
            $.ajax({
                type: "GET",
                url: "https://api.vitasha.tk/music/getlinkbyid/8908/?id="+id,
                dataType: 'text',
                success: function(data){
                    var array = JSON.parse(data);
                    $('#controls_area').empty();
                    $('#controls_area').append('<div id="cover_audio"><img src="'+playlist[0]['cover']+'" alt=""></div><span id="span_audio">'+playlist[0]['name']+"<br>"+playlist[0]['author']+'</span><audio src="'+array['url']+'" controls autoplay onended="next()"></audio>');
                }
            })
        }
        async function search(){
            var search = $("#search_area").val();
            $.ajax({
                type: "GET",
                url: "https://api.vitasha.tk/music/search/8908/?search="+search,
                dataType: 'text',
                success: function(data){
                    var array = JSON.parse(data);
                    $('#songs').empty();
                    playlist_new = [];
                    for(let i=0; i < array['songs'].length; i ++){
                        playlist_new[i] = array['songs'][i];
                        $('#songs').append('<div class="song"><div class="cover"><img src="'+array['songs'][i]['cover']+'" alt=""></div><div class="song_name"><span>'+array['songs'][i]['name']+'</span>'+explicit(array['songs'][i]['explicit'])+'</div><div class="song_author"><span>'+array['songs'][i]['author']+'</span></div><div class="play"><input type="submit" value="Play" onclick="getlinkbyid(\''+array['songs'][i]['id']+'\')"></div></div>');
                        //$('#songs').append('<div class="song"><img id="cover" src="'+array['songs'][i]['cover']+'" alt="cover"><p>'+array['songs'][i]['name']+explicit(array['songs'][i]['explicit'])+"<br>"+array['songs'][i]['author']+'</p>'+'<input class="song_id" onclick="getlinkbyid(\''+array['songs'][i]['id']+'\')" value="Play"></div>');
                    }
                }
            })
        }
        async function news(){
            var search = $("#search_area").val();
            $.ajax({
                type: "GET",
                url: "https://api.vitasha.tk/music/news/8908/",
                dataType: 'text',
                success: function(data){
                    var array = JSON.parse(data);
                    $('#songs').empty();
                    playlist_new = [];
                    for(let i=0; i < array['songs'].length; i ++){
                        playlist_new[i] = array['songs'][i];
                        //$('#songs').append('<div class="song"><img id="cover" src="'+array['songs'][i]['cover']+'" alt="cover"><span class="song_name">'+array['songs'][i]['name']+'</span>'+explicit(array['songs'][i]['explicit'])+"<br>"+'<span class="song_author">'+array['songs'][i]['author']+'</span>'+'<input class="song_id" onclick="getlinkbyid(\''+array['songs'][i]['id']+'\')" value="Play"></div>');
                        $('#songs').append('<div class="song"><div class="cover"><img src="'+array['songs'][i]['cover']+'" alt=""></div><div class="song_name"><span>'+array['songs'][i]['name']+'</span>'+explicit(array['songs'][i]['explicit'])+'</div><div class="song_author"><span>'+array['songs'][i]['author']+'</span></div><div class="play"><input type="submit" value="Play" onclick="getlinkbyid(\''+array['songs'][i]['id']+'\')"></div></div>');
                    }
                }
            })
        }
        news();
    </script>
</body>
</html>