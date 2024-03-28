<!DOCTYPE html>
<html>
<head>
    <title>Prisijungimas</title>
    <link href="css/logins.css" rel="stylesheet">
</head>
<body>

<div class="banner">

            <div class="navbar">
                <ul>
                <li><a href="{{ url('/')}}"> {{__('messages.Pradzia')}}</a></li>
                <li><a href="{{route('index')}}"> {{ __('messages.Paslaugos') }}</a></li>
                    <li><a href="{{ url('/about')}}"> {{__('messages.ApieMus')}}</a></li>
                </ul>

            </div>
        </div>
<div class="container">
<div class="login">
<h1> {{__('messages.Prisijungti')}}</h1>
<form id="login" method="post" action="{{route('access')}}">

@if(Session::get('success'))
    <div class="alerts">
        {{Session::get('success')}}
    </div>
    @endif
    @if(Session::get('fail'))
    <div class="alertf">
        {{Session::get('fail')}}
    </div>
    @endif
    @csrf
        <label><b>{{__('messages.Gmail')}}</b></label>
        <input type="text" name="Email" id="email" placeholder="{{__('messages.Gmail')}}">
        <br>
        <span class="text-danger">@error('Email'){{ $message }}@enderror</span>
        <br><br>
        <label><b>{{__('messages.Password')}}
        </b>
        </label>
        <input type="Password" name="Password" id="Pass" placeholder="{{__('messages.Password')}}">
        <br>
        <span class="text-danger">@error('Password'){{ $message }}@enderror</span>
        <br><br>
        {{__('messages.Priminti')}} <a id=aa href="{{route('PasswordRemind')}}"> <b>{{__('messages.Slaptazodi')}}</b></a>
        <br>
        <br>
        <button type="submit" name="log" id="log" value="Prisijungti">{{__('messages.Prisijungti')}}</button>
        <br><br>
        {{__('messages.Paskyras')}}
        <br><br>
        <a id=aa href="{{ url('/reg') }}"><b>{{__('messages.Registruotis')}}<b></a>

    </form>

</div>
</div>

</div>

<footer id=#lastcontainer>{{__('messages.Copyrights')}}</footer>
</body>

</html>
