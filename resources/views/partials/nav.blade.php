<div class="header">
    <div class="container">
        <a href="{{ action('HomeController@show') }}"><h1><span style="color: #ed1c24;">Tramlines Festival</span> <span>Schedule Planner</span></h1></a>
        <a href="{{ action('ByArtistController@show') }}"><h2 class="header-item {{ starts_with(Route::current()->getUri(), 'ByArtist') ? 'header-item-active' : null }}">Plan by Artist</h2></a>
        <a href="{{ action('ByTimeController@show') }}"><h2 class="header-item {{ starts_with(Route::current()->getUri(), 'ByTime') ? 'header-item-active' : null }}">Plan by Time</h2></a>
        <a href="my-schedule.html"><h2 class="header-item {{ starts_with(Route::current()->getUri(), 'MySchedule') ? 'header-item-active' : null }}">Sign In</h2></a>
    </div>
</div>