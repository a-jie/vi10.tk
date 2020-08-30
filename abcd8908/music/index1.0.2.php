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
            background-color: #161618;
        }
        #controls_area{
            position: fixed;
            bottom: 7vh;
            left: 0;
            width: 100%;
            height: 7vh;
            color: white;
            background-color: #27272c;
        }
        audio{
            width: 60%;
            color: white;
            background-color: #27272c;
        }
        main{
            position: fixed;
            width: 100%;
            height: 79vh;
            top: 7vh;
            overflow: auto;
            background-color: #161618;
        }
        #control_window{
            position: fixed;
            width: 100%;
            height: 86vh;
            top: 7vh;
            overflow: auto;
            background-color: #161618;
            z-index: 5;
            display: none;
        }
        .song{
            background-color: #27272c;
            color: white;
            display: block;
            font-size: 2.3vh;
            height: 7vh;
            width: 94%;
            margin: 1.3vh 3% 1vh 3%;
            border: solid #27272c 1px;
            border-radius: 5px;
        }
        #controls_span{
            display: block;
            text-align: center;
            line-height: 7vh;
            font-size: 3vh;
            background-color: #27272c;
            color: white;
        }
        .cover img{
            height: 6vh;
            width: 6vh;
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
            height: 4vh;
        }
        .song_name span{
            display:block;
            float:left;
            line-height: 4vh;
            font-size: 2vh;
        }
        .song_author{
            display:block;
            height: 4vh;
        }
        .song_author span{
            display:block;
            float:left;
            line-height: 3vh;
            font-size: 1.5vh;
        }
        .explicit{
            height: 3vh;
            width: 3vh;
            margin: 0.5vh;
        }
        #news_btn{
            display:block;
            float:left;
            width: 12vw;
            height: 6vh;
            color: white;
            background-color: #27272c;
            border: solid #27272c 1px;
            border-radius: 3px;
            margin: 0.5vh 0.5vw 0.5vh 0.5vw;
        }
        #search_area{
            display:block;
            float:left;
            width: 72vw;
            height: 5.5vh;
            background-color: #27272c;
            border: solid #27272c 1px;
            text-align: center;
            color: white;
            border-radius: 3px;
            margin: 0.5vh 0.5vw 0.5vh 0.5vw;
        }
        #search_btn{
            display:block;
            float:left;
            width: 12vw;
            height: 6vh;
            background-color: #27272c;
            color: white;
            border: solid #27272c 1px;
            border-radius: 3px;
            margin: 0.5vh 0.5vw 0.5vh 0.5vw;
        }
        #search_btn img{
            width: 6vh;
            max-width: 12vw;
            height: 6vh;
            max-height: 12vw;
            display: block;
            margin: 0 auto;
        }
        #cover_audio{
            width: 7vh;
            height: 7vh;
            display:block;
            float:left;
            color: white;
            background-color: #27272c;
        }
        #cover_audio img{
            width: 6vh;
            height: 6vh;
            display:block;
            margin: 0.5vh;
            border-radius: 20%;
        }
        #name_audio{
            height: 3.5vh;
            display:block;
            font-size: 2vh;
            line-height: 3.5vh;
            color: white;
            background-color: #27272c;
        }
        #author_audio{
            height: 3.5vh;
            display:block;
            font-size: 1.5vh;
            line-height: 3.5vh;
            color: white;
            background-color: #27272c;
        }
        #footer_btns{
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 7vh;
            color: white;
            background-color: #27272c;
        }
        .footer_btn{
            display: block;
            float: left;
            width: 33%;
            height: 7vh;
            text-align: center;
            line-height: 7vh;
            color: white;
            background-color: #27272c;
        }
        #close_control_window{
            display: block;
            margin: 1vh auto;
            width: 3vh;
            text-align: center;
            height: 3vh;
            font-size: 2vh;
            color: white;
            background-color: #27272c;
            border: solid #27272c 1px;
            border-radius: 25%;
        }
        #control_window_cover{
            display: block;
            height: 80vw;
            max-height: 40vh;
            width: 80vw;
            max-width: 40vh;
            margin: 3vh auto;

        }
        #control_window_cover img{
            height: 80vw;
            max-height: 40vh;
            width: 80vw;
            max-width: 40vh;
        }
        #control_window_name{
            height: 3.5vh;
            display:block;
        }
        #control_window_name span{
            display: block;
            text-align: center;
            color: white;
            width: 100%;
        }
        #control_window_author{
            height: 3.5vh;
            display:block;
        }
        #control_window_author span{
            display: block;
            text-align: center;
            color: white;
            width: 100%;
        }
        #control_window_song audio{
            width: 100%;
            display: block;
            margin: 5vh auto;
        }
    </style>
