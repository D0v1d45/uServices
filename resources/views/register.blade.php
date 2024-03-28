<!DOCTYPE html>
<html>
<head>
    <title>{{__('messages.Registracija')}}</title>
    <link href="css/register.css" rel="stylesheet">
</head>
<body>

<div class="banner">

            <div class="navbar">
                <ul>
                    <li><a href="{{url('/')}}"> {{__('messages.Pradzia')}}</a></li>
                    <li><a href="{{ url('/about')}}"> {{__('messages.ApieMus')}}</a></li>

                </ul>

            </div>
        </div>
<div class="container">
<div class="login">
<h1> {{__('messages.Registracija')}}</h1>
<form action="{{ route('getData')}}" method="post">
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
        <label><b>{{__('messages.Vartotojas')}}</b></label>
        <input type="text" name="Username" id="username" placeholder="{{__('messages.Vartotojas')}}*">
        <br>
        <span class="text-danger">@error('Username'){{ $message }}@enderror</span>
        <br>
        <br>
        <label><b>{{__('messages.Gmail')}}</b></label>
        <input type="text" name="Email" id="email" placeholder="{{__('messages.Gmail')}}*">
        <br>
        <span class="text-danger">@error('Email'){{ $message }}@enderror</span>
        <br><br>
        <label><b>{{__('messages.Password')}}
        </b>
        </label>
        <input type="Password" name="Password" id="Pass" placeholder="{{__('messages.Password')}}*">
        <br>
        <span class="text-danger">@error('Password'){{ $message }}@enderror</span>
        <br><br>
        <label><b> {{__('messages.Rpassword')}}
        </b>
        </label>
        <input type="Password" name="rPassword" id="Pass" placeholder="{{__('messages.Rpassword')}}*">
        <br>
        <span class="text-danger">@error('rPassword'){{ $message }}@enderror</span>
        <br>
        <label><b>{{__('messages.Telefonas')}}</b></label>
        <br>
        <input type="text" name="pnumber" id="pnumber" placeholder="{{__('messages.Telefonas')}}*">
        <br>
        <span class="text-danger">@error('pnumber'){{ $message }}@enderror</span>
        <br>
        <label for="checkbox"> {{__('messages.Sutinku')}} <a id="aa"  href="{{ url('/about') }}">{{__('messages.Taisykles')}}</a></label>
        <input type="checkbox" id="checkbox" name="checkbox">
        <br>
        <span class="text-danger">@error('checkbox'){{ $message }}@enderror</span>
        <br>
        <br>
        <button type="submit" id="log">{{__('messages.Registruotis')}}</button>
        <br><br>
        {{__('messages.Paskyra')}}
        <br>
        <br>
        <a id=aa href="{{ url('/login') }}"><b>{{__('messages.Prisijungti')}}<b></a>

    </form>
</div>
</div>

</div>
<footer id=#lastcontainer>{{__('messages.Copyrights')}}</footer>
</body>

</html>
