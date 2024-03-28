    <!DOCTYPE html>
<html>
<head>
    <title>{{__('messages.Paslaugos')}}</title>
    <link href="css/services.css" rel="stylesheet">
</head>
<body>

<div class="banner">

            <div class="navbar">
                <ul>
                <li><a href="{{ route('home')}}"> {{__('messages.Pradzia')}}</a></li>
                <li><a href="{{route('index')}}"> {{__('messages.Paslaugos')}}</a></li>
                    <li><a href="{{ url('/about')}}"> {{__('messages.ApieMus')}}</a></li>

                </ul>

            </div>
        </div>
<div class="container">
<div class="services">
<h1> {{__('messages.Paslaugos')}}</h1>
<table class="table">
    <a id="aa" href="{{route('create')}}"> {{__('messages.PridetiP')}} </a>
    <br>
    <h3> {{__('messages.Text3')}}</h3>
@csrf
<form action="{{ route('index') }}" method="get">
        <select name="selected_option" id="selected_option">
            <option value="Visos paslaugos" selected> {{__('messages.VPaslaugos')}}</option>
            <option value="Plaukų paslaugos">{{__('messages.Plauku')}}</option>
            <option value="Grožio paslaugos">{{__('messages.Grozio')}}</option>
            <option value="Auomobilių paslaugos">{{__('messages.Automobiliu')}}</option>
            <option value="Dantų priežiūra">{{__('messages.Dantu')}}</option>
            <option value="Karate užsiėmimai">{{__('messages.Karate')}}</option>
            <option value="Sporto paslaugos">{{__('messages.Sporto')}}</option>
        </select>
        <button type="submit"> {{__('messages.Ieskoti')}}</button>
        <tbody>
            <h2> {{__('messages.Text4')}}: {{ $selectedOption ?: __('messages.VPaslaugos') }}</h2>
    <ul>
    <thead>
                <tr>
                    <th> {{__('messages.Kategorija')}}</th>
                    <th> {{__('messages.Teikejas')}}</th>
                    <th> {{__('messages.TPaslaugos')}}</th>
                    <th> {{__('messages.Adresas')}}</th>
                </tr>


            </thead>
    <tbody>
        @forelse ($data as $item)
        <tr>
            <td>{{ $item->category }}</td>
            <td><a href="{{ route('show', ['id' => $item->id]) }}">{{ $item->provider }}</a></td>

            <td>{{ $item->service }}</td>
            <td>{{ $item->address}}</td>
        </tr>
    @empty
        <tr>
            <tr style="background-color: white; color: red;">
            <td colspan="3">
                <h2>{{ __('messages.NeraPaslaugu') }}</h2>
            </td>
        </tr>
    @endforelse
        </tbody>
    </table>

</div>
</div>
    </form>


</div>
<div class="lastcontainer">
<footer>{{__('messages.Copyrights')}}</footer>
</div>
</body>

</html>

