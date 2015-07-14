@include('partials.header')

<div class="hero">
    <div class="container hero-center">
        <h1 class="title hide-mobile"><img src="public/img/tramlines-text.png" /><br/><span style="color: #ed1c24; font-size: 1.4em;">Tramlines Festival Schedule Planner</span></h1>
        <p class="restrict-width">An easy to use planner for Tramlines. Tell us who you want to see, and we'll figure out where you need to be, and if there's any clashes. Alternatively, see the whole schedule and pick what you want to see!</p>
        <p class="restrict-width">See your schedule, share it with friends, and even enter your friends' email address to see which gigs you're both going to!</p>

        <div class="pure-g select-box-grid">
            <a href="{{ action('ByArtistController@show') }}" class="pure-u-md-1-3 pure-u-1 select-box-a">
                <div class="pure-u-1">
                    <div class="select-box">
                        <h2>By Artist</h2>
                        <p>Plan your weekend by selecting your favourite artists - we'll figure out your schedule</p>
                    </div>
                </div>
            </a>

            <a href="{{ action('ByTimeController@show') }}" class="pure-u-md-1-3 pure-u-1 select-box-a">
                <div class="pure-u-1">
                    <div class="select-box">
                        <h2>By Time</h2>
                        <p>Plan your weekend by seeing the times and selecting who you want to see</p>
                    </div>
                </div>
            </a>

            <div class="pure-u-md-1-3 pure-u-1">
                <div class="select-box">
                    <h2>Already Planned?</h2>
                    <p>Sign in here to see and change your schedule</p>
                    <form class="pure-form pure-form-stacked">
                        <fieldset class="pure-group">
                            <input type="text" placeholder="Email" class="pure-input-1" />
                            <input type="password" placeholder="Password" class="pure-input-1" />
                        </fieldset>
                        <button class="pure-button pure-input-1">Sign In</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('partials.footer')