<!DOCTYPE html>
<html>
<head>
    <title>{{__('messages.Paslaugos')}}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/services.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<div class="banner">
    <div class="navbar">
        <ul>
            <li><a href="{{ route('home')}}"> {{__('messages.Pradzia')}}</a></li>
            <li><a href="{{ route('index')}}"> {{__('messages.Paslaugos')}}</a></li>
            <li><a href="{{ url('/about')}}"> {{__('messages.ApieMus')}}</a></li>
        </ul>
    </div>
</div>

<div class="container">
    <div class="services">
        <div class="container">
            <br>
            @if($permissionAdd)

                <a id="aa" href="{{ route('createservice', ['providerId' => $item->id]) }}">{{__('messages.PridetiP')}}</a>
            @endif
            <h2>{{__('messages.Provider')}} {{ $item->provider }}</h2>
            <form method="get" action="">
                @csrf
                <label for="min_price">{{__('messages.Min')}}:</label>
                <input type="number" name="min_price" id="min_price" value="{{ request('min_price') }}" min="0">

                <label for="max_price">{{__('messages.Max')}}:</label>
                <input type="number" name="max_price" id="max_price" value="{{ request('max_price') }}" min="0">

                <button type="submit">{{__('messages.Filtruoti')}}</button>
            </form>
            <table>
                <tr>
                    <th>{{__('messages.Paslauga')}}</th>
                    <th>{{__('messages.Kaina')}}</th>

                    <th>{{__('messages.Laikas')}}</th>
                    <th>{{__('messages.Kalendorius')}}</th>
                    <th>{{__('messages.Veiksmai')}}</th>
                    @if($userRole == 2)
                    <th>{{__('messages.AdmVeiksmai')}}</th>
                    @endif

                </tr>
                @foreach ($item->services as $service)

    <tr>
        <td>{{ $service->service }}</td>
        <td>
            {{$service->price }}
            @if($item->user_id == $userInfo->id)
            <form method="post" action="{{ route('updatePrice', ['id' => $service->id]) }}">
                @csrf
                <input type="number" name="price" value="{{ $service->price }}" class="form-control">
                <button type="submit">{{ __('messages.AtnaujintiKaina') }}</button>
            </form>
            @endif

        </td>
        <td>{{ $service->time }}</td>
        <td>
            <form method="post" action="{{ route('book-service', ['serviceId' => $service->id]) }}" onsubmit="return validateForm()">
                @csrf
                <input type="hidden" name="service_id" value="{{ $service->id }}">

                <label for="booking_date">{{ __('messages.Data') }}</label>
                <input type="date" name="booking_date" id="booking_date" min="{{ now()->format('Y-m-d') }}" required>

                <label for="booking_time">{{ __('messages.Time') }}:</label>
                <select name="booking_time" id="booking_time" required>
                    @for ($i = 8; $i <= 17; $i++)
                        @php
                            $formattedTime = sprintf("%02d:00:00", $i);
                            $selectedDate = old('booking_date') ?? now()->format('Y-m-d');
                            $formattedDateTime = $selectedDate . ' ' . $formattedTime;
                            $disabled = in_array($formattedDateTime, $bookedSlots) ? 'disabled' : '';
                            $class = $disabled ? 'disabled-time' : '';
                        @endphp
                        <option value="{{ $formattedTime }}" {{ $disabled ? 'disabled' : '' }} class="{{ $class }}">
                            {{ $formattedTime }}
                        </option>
                    @endfor
                </select>

                <td>
                    <button type="submit">{{ __('messages.Rezervuoti') }}</button>
                </td>
            </form>


        </td>


</form>

                                @if($userRole == 2)
                                <td>

                                    <form method="post" action="{{ route('update-service', ['id' => $service->id]) }}">
                                        @csrf
                                        <input type="text" name="new_service_name" placeholder="{{__('messages.NaujasPav')}}">
                                        <button type="submit">{{__('messages.AtnaujintiPav')}}</button>
                                    </form>
                                    <form method="post" action="{{ route('remove-service', ['id' => $service->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">{{__('messages.SalintiPaslauga')}}</button>
                                    </form>
                                @endif
                            </form>

                        </td>
                    </tr>
                @endforeach


            </table>
            @if(session('success'))
            <h1 class="alert">{{ session('success') }}</h1>
        @endif
        @if(session('fail'))
            <h1 class="error">{{ session('fail') }}</h1>
        @endif


        </div>
        <div class="lastcontainer">
            <footer>{{__('messages.Copyrights')}}</footer>
        </div>
    </div>
</div>

</body>
</html>
