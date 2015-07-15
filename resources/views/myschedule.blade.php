@include('partials.header')

<div class="content">
    <div class="container">

        <h2>Your <span class="tram-red">Tramlines</span> Schedule</h2>

        @if($timings->count() > 0)
            <p>Below are all the events you've said you're going to see at Tramlines 2015. If there's any clashes we'll let you know - we can't have you missing any brilliant shows now can we!</p>
            <h4>Share this link to show your friends where you're going:
                <form class="pure-form"><input class="pure-input-1" readonly type="text" value="{{ Request::url().'/'.$user->share_str }}" /></form>
            </h4>

            @if(count($clashes)>0)
                <h3>Looks like you've got some clashes!</h3>
                <p>While looking at your schedule, we noticed you've got some overlaps...</p>
                <ul>
                    @foreach($clashes as $clash)
                        <li class="tram-red">{!! $clash !!}</li>
                    @endforeach
                </ul>
            @endif

            <h3>You're going to <span class="noOfEventsSelected tram-red">{{ $timings->count() }}</span> events!</h3>
            @include('partials.schedule')
        @else
            <h2>No events chosen yet - let's get planning!</h2>
            <div class="pure-g center-me">
                <a href="{{ action('ByArtistController@show') }}" class="pure-u-md-1-2 pure-u-1 select-box-a">
                    <div class="pure-u-1">
                        <div class="select-box">
                            <h2>Plan By Artist</h2>
                            <p>Plan your weekend by selecting your favourite artists - we'll figure out your schedule</p>
                        </div>
                    </div>
                </a>

                <a href="{{ action('ByTimeController@show') }}" class="pure-u-md-1-2 pure-u-1 select-box-a">
                    <div class="pure-u-1">
                        <div class="select-box">
                            <h2>Plan By Time</h2>
                            <p>Plan your weekend by seeing the times and selecting who you want to see</p>
                        </div>
                    </div>
                </a>
            </div>
        @endif

        <a href="{{ action('ScheduleController@compare') }}?mycode={{ $user->share_str }}" class="pure-u-1 tram-button">Compare my Schedule</a>
    </div>
</div>

@include('partials.footer')