@include('partials.header')

<div class="content">
    <div class="container">

        <h2>Your <span class="tram-red">Tramlines</span> Schedule</h2>
        <p>Below are all the events you've said you're going to see at Tramlines 2015. If there's any clashes we'll let you know - we can't have you missing any brilliant shows now can we!</p>
        <h4>Share this link to show your friends where you're going:
            <form class="pure-form"><input class="pure-input-1" readonly type="text" value="{{ Request::url().'/'.$user->share_str }}" /></form>
        </h4>

        <h3>You're going to <span class="noOfEventsSelected tram-red">{{ $timings->count() }}</span> events!</h3>
        @include('partials.schedule')

        <a style="margin-top: 20px;" href="{{ action('ScheduleController@compare') }}?mycode={{ $user->share_str }}" class="pure-u-1 pure-button">Compare my Schedule</a>
    </div>
</div>

@include('partials.footer')