<!DOCTYPE html>
<html>
<head>
    <link href="css/logins.css" rel="stylesheet">
</head>
<body>

<div class="banner">

    <div class="navbar">
        <ul>
            <li><a href="{{ url('/homepage')}}"> {{ __('messages.Pradzia') }}</a></li>
            <li><a href=""> {{ __('messages.Paslaugos') }}</a></li>
            <li><a href="{{ url('/about')}}">{{ __('messages.ApieMus') }}</a></li>
        </ul>
    </div>
</div>

<div class="container">
    <div class="login">
        <h1> {{ __('messages.Profilis') }} {{$UserInfo['username']}}</h1>
        <!DOCTYPE html>
<html>

<body>
@if (session('success'))
        <div class="alerts alert-success">
            {{ session('success') }}
        </div>
    @endif
<form method="POST" action="{{ route('update') }}">
        @csrf

        <div class="form-group">
            <label id=email for="email"><b>{{ __('messages.Gmail') }}:</b></label>
            <input type="email" name="email" value="{{ $UserInfo->email }}" class="form-control" pattern="^[a-zA-Z0-9._%+-]+@gmail\.com$" >
        </div>
        <div class="form-group">
            <label for="pnumber"><b>{{ __('messages.Telefonas') }}:</b></label>
            <input type="text" name="pnumber" value="{{ $UserInfo->pnumber }}" class="form-control" pattern="[0-9]*">
        </div>
        <div class="form-group">
            <label id=provider for="provider"><b>{{ __('messages.Teikti') }}:</b></label>
            <input type="text" name="provider" value="{{ $UserInfo->category->provider }}" class="form-control" pattern="[A-Za-z]+">
        </div>
        <br>
        <button type="submit" id="log">{{ __('messages.AtnaujintiProfili') }}</button>
    </form>

        </form>
    </div>
</div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<footer id="lastcontainer">{{ __('messages.Copyrights') }}</footer>
</body>
</html>
