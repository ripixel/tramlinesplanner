@include('partials.header')

<div class="content">
    <div class="container">

        <h2>Shared <span class="tram-red">Tramlines</span> Schedule</h2>
        <p>Below are all the events that {{ $user->name }} has said they're going to at Tramlines 2015. Create your own schedule using the links above, or use the "Compare Schedules" link if you already have one, and we'll tell you if you're both going to the same things!</p>

        <h3>{{ $user->name }} is going to <span class="noOfEventsSelected tram-red">{{ $timings->count() }}</span> events!</h3>
        @include('partials.schedule')
    </div>
</div>

@include('partials.footer')