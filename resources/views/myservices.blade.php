<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/services.css') }}">
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
    <div class="services">
        <div class="container">

            <table>
                <tr>
                    <h1 id="centerh1">{{ __('messages.Mpaslaugos') }}</h1>

                    <form method="GET" action="{{ route('myclients') }}">
                        @csrf
                        <label for="username"><b>{{ __('messages.Filtravimasvard') }}</b></label>
                        <input type="text" name="username" id="username" placeholder="{{ __('messages.IveskiteV') }}">
                        <button type="submit">{{ __('messages.Filtruoti') }}</button>
                    </form>
                        <table>
                            <thead>
                            <tr>
                                <th>{{ __('messages.Teikejas') }}</th>
                                <th>{{ __('messages.Klientas') }}</th>
                                <th>{{ __('messages.Telefonas') }}</th>
                                <th>{{ __('messages.Paslauga') }}</th>
                                <th>{{ __('messages.Bdata') }}</th>
                                <th>{{ __('messages.Blaikas') }}</th>
                                <th>{{ __('messages.Veiksmai') }}</th>
                            </tr>
                            </thead>
                            <tbody>

@foreach ($reservations as $reservation)
    <tr>
        <td>{{ $reservation->service->addService->provider }}</td>
        <td>{{ $reservation->user->username }}</td>
        <td>{{ $reservation->user->pnumber }}</td>
        <td>{{ $reservation->service->service }}</td>
        <td>{{ $reservation->booking_date}}</td>
        <td>{{ $reservation->booking_time }}</td>

        <td>
            <a href="{{ route('cancel-reservation', ['id' => $reservation->id]) }}">{{ __('messages.Atsaukti') }}</a>
        </td>
    </tr>
@endforeach

                            </tbody>
                        </table>
                        @if(session('success'))
                        <div class="alert">
                           <h1>{{ session('success') }}</h1>
                                               </div>
                    @endif
                </div>
                <div class="lastcontainer">
                    <footer>{{ __('messages.Copyrights') }}</footer>
                </div>
            </div>
        </div>
    </body>
</html>
