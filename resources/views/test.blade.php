
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{ asset('css/logins.css') }}">
</head>
<body>

<div class="banner">

            <div class="navbar">
            </div>
        </div>
<div class="container">
<div class="login">
<h1> {{__('messages.Slap')}}</h1>
<form id="login" method="post" action="{{route('PasswordRemindPost')}}">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @csrf
        <label><b>{{__('messages.Gmail')}}</b></label>
        <input type="text" name="email" id="email" placeholder="{{__('messages.Gmail')}}">
        <br>
        <span class="text-danger">@error('Email'){{ $message }}@enderror</span>
        <br><br>

        <button type="submit" id="log" value="Submit">{{__('messages.Pateikti')}}</button>
    </form>
</div>
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
<br>
<footer id=#lastcontainer>{{__('messages.Copyrights')}}</footer>
</body>

</html>
