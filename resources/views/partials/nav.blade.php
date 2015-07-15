<div class="header">
    <div class="container">
        <a href="{{ action('HomeController@show') }}"><h1><span style="color: #ed1c24;">Tramlines Festival</span> <span>Schedule Planner</span></h1></a>
        <a href="{{ action('ByArtistController@show') }}"><h2 class="header-item {{ str_contains(strtoupper(Route::current()->getUri()), 'PLAN/ARTIST') ? 'header-item-active' : null }}">Plan by Artist</h2></a>
        <a href="{{ action('ByTimeController@show') }}"><h2 class="header-item {{ str_contains(strtoupper(Route::current()->getUri()), 'PLAN/TIME') ? 'header-item-active' : null }}">Plan by Time</h2></a>
        <a href="{{ action('ScheduleController@show') }}"><h2 class="header-item {{ str_contains(strtoupper(Route::current()->getUri()), 'SCHEDULE') ? 'header-item-active' : null }}">Your Schedule</h2></a>
        <a href="{{ action('ScheduleController@compare') }}"><h2 class="header-item {{ str_contains(strtoupper(Route::current()->getUri()), 'COMPARE') ? 'header-item-active' : null }}">Compare Schedules</h2></a>
    </div>
</div>