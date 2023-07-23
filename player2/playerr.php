
<!DOCTYPE html>

<html lang="en">
<head>

<link rel="stylesheet" href="style.css">
<meta name="robots" content="noindex, nofollow" />
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
</head>
<body>
<style>
    .wrap #player {
        position: absolute;
        height: 100% !important;
        weight: 100 !important;
    }

    .wrap .btn {
        position: absolute;
        top: 15%;
        left: 90%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        background-color: white;
        color: black;
        font-size: 12px;
        padding: 6px 12px;
        border: 1px solid white;
        cursor: pointer;
        border-radius: 5px;
    }

    @media screen and (max-width:600px) {
        .wrap .btn {
            font-size: 08px;
        }
    }
    </style>
<div class="wrap">
<div id="player"></div>
<div id="skipIntro"></div>
</div>
<script src="https://animein.fun/files/js/jwPlayer.js"></script>
<script>
    const urlParams = new URLSearchParams(window.location.search);
    const animeID = urlParams.get('id');
    let req = 'https://api-production-b294.up.railway.app'
    async function fetchMoviesJSON() {
    const animeIdFunction = await fetch(req + '/vidcdn/watch/' + animeID),
        oops = await animeIdFunction.json()
    return oops
    }


    fetchMoviesJSON().then(movies => {
        movies;
        var file = movies.sources[0].file
        file = 'https://cors-anywhere-production-d96c.up.railway.app/' + file


        const playerInstance = jwplayer("player").setup({
        controls: true,
        displaytitle: false,
        displaydescription: true,
        abouttext: "MangaTales",
        autostart: true,
        skin: {
            name: "netflix"
        },
        

        logo: {
            file: "",
            link: ""
        },

        playlist: [{
            title: "deez",
            description: "You're Watching:",
            image: "https://artworks.thetvdb.com/banners/v4/episode/361887/screencap/604df7d3ecf3a.jpg",
             sources: [{"file": `${file}`}],
        }],
    })
    });
   
   
    
     </script>
</body>
</html>