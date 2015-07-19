@include('partials.header')

<div class="content">
    <div class="container">

        <h2>{{ $user->name }} has organised their <span class="tram-red">Tramlines</span> Schedule</h2>

        <h3>They're is going to <span class="noOfEventsSelected tram-red">{{ $timings->count() }}</span> events!</h3>
        @include('partials.schedule')

        @if (Auth::user()!==null)
            @php $logged_user = Auth::user();
            <a href="{{ action('ScheduleController@compareShow', [ 'share_str_1' => $user->share_str, 'share_str_2' => $logged_user->share_str]) }}" class="pure-u-1 tram-button">Compare to my Schedule</a>
        @else
            <h2>Want to figure out your own schedule?</h2>
            <div class="pure-g center-me">
                <a href="{{ action('ByArtistController@show') }}" class="pure-u-md-1-2 pure-u-1 select-box-a">
                    <div class="pure-u-1">
                        <div style="min-height: 0;" class="select-box">
                            <h2>Plan By Artist</h2>
                            <p>Plan your weekend by selecting your favourite artists - we'll figure out your schedule</p>
                        </div>
                    </div>
                </a>

                <a  href="{{ action('ByTimeController@show') }}" class="pure-u-md-1-2 pure-u-1 select-box-a">
                    <div class="pure-u-1">
                        <div style="min-height: 0;" class="select-box">
                            <h2>Plan By Time</h2>
                            <p>Plan your weekend by seeing the times and selecting who you want to see</p>
                        </div>
                    </div>
                </a>
            </div>
        @endif
    </div>
</div>

@include('partials.footer')