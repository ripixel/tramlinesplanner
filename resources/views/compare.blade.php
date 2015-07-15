@include('partials.header')

<div class="content">
    <div class="container">

        <h2>Compare <span class="tram-red">Tramlines</span> Schedules</h2>
        <p>Enter the share code or address of your friends' schedule, and we'll tell you what you're both going to!</p>

        <h4 class="pure-u-1">Enter the two share codes you want to compare (case sensitive):
            <form class="pure-form">
                <fieldset class="pure-group">
                    <input id="first-share" class="pure-input-1" type="text" placeholder="First Share Code/Link"/>
                    <input id="second-share" class="pure-input-1" type="text" placeholder="Second Share Code/Link"/>
                </fieldset>
            </form>
        </h4>

        <a onclick="redirectToCompare();" class="pure-button pure-u-1">Compare</a>

    </div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript">
    function redirectToCompare() {
        var firstCode = $("#first-share").val();
        var secondCode = $("#second-share").val();
        if(firstCode!="" && secondCode!="") {
            firstCode = firstCode.substr(firstCode.length - 5);
            secondCode = secondCode.substr(secondCode.length - 5);
            console.log(window.location.href + "/" + firstCode + "/" + secondCode);
            if (window.location.href.indexOf('?') > 0) {
                window.location.replace(window.location.href.substr(0, window.location.href.indexOf('?')) + "/" + firstCode + "/" + secondCode);
            } else {
                window.location.replace(window.location.href + "/" + firstCode + "/" + secondCode);
            }
        }
    }

    $(document).ready(function() {
        if(getParameterByName('mycode')!='') {
            $("#first-share").val(getParameterByName('mycode'));
        }
    });

    function getParameterByName(name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
                results = regex.exec(location.search);
        return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }
</script>

@include('partials.footer')