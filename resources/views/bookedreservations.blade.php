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
            <h1 id="centerh1">{{ __('messages.Mrezervacijos') }}</h1>

            @if($userReservations->count() === 0)
                <p>{{ __('messages.Nrezervaciju') }}</p>
            @else
            <form method="get" action="{{ route('booked-reservations') }}">
                <label for="provider">{{ __('messages.Teikejas') }}:</label>
                <select name="provider" id="provider">
                    <option value="">{{ __('messages.Visi') }}</option>
                    @php
                        $encounteredProviders = [];
                    @endphp

                    @foreach($userReservations as $reservation)
                        @if ($reservation->service && $reservation->service->addService)
                            @php
                                $provider = $reservation->service->addService->provider;
                            @endphp

                            @if (!in_array($provider, $encounteredProviders))
                                <option value="{{ $provider }}">{{ $provider }}</option>
                                @php
                                    $encounteredProviders[] = $provider;
                                @endphp
                            @endif
                        @endif
                    @endforeach
                </select>
                <button type="submit">{{ __('messages.Filtruoti') }}</button>
            </form>
                <table>
                    <thead>
                    <tr>
                        <th>{{ __('messages.Teikejas') }}</th>
                        <th>{{ __('messages.Telefonas') }}</th>
                        <th>{{ __('messages.Paslauga') }}</th>
                        <th>{{ __('messages.Bdata') }}</th>
                        <th>{{ __('messages.Blaikas') }}</th>
                        <th>{{ __('messages.Veiksmai') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($userReservations as $reservation)
                        <tr>
                            <td>
                                @if ($reservation->service && $reservation->service->addService)
                                {{ $reservation->service->addService->provider }}<br>
                                @else
                                {{ __('messages.Error1') }}<br>
                                @endif

                            </td>
                            <td>{{$reservation->service->category->user->pnumber}}</td>

                            <td>
                                @if ($reservation->service)
                                    {{ $reservation->service->service }}
                                @else
                                {{ __('messages.Error1') }}
                                @endif
                            </td>
                            <td>{{ $reservation->booking_date }}</td>
                            <td>{{ $reservation->booking_time }}</td>
                            <td><a href="{{ route('cancel-reservation', ['id' => $reservation->id]) }}">{{ __('messages.Atsaukti') }}</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif

            @if(session('success'))
                <h1 class="alert">{{session('success')}}</h1>
            @endif
        </div>

        <div class="lastcontainer">
            <footer>{{ __('messages.Copyrights') }}</footer>
        </div>
    </div>
</div>

</body>
</html>
