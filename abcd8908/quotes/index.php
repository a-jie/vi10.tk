<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Days+One&display=swap" rel="stylesheet">
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <title>Quotes</title>
    <style>
        *{
            padding:0;
            margin:0;
            font-family: 'Days One', sans-serif;
        }
        header{
            position:absolute;
            top:0;
            z-index:100;
            height:10vh;
            width:100%;
            background: linear-gradient(0deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.1));
        }
        #black_div{
            opacity:0.4;
            background-color:black;
            position:absolute;
            top:0;
            left:0;
            width:100%;
            height:100%;
        }
        #slide1{
            display:block;
            height:100vh;
            width:100%;
        }
        header #a_1{
            height:10vh;
            line-height:10vh;
            position: absolute;
            left: 10vw;
            top: 0px;
            text-decoration:none;
            font-family: Days One;
            font-size: 3vh;
            display: flex;
            align-items: center;
            text-align: center;
            color: white;
        }
        header #a_3{
            height:10vh;
            line-height:10vh;
            float:right;
            top: 0px;
            text-decoration:none;
            font-family: Days One;
            font-size: 3vh;
            display: flex;
            align-items: center;
            text-align: center;
            color: white;
            height:10vh;
            line-height:10vh;
            margin:0 5vw 0 0;
        }
        h1{
            position:absolute;
            width:100%;
            top:13vh;
            left:0;
            font-size:10vh;
            text-align:center;
            color:white;
            z-index:100;
        }
        button{
            display:block;
            font-size:2.5vh;
            text-align:center;
            color:white;
            background-color:rgb(0,0,0,0);
            border-radius:3vh;
            height:5vh;
            width:10vh;
            margin:0 auto;
            border:solid white 0.2vh;
        }
        #overflowdiv{
            max-height:70vh;
            width:100%;
            overflow: auto;
            position:absolute;
            z-index:100;
            top:30vh;
        }
        #quote{
            display:block;
            margin: 0 auto;
            padding: 0 0 5vh 0;
            width:70%;
            font-size:3.3vh;
            text-align:center;
            color:white;
        }
    </style>
</head>
<body>
    <header>
        <a id="a_1" href="https://vi10.tk/">Vi10.tk</a>
        <a id="a_3" href="https://vi10.tk/projects">Projects</a>
    </header>
    <div id="black_div"></div>
    <h1>Quotes</h1>
    <div id="overflowdiv">
        <span id="quote"></span>
        <button onclick="quote()">Next</button>
    </div>
    <img id="slide1" src="https://vi10.tk/image3.webp" alt="">
    <script>
        async function quote(){
            $.ajax({
                type: "GET",
                url: "https://quotes.vi10.tk/quote.php",
                dataType: 'text',
                success: function(data){
                    $('#quote').empty();
                    $('#quote').html(data);
                }
            })
        }
        quote();
    </script>
</body>
</html>