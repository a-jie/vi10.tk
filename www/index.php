<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Vi10.tk</title>
    <link href="https://fonts.googleapis.com/css2?family=Days+One&display=swap" rel="stylesheet">
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
        header #a_2{
            height:10vh;
            line-height:10vh;
            top: 0px;
            text-decoration:none;
            font-family: Days One;
            font-size: 3vh;
            display: flex;
            align-items: center;
            text-align: center;
            color: white;
            float:right;
            margin:0 10vw 0 0;
        }
        header #a_3{
            height:10vh;
            line-height:10vh;
            float:right;
            top: 0px;
            text-decoration:none;
            font-family: Days One;
            font-size: 3vh;
            display: flex;r
            align-items: center;
            text-align: center;
            color: white;
            height:10vh;
            line-height:10vh;
            margin:0 5vw 0 0;
        }
        h1{
            font-size:8vh;
            padding:0 0 5vh 0;
        }
        h2{
            font-size:5vh;
        }
        #text{
            position:absolute;
            width:100%;
            top:24vh;
            left:0;
            text-align:center;
            color:white;
            z-index:100;
        }
    </style>
</head>
<body>
    <header>
        <a id="a_1" href="https://vi10.tk/">Vi10.tk</a>
        <a id="a_2" href="https://vi10.tk/about">About</a>
        <a id="a_3" href="https://vi10.tk/projects">Projects</a>
    </header>
    <div id="black_div"></div>
    <div id="text">
        <h1>We are building your dreams!</h1>
        <h2>See Projects and about</h2>
    </div>
    <img id="slide1" src="www/image.webp" alt="">
</body>
</html>