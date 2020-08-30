<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <title>XIVS</title>
</head>
<body>
    <button onclick="news()">News</button>
    <textarea id="search_area" cols="30" rows="10" placeholder="Search"></textarea>
    <button onclick="search()">Search</button>
    <div id="controls_area">
        <span>Запустите любую песню на play</span>    
    </div>
    <div id="songs">

    </div>
    <script>
        var playlist;
        var playlist_new;
        async function next(){
            playlist.splice(0, 1);
            var id = playlist[0];
            $.ajax({
                type: "GET",
                url: "https://api.vitasha.tk/music/getlinkbyid/8908/?id="+id,
                dataType: 'text',
                success: function(data){
                    var array = JSON.parse(data);
                    $('#controls_area').empty();
                    $('#controls_area').append('<audio src="'+array['url']+'" controls autoplay onended="next()"></audio>');
                }
            })
        }
        async function getlinkbyid(id){
            playlist = [];
            var playlist_new1 = playlist_new;
            playlist_new1.splice(0, playlist_new1.indexOf(id));
            playlist = playlist_new1;
            $.ajax({
                type: "GET",
                url: "https://api.vitasha.tk/music/getlinkbyid/8908/?id="+id,
                dataType: 'text',
                success: function(data){
                    var array = JSON.parse(data);
                    $('#controls_area').empty();
                    $('#controls_area').append('<audio src="'+array['url']+'" controls autoplay onended="next()"></audio>');
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
                        playlist_new[i] = array['songs'][i]['id'];
                        $('#songs').append('<p>'+array['songs'][i]['name']+" "+array['songs'][i]['author']+'</p>'+'<span class="song_id" onclick="getlinkbyid(\''+array['songs'][i]['id']+'\')">Play</span>');
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
                        playlist_new[i] = array['songs'][i]['id'];
                        $('#songs').append('<p>'+array['songs'][i]['name']+" "+array['songs'][i]['author']+'</p>'+'<span class="song_id" onclick="getlinkbyid(\''+array['songs'][i]['id']+'\')">Play</span>');
                    }
                }
            })
        }
        news();
    </script>
</body>
</html>