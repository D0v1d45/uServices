<!DOCTYPE html>
<html>
<head>
    <title>Prisijungimas</title>
    <link rel="stylesheet" href="{{ asset('css/logins.css') }}">
</head>
<body>

<div class="banner">
        </div>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
<div class="container">
<div class="login">
<h1> {{__('messages.Slap')}}</h1>
<form id="login" method="post" action="{{ route('PasswordResetPost') }}">
    @csrf
    <label><b>{{__('messages.Gmail')}}</b></label>
    <input type="text" name="email" id="email" placeholder="{{__('messages.Gmail')}}" value="{{ $email ?? '' }}" readonly>
    <br>
    <label><b>{{__('messages.Password')}}</b></label>
    <input type="password" name="password" id="Pass" placeholder="{{__('messages.Password')}}">
    <br>
    <label><b>{{__('messages.Rpassword')}}</b></label>
    <input type="password" name="rpassword" id="Pass" placeholder="{{__('messages.Rpassword')}}">
    <br>
    <span class="text-danger">@error('Email'){{ $message }}@enderror</span>
    <br><br>
    <button type="submit" value="Pateikti">{{__('messages.Pateikti')}}</button>
</form>

</div>
</div>

</div>

<footer id=#lastcontainer>{{__('messages.Copyrights')}}</footer>
</body>

</html>
