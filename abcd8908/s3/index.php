<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <title>S3 keys</title>
</head>
<body>
    <h1>https://vi10tkdata.hb.bizmrg.com/data/</h1>
    <a href="https://vi10tkdata.hb.bizmrg.com/data/">https://vi10tkdata.hb.bizmrg.com/data/</a>
    <input type="text" id="put_key" value="my">
    <textarea name="" id="put_data" cols="30" rows="10"></textarea>
    <button onclick="put()">PUT</button>
    <input type="text" id="get_key" value="my">
    <pre id="get_data"></pre>
    <button onclick="get()">GET</button>
    <button onclick="$('#get_data').empty();">Clear</button>
    <script>
        function put(){
            $.ajax({
                async:false,
                type: "POST",
                url: "https://s3.vi10.tk/puts3.php",
                dataType: 'text',
                data: {put_key: $("#put_key").val(), put: $("#put_data").val()},
                success: function(data){
                }
            })
        }
        function get(){
            $.ajax({
                async:false,
                type: "POST",
                url: "https://s3.vi10.tk/gets3.php",
                dataType: 'text',
                data: {get_key: $("#get_key").val()},
                success: function(data){
                    $('#get_data').empty();
                    $('#get_data').html(data);
                }
            })
        }
    </script>
</body>
</html>