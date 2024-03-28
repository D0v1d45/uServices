<!DOCTYPE html>
<html lang="en">
    <head>
        <title>html</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/welcome.css">
    </head>
    <body>

        <div class="banner">

            <div class="navbar">
                <ul>
                    <li><a href="{{ route('home')}}"> {{__('messages.Pradzia')}}</a></li>
                    <li><a href="{{route('index')}}"> {{ __('messages.Paslaugos') }}</a></li>
                    <li><a href="{{ url('/about') }}"> {{ __('messages.ApieMus') }}</a></li>
                    <li> </li>

                <div class="dropdown">
                    <button class="dropbtn">{{$UserInfo['username']}}</button>
                    <div class="dropdown-content">
                        <a  href="{{ route('profile') }}">{{__('messages.Profilis')}}</a>
                        <a href="{{route('myclients')}}">{{__('messages.Mpaslaugos')}}</a>
                        <a href="{{route('booked-reservations')}}">{{__('messages.Mrezervacijos')}}</a>
                        <a id="logout" href="{{route('logout')}}"> {{__('messages.Atsijungti')}}</a>
                    </div>

                    </label>

                </li>
                </ul>
            </div>
            <div class="drop" >
                <div class="lang" >
                    <a class="dropdown-item" href="{{ url('/lt') }}">Lietuvių <img src="{{ asset('lt-flag.png') }}" style="width: 20px; height: 20px;"></a>
                    <a class="dropdown-item" href="{{ url('/en') }}">English <img src="{{ asset('en-flag.png') }}" style="width: 20px; height: 20px;"></a>
                </div>
            </div>
        </div>
        <script>
            function changeLanguage(select) {
                var selectedLanguageUrl = select.value;
                window.location.href = selectedLanguageUrl;
            }
        </script>
        <div class="main">
            <h2 id="text">{{__('messages.Text1')}}</h2>
            <h2 id="text2">{{__('messages.Text2')}}</h2>
            <img src = "background.jpg" alt="backgorund" height="500">


        </div>
        <div class="top"><h1>{{__('messages.Pop')}}</h1>

        </div>
        <div class="main2">
             <a  href="{{ route('index') }}">
            <div>
                <h1>{{ __('messages.Plauku') }}</h1>
                <p>{{ __('messages.Plaukai') }}</p>
            </div>
            </a>
            <a  href="{{route('index')}}">
            <div>
                <h1>{{ __('messages.Grozis') }}</h1>
                <p>{{ __('messages.Groziai') }}</p>
            </div>
            </a>
            <a  href="{{route('index')}}">
            <div>
                <h1>{{ __('messages.Dantys') }}</h1>
                <p>{{ __('messages.Dantai') }}</p>
            </div>
            </a>
            <a  href="{{route('index')}}">
            <div>
                <h1>{{ __('messages.Automobiliai') }}</h1>
                <p>{{ __('messages.Auto') }}</p>
            </div>
            </a>

        </div>
        <div class="main3">


        </div>
        <div class="lastcontainer">
            <footer>{{__('messages.Copyrights')}}</footer>

        </div>
    </body>



</html>