</head>
<body>
    <header>
        <button id="news_btn" onclick="news()">News</button>
        <input id="search_area" placeholder="Search">
        <button id="search_btn" onclick="search()"><img src="/music/search.svg" alt="search"></button>
    </header>
    <div id="control_window">
        <button id="close_control_window" onclick="control_window()">X</button>
        <div id="control_window_cover">
        
        </div>
        <div id="control_window_name">
        
        </div>
        <div id="control_window_author">
        
        </div>
        <div id="control_window_song">
        
        </div>
    </div>
    <main id="scroll">
    
    </main>
    <div id="controls_area" onclick="control_window()">
        <span id="controls_span">Запустите любую песню</span>
    </div>
    <div id="footer_btns">
        <div class="footer_btn">
        HOME
        </div>
        <div class="footer_btn">
        MY
        </div>
        <div class="footer_btn">
        SETTINGS
        </div>
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
                    document.title = playlist[0]['name']+" | "+playlist[0]['author'];
                    $('#controls_area').append('<div id="cover_audio"><img src="'+playlist[0]['cover']+'" alt=""></div><span id="name_audio">'+playlist[0]['name']+'</span>'+'<span id="author_audio">'+playlist[0]['author']+'</span>');
                    $('#control_window_cover').empty();
                    $('#control_window_cover').append('<img src="'+playlist[0]['cover_xl']+'" alt="">');
                    $('#control_window_name').empty();
                    $('#control_window_name').append('<span>'+playlist[0]['name']+'</span>');
                    $('#control_window_author').empty();
                    $('#control_window_author').append('<span>'+playlist[0]['author']+'</span>');
                    $('#control_window_song').empty();
                    $('#control_window_song').append('<audio src="'+array['url']+'" controls autoplay onended="next()"></audio>');
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
                    document.title = playlist[0]['name']+" | "+playlist[0]['author'];
                    $('#controls_area').append('<div id="cover_audio"><img src="'+playlist[0]['cover']+'" alt=""></div><span id="name_audio">'+playlist[0]['name']+'</span>'+'<span id="author_audio">'+playlist[0]['author']+'</span>');
                    $('#control_window_cover').empty();
                    $('#control_window_cover').append('<img src="'+playlist[0]['cover_xl']+'" alt="">');
                    $('#control_window_name').empty();
                    $('#control_window_name').append('<span>'+playlist[0]['name']+'</span>');
                    $('#control_window_author').empty();
                    $('#control_window_author').append('<span>'+playlist[0]['author']+'</span>');
                    $('#control_window_song').empty();
                    $('#control_window_song').append('<audio src="'+array['url']+'" controls autoplay onended="next()"></audio>');
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
                    $('main').empty();
                    playlist_new = [];
                    for(let i=0; i < array['songs'].length; i ++){
                        playlist_new[i] = array['songs'][i];
                        document.title = search;
                        const el = document.getElementById('scroll');
                        el.scrollIntoView();
                        var name = array['songs'][i]['name'];
                        name = name.substr(0, 25);
                        if(name !== array['songs'][i]['name']){
                            array['songs'][i]['name'] = name+" ...";
                        }
                        var author = array['songs'][i]['author'];
                        author = author.substr(0, 35);
                        if(author !== array['songs'][i]['author']){
                            array['songs'][i]['author'] = author+" ...";
                        }
                        //$('#songs').append('<div class="song"><div class="cover"><img src="'+array['songs'][i]['cover']+'" alt=""></div><div class="song_name"><span>'+array['songs'][i]['name']+'</span>'+explicit(array['songs'][i]['explicit'])+'</div><div class="song_author"><span>'+array['songs'][i]['author']+'</span></div><div class="play"><input type="submit" value="Play" onclick="getlinkbyid(\''+array['songs'][i]['id']+'\')"></div></div>');
                        $('main').append('<div class="song" onclick="getlinkbyid(\''+array['songs'][i]['id']+'\')"><div class="cover"><img src="'+array['songs'][i]['cover']+'" alt=""></div><div class="song_name"><span>'+array['songs'][i]['name']+'</span>'+explicit(array['songs'][i]['explicit'])+'</div><div class="song_author"><span>'+array['songs'][i]['author']+'</span></div></div>');
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
                    $('main').empty();
                    playlist_new = [];
                    for(let i=0; i < array['songs'].length; i ++){
                        playlist_new[i] = array['songs'][i];
                        document.title = 'XIVS';
                        const el = document.getElementById('scroll');
                        el.scrollIntoView();
                        var name = array['songs'][i]['name'];
                        name = name.substr(0, 25);
                        if(name !== array['songs'][i]['name']){
                            array['songs'][i]['name'] = name+" ...";
                        }
                        var author = array['songs'][i]['author'];
                        author = author.substr(0, 35);
                        if(author !== array['songs'][i]['author']){
                            array['songs'][i]['author'] = author+" ...";
                        }
                        //$('#songs').append('<div class="song"><img id="cover" src="'+array['songs'][i]['cover']+'" alt="cover"><span class="song_name">'+array['songs'][i]['name']+'</span>'+explicit(array['songs'][i]['explicit'])+"<br>"+'<span class="song_author">'+array['songs'][i]['author']+'</span>'+'<input class="song_id" onclick="getlinkbyid(\''+array['songs'][i]['id']+'\')" value="Play"></div>');
                        $('main').append('<div class="song" onclick="getlinkbyid(\''+array['songs'][i]['id']+'\')"><div class="cover"><img src="'+array['songs'][i]['cover']+'" alt=""></div><div class="song_name"><span>'+array['songs'][i]['name']+'</span>'+explicit(array['songs'][i]['explicit'])+'</div><div class="song_author"><span>'+array['songs'][i]['author']+'</span></div></div>');
                    }
                }
            })
        }
        function control_window(){
            $('#control_window').toggle();
        }
        news();
        $("#search_area").keyup(function(event){
            if(event.keyCode == 13){
                event.preventDefault();
                search();
            }
        });

    </script>
</body>
</html>