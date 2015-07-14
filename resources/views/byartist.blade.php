@include('partials.header')

<div class="content">
    <div class="container">

        <h2>Plan your <span class="tram-red">Tramlines</span> schedule by Artist</h2>
        <p>Below are all the artists that will be appearing at Tramlines 2015 - simply select the ones you would like to see, and we'll create your schedule for you, and even warn you about any clashes.</p>

        <h3>Current Number of Artists Selected: <span class="noOfArtistsSelected tram-red">0</span></h3>
        <div class="pure-g artist-box-grid">
            <div class="pure-u-1-2 pure-u-md-1-4 artist-box">
                <div class="artist-name">
                    <h3>A Guy Called Gerald</h3>
                </div>
            </div>

            <div class="pure-u-1-2 pure-u-md-1-4 artist-box">
                <div class="artist-name">
                    <h3>A Kid / 20 Hz Soundsystem</h3>
                </div>
            </div>

            <div class="pure-u-1-2 pure-u-md-1-4 artist-box">
                <div class="artist-name">
                    <h3>Alcest</h3>
                </div>
            </div>

            <div class="pure-u-1-2 pure-u-md-1-4 artist-box">
                <div class="artist-name">
                    <h3>Anathema</h3>
                </div>
            </div>

            <div class="pure-u-1-2 pure-u-md-1-4 artist-box">
                <div class="artist-name">
                    <h3>And So I watch You From Afar</h3>
                </div>
            </div>

            <div class="pure-u-1-2 pure-u-md-1-4 artist-box">
                <div class="artist-name">
                    <h3>Andy H</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".artist-box-grid").on("click", ".artist-name", selectArtist);
    });

    function selectArtist(event) {
        var artistBox = $(event.currentTarget);
        artistBox.toggleClass("artist-name-selected");
        var numberSelected = $(".artist-name-selected").length;
        $(".noOfArtistsSelected").html(numberSelected);
    }
</script>

@include('partials.footer')