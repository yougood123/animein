<?php
// Step 1: Extract the REQUEST_URI parameter
$request_uri = $_SERVER['REQUEST_URI'];

// Step 2: Extract the desired part of the URI
$uri_parts = explode('/', $request_uri);
$theuriiwant = end($uri_parts);

// Step 3: Construct the API URL
$api_url = "https://webdis-0cel.onrender.com/vidcdn/watch/" . $theuriiwant;

try {
    // Step 4: Make an HTTP request and retrieve the JSON response
    $response = file_get_contents($api_url);

    if ($response === false) {
        throw new Exception("Failed to fetch JSON response");
    }

    // Add CORS headers to allow cross-origin requests
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type');

    // Step 5: Decode the JSON response
    $json_data = json_decode($response, true);

    if ($json_data === null) {
        throw new Exception("Failed to decode JSON response");
    }

    // Step 6: Retrieve video sources
    $sources = $json_data['sources'];

    // Step 7: Get the default video URL (first source)
    $video_url = $sources[0]['file'];
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
<!-- Rest of the HTML and JavaScript code remains unchanged -->

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="mssmarttagspreventparsing" content="true">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="chrome=1">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-cache">
    <link rel="icon" type="image/x-icon" href="https://animein.fun/favicon.ico" />
    <!-- JS Files -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://animein.fun/player2/jwplayer/hls.light.min.js"></script>
    <script src="https://animein.fun/player2/jwplayer/provider.hlsjs.js"></script>
    <script src="https://animein.fun/player2/jwplayer/jwplayer.js"></script>
    <!-- CSS Files -->
    <link rel="stylesheet" type="text/css" href="https://animein.fun/player2/jwplayer/player_style.css">
    <link rel="stylesheet" type="text/css" href="https://animein.fun/player2/jwplayer/codenine_skin.css">
    <!-- JWPlayer License -->
    <script type="text/javascript">jwplayer.key="64HPbvSQorQcd52B8XFuhMtEoitbvY/EXJmMBfKcXZQU2Rnn"</script>
</head>
<body>
    <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="circle-line">
            <div class="circle-blue">&nbsp;</div>
            <div class="circle-red">&nbsp;</div>
            <div class="circle-green">&nbsp;</div>
            <div class="circle-yellow">&nbsp;</div>
        </div>
    </div>
    <div id="codenine_player"></div>

    <script>
        var p2pConfig = {
            logLevel: 'debug',
            live: false, // set to false in VOD mode        
        };

        if (!Hls.P2pEngine.isMSESupported() || Hls.P2pEngine.getBrowser() === 'Mac-Safari') {
            new Hls.P2pEngine.ServiceWorkerEngine(p2pConfig);
        }

        jwplayer('codenine_player').setup({
            file: 'https://cors-anywhere-production-d96c.up.railway.app/<?php echo $video_url; ?>',
            autostart: true,
            stretching: "uniform",
            aspectratio: "16:9",
            displaydescription: true,
            abouttext: "AnimeIN",
            image: "",
            playbackRateControls: true,
            sharing: {
                sites: ["facebook", "twitter", "email", "linkedin", "pinterest"]
            },
            advertising: {
                client: "vast",
                schedule: {
                    adbreak1: {
                        offset: "pre",
                        tag: "#",
                        skipoffset: 5
                    },
                    adbreak2: {
                        offset: "10%",
                        tag: "#",
                        type: "nonlinear"
                    },
                },
            },
            logo: {
                file: "https://animein.fun/files/images/logo.png",
                position: "top-right",
                link: "#",
            },
            skin: {
                controlbar: {
                    "icons": "#05D1D2",
                    "iconsActive": "#fff"
                },
                timeslider: {
                    "progress": "#fff",
                }
            },
            hlsjsdefault: true,
            hlsjsConfig: {
                p2pConfig
            },
        });

        setTimeout(function () {
            $("#loader").delay(1000).fadeOut("slow");
            $("#loader-wrapper").delay(1500).fadeOut("slow");
        }, 2000);
    </script>
</body>
</html>
