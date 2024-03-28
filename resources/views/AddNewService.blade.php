<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" type="text/css" href="{{asset('css/addservice.css')}}">
</head>
<body>

<div class="banner">

            <div class="navbar">
                <ul>
                    <li><a href="{{ route('home') }}"> {{ __('messages.Pradzia') }}</a></li>
                    <li><a href="{{ route('index') }}"> {{ __('messages.Paslaugos') }}</a></li>
                    <li><a href="{{ url('/about') }}"> {{ __('messages.ApieMus') }}</a></li>

                </ul>

            </div>
        </div>
<div class="container">
    <div class="formcontainer">
<form action="{{ route('storeservice') }}" method="post">
    @csrf

    <div class="form-group">
        <label for="provider_id">{{ __('messages.Imone') }}</label>
        <p id="aaa"><b>{{ $dataMain->provider }}</b></p>
        <input type="hidden" name="provider_id" value="{{ $providerId }}">
    </div>

    <div class="form-group">
        <label for="service">{{ __('messages.PaslaugosPav') }}</label>
        <input type="text" name="service" class="form-control" id="service" required>
    </div>

    <div class="form-group">
        <label for="price">{{ __('messages.Kaina') }}</label>
        <input type="text" name="price" class="form-control" id="price" required>
    </div>

    <div class="form-group">
        <label for="time">{{ __('messages.Laikas') }}</label>
        <input type="text" name="time" class="form-control" id="time" required>
    </div>

    <button type="submit" class="btn btn-primary">{{ __('messages.PridetiP') }}</button>
</form>

</div>
<div class="lastcontainer">
    <footer>{{ __('messages.Copyrights') }}</footer>
</div>
</div>

</body>
</html>

