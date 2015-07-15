@include('partials.header')

<div class="content">
    <div class="container">

        <h2>Compare <span class="tram-red">Tramlines</span> Schedules</h2>

        @if($user_1->id==$user_2->id)
            <h1 class="tram-red">Yes smartarse, surprisingly the same person is going to all the same events as... themselves.</h1>
            <p>Really, what were you expecting. Don't you have things to be doing...? Someone to abuse via Twitter maybe? Bettery et, why don't you ask Siri what zero divided by zero is. I feel the same way as she does.</p>
        @else
            <h1 class="tram-red">{{ $user_1->name }} <span style="color: #fff;">and</span> {{ $user_2->name }}</h1>
            <h3>You're both going to <span class="noOfEventsSelected tram-red">{{ $timings->count() }}</span> events!</h3>

            @include('partials.schedule')
        @endif

        <a href="{{ action('ScheduleController@compare') }}" class="tram-button pure-u-1">Compare Another</a>

    </div>
</div>

@include('partials.footer')