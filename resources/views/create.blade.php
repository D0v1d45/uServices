<!DOCTYPE html>
<html>
<head>
    <title>{{__('messages.Paslaugos')}}</title>
    <link href="css/addservice.css" rel="stylesheet">
</head>
<body>

<div class="banner">

            <div class="navbar">
                <ul>
                    <li><a href="{{ route('home') }}"> {{ __('messages.Pradzia') }}</a></li>
                <li><a href="{{ route('index') }}"> {{__('messages.Paslaugos')}}</a></li>
                    <li><a href="{{ url('/about')}}">{{__('messages.ApieMus')}}</a></li>
                </ul>

            </div>
        </div>
<div class="container">
<div class="services">
    <div class="formcontainer">
        <h2>{{__('messages.PridetiP')}}</h2>
        <form method="POST" action="{{ route('store') }}">
            @csrf
            <div class="form-group">
                <label for="category">{{__('messages.Kategorija')}}:</label>
                <select  name="category" id="category" required>

                    <option value="Plaukų paslaugos">{{__('messages.Plauku')}}</option>
                    <option value="Grožio paslaugos">{{__('messages.Grozio')}}</option>
                    <option value="Auomobilių paslaugos">{{__('messages.Automobiliu')}}</option>
                    <option value="Dantų priežiūra">{{__('messages.Dantu')}}</option>
                    <option value="Karate užsiėmimai">{{__('messages.Karate')}}</option>
                    <option value="Sporto paslaugos">{{__('messages.Sporto')}}</option>
            </select>
            </div>
            <div class="form-group">
                <label for="provider">{{__('messages.Teikejas')}}:</label>
                <input type="text" name="provider" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="service">{{__('messages.TPaslaugos')}}:</label>
                <input type="text" name="service" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="address">{{__('messages.Adresas')}}</label>
                <input type="text" name="address" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">{{__('messages.Prideti')}}</button>
        </form>

    </div>
    <div class="lastcontainer">
        <footer>{{ __('messages.Copyrights') }}</footer>
    </div>
    </div>

</body>

    </html>

