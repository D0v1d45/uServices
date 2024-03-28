<!DOCTYPE html>
<html lang="lt">
<head>
    <title>html</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/welcome.css">
</head>
<body>

</label>
    <div class="banner">
        <div class="navbar">
            <ul>
                <li><a href="{{ url('/') }}"> {{ __('messages.Pradzia') }}</a></li>
                <li><a href="{{route('index')}}"> {{ __('messages.Paslaugos') }}</a></li>
                <li><a href="{{ url('/about') }}"> {{ __('messages.ApieMus') }}</a></li>
                <li>
                </li>
                <li id="login"><a id="login" href="{{ url('/login') }}"> {{ __('messages.Prisijungti') }}</a></li>
                <li id="register"><a id="register" href="{{ url('/reg') }}"> {{ __('messages.Registruotis') }}</a></li>
                <div class="dropdown" >
                    <div class="lang"  aria-labelledby="languageDropdown" >
                        <a class="dropdown-item" href="{{ url('/lt') }}">Lietuvių <img src="{{ asset('lt-flag.png') }}" style="width: 20px; height: 20px;"></a>
                        <a class="dropdown-item" href="{{ url('/en') }}">English <img src="{{ asset('en-flag.png') }}" style="width: 20px; height: 20px;"></a>
                    </div>
                </div>

            </li>
            </ul>
        </div>
    </div>
        </div>
        <div class="main">
            <h2 id="text">{{ __('messages.Text1') }}</h2>
            <h2 id="text2">{{ __('messages.Text2') }}</h2>
            <img src = "background.jpg" alt="backgorund" height="500">

            <script>
                function changeLanguage(select) {
                    var selectedLanguageUrl = select.value;
                    window.location.href = selectedLanguageUrl;
                }
            </script>
        </div>
        <div class="top"><h1>{{ __('messages.Pop') }}</h1>

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
