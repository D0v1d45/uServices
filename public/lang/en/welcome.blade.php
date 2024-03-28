<!DOCTYPE html>
<html lang="en">
    <head>
        <title>html</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/welcome.css">
    </head>
    <body>
@lang("public.localization")
        <div class="banner">
            
            <div class="navbar">
                <ul>
                    <li><a href="{{ url('/')}}"> Pradžia</a></li>
                    <li><a href=""> Paslaugos</a></li>
                    <li><a href="{{ url('/about')}}"> Apie Mus</a></li>
                    <li><a href=""> @lang(public.contacts")</a></li>
                    
                    <li id="login"><a id="login" href="{{ url('/login') }}"> Prisijungti</a></li>
                    <li id="register"><a id="register" href=" {{ url('/reg') }}"> Registruotis</a></li>
                </ul>
                
            </div>
        </div>
        <div class="main">
            <h2 id="text">Taupykite laiką rezervuodami paslaugas!</h2>
            <h2 id="text2">Teikite paslaugas!</h2>
            <img src = "background.jpg" alt="backgorund" height="500">
            

        </div>
        <div class="top"><h1>Teikiamos paslaugos</h1>
        
        </div>
        <div class="main2">
            <div>
                <h1>Plaukų</h1>
                <p>Moteriškas,vyriškas kirpymas, šukuosenų sudarymas, plaukų dažymas</p>
            </div>
            <div>
                <h1>Grožio</h1>
                <p>Manikiūras,pedikiūras,visažas</p>
            </div>
               
            <div>
                <h1>Dantu priežiūros</h1>
                <p>Dantų higiena,plombavimas,dantų balinimas,tiesinimas</p>
            </div>
            <div>
                <h1>Automobilio remonto</h1>
                <p>Mechaninių ir elektroninių gedimų šalinimas,diagnostika</p>
            </div>

        </div>
        <div class="main3">

            
        </div>
        <div class="lastcontainer">
            <footer>@2023 uPaslaugos.lt Visos teises saugomos</footer>

        </div>


                        
    </body>



</html>