<div class="header">
    <div class="container">
        <a href="{{ action('HomeController@show') }}"><h1><span style="color: #ed1c24;">Tramlines Festival</span> <span>Event Planner</span></h1></a>
        @php $user = Auth::user();
        <a href="{{ action('ByArtistController@show') }}"><h2 class="header-item {{ str_contains(strtoupper(Route::current()->getUri()), 'PLAN/ARTIST') ? 'header-item-active' : null }}">By Artist</h2></a>
        <a href="{{ action('ByTimeController@show') }}"><h2 class="header-item {{ str_contains(strtoupper(Route::current()->getUri()), 'PLAN/TIME') ? 'header-item-active' : null }}">By Time</h2></a>
        @if($user!== null)
            <a href="{{ action('ScheduleController@show') }}"><h2 class="header-item {{ str_contains(strtoupper(Route::current()->getUri()), 'SCHEDULE') ? 'header-item-active' : null }}">Your Schedule</h2></a>
        @endif
        <a href="{{ action('ScheduleController@compare') }}"><h2 class="header-item {{ str_contains(strtoupper(Route::current()->getUri()), 'COMPARE') ? 'header-item-active' : null }}">Compare Schedules</h2></a>
        @if($user!== null)
            <a href="{{ url('/auth/logout') }}"><h2 class="header-item">Logout</h2></a>
            <h4 style="margin: 5px 0;">Hey there <span class="tram-red">{{ $user->name }}</span>!</h4>
        @else
            <a href="{{ url('/auth/login') }}"><h2 class="header-item">Login</h2></a>
        @endif
    </div>
</div>