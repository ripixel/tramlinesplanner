@include('partials.header')

<div class="hero">
    <div class="container hero-center">

        @if (count($errors) > 0)
            <div class="artist-schedule-box restrict-width" style="margin-bottom: 20px;">
                <div class="artist-name"><h3>Whoops!</h3></div>
                <p>Something went wrong...<br/>
                    @foreach ($errors->all() as $error)
                        <br/><span class="tram-red">{{ $error }}</span>
                    @endforeach
                </p>
            </div>
        @endif

        <div class="artist-schedule-box restrict-width" style="margin-bottom: 20px;">
            <div class="artist-name artist-name-selected"><h3>Already with us?</h3></div>
            <form style="padding: 20px;" class="pure-form" role="form" method="POST" action="{{ url('/auth/login') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <label for="email" class="pure-u-1">E-Mail Address</label>
                <input type="email" class="pure-input-1" name="email" placeholder="Email" value="{{ old('email') }}">

                <label for="password" class="pure-u-1">Password</label>
                <input type="password" class="pure-input-1" placeholder="Password" name="password">

                <label class="pure-u-1">
                    <input type="checkbox" name="remember"> Remember Me
                </label>

                <button type="submit" class="tram-button tram-button-green pure-u-1">Login</button>
            </form>
        </div>

        <div class="artist-schedule-box restrict-width">
            <div class="artist-name"><h3>Need to Sign Up?</h3></div>
            <form style="padding: 20px;" class="pure-form" role="form" method="POST" action="{{ url('/auth/register') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <p>We will never ever spam you. Hell, you won't get even one email from us. This is literally so we know who's schedule is who's!</p>

                <label for="name" class="pure-u-1">Name</label>
                <input type="text" class="pure-input-1" placeholder="Full Name" name="name" value="{{ old('name') }}">

                <label for="email" class="pure-u-1">E-Mail Address</label>
                <input type="email" class="pure-input-1" placeholder="Email" name="email" value="{{ old('email') }}">

                <label for="password" class="pure-u-1">Password</label>
                <fieldset class="pure-group">
                    <input type="password" class="pure-input-1" name="password" placeholder="Password">
                    <input type="password" class="pure-input-1" name="password_confirmation" placeholder="Confirm Password">
                </fieldset>

                <button type="submit" class="tram-button pure-u-1">Register</button>
            </form>
        </div>

    </div>
</div>
@include('partials.footer')