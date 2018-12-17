@extends('layouts/app')
@section('content')
    
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        .body-padding {
            padding-top: 0px;
        }
        .slide-section {
            overflow: hidden;
            width: 100%;
            height: 100vh;
            position: relative;
            /* z-index: 0; */
        }

        .slidex {
            transition: opacity 1.5s ease-in-out;
            opacity: 0;
            width: 100%;
            height: 100vh;
            position: absolute;
            top: 0; left: 0;
            /* z-index: -1; */
        }

        .slide-text {
            position: absolute;
            top: 50%; left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            /* background: linear-gradient(to bottom left, rgba(25, 67, 255, 0.397) 0%, rgba(0, 255, 191, 0.397) 100%); */
            width: 100%;
            padding: 100% 0;
        }
        .title {
            font-family: 'Fredoka One', sans-serif;
            font-size: 5em;
            color: white;
            margin: 33px;
        }
        .subtitle {
            font-family: 'Niramit', sans-serif;
            font-size: 1.8em;
            color: white;
            line-height: 28px;
        }
        .activex {
            opacity: 1;
        }

        #bg1 {
            background-image: url("img/bg-1.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }

        #bg2 {
            background-image: url("img/bg-2.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }

        #bg3 {
            background-image: url("img/bg-3.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }

        #bg4 {
            background-image: url("img/bg-4.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }

        .jumper {
            text-decoration: none;
            position: absolute;
            top: 65%; left: 50%;
            transform: translate(-50%, -50%);
        }
        .navnav {
            background-image: linear-gradient(90deg, rgba(0,41,119,0), rgba(73,22,71,0));
            transition: 0.3s ease-in-out;
        }
        .navnavcolored {
            background: #002977;
        }
        .about-title {
            font-family: 'Fredoka One', sans-serif;
            color: white;
            margin-bottom: 20px;
            margin-top: 20px;
        }
        #aboutSection {
            background-image: linear-gradient(90deg, rgba(0,41,119,1), rgba(73,22,71,1));
            font-family: Niramit, sans-serif;
            text-align: center;
            padding: 40px;
        }
        #aboutSection p {
            color: white;
            font-size: 1.4em;
            margin: 0 230px;
        }
        #aboutSection p strong {
            color: white;
        }
    </style>
    <script>
        $(document).ready(function() {
            function showNextImage() {
                var $actEL = $('.activex');
                var $nextEL = $('.activex').next('.slidex');
                if ($nextEL.length) {
                    $actEL.removeClass('activex');
                    $nextEL.addClass('activex');
                } else {
                    $actEL.removeClass('activex');
                    $('.slidex:first-child').addClass('activex');
                }
            }
            setInterval(function(){
                showNextImage();
            },6500);
        });
    </script>
    <div class="slide-section">
        <div class="slidex" id="bg1">
            <div class="slide-text">
                <img src="{{asset('img/m-logo-3.png')}}" alt="" style="max-width:10%;">
                <div class="title">Manusia Online</div>
                <div class="subtitle">
                    Situs berkumpulnya para netizen untuk <br> membicarakan trending topic masalah terkini
                </div>
            </div>
        </div>
        <div class="slidex" id="bg2">
            <div class="slide-text">
                <img src="{{asset('img/m-logo-3.png')}}" alt="" style="max-width:10%;">
                <div class="title">Manusia Online</div>
                <div class="subtitle">
                    Situs berkumpulnya para netizen untuk <br> membicarakan trending topic masalah terkini
                </div>
            </div>
        </div>
        <div class="slidex" id="bg3">
            <div class="slide-text">
                <img src="{{asset('img/m-logo-3.png')}}" alt="" style="max-width:10%;">
                <div class="title">Manusia Online</div>
                <div class="subtitle">
                    Situs berkumpulnya para netizen untuk <br> membicarakan trending topic masalah terkini
                </div>
            </div>
        </div>
        <div class="activex slidex" id="bg4">
            <div class="slide-text">
                <img src="{{asset('img/m-logo-3.png')}}" alt="" style="max-width:10%;">
                <div class="title">Manusia Online</div>
                <div class="subtitle">
                    Situs berkumpulnya para netizen untuk <br> membicarakan trending topic masalah terkini
                </div>
            </div>
        </div>
    </div>
    <section id="aboutSection">
        <img src="{{asset('img/m-logo-3.png')}}" alt="" style="max-width:8%;">
        <h2 class="about-title">
            Tentang Kami
        </h2>
        <p class="about-description">
            <strong>Manusia Online</strong> adalah situs forum diskusi terbesar di Indonesia yang merupakan rumah bagi siapa saja untuk menemukan segala hal yang mereka butuhkan. Jutaan orang menggunakan <strong>Manusia Online</strong> untuk mencari informasi, pengetahuan, bergabung dengan komunitas baru, hingga mengatasi segala jenis KEGABUTAN!

            Forum diskusi <strong>Manusia Online</strong> kerap memberitakan informasi yang tidak bisa ditemukan di portal-portal berita lain. 
        </p>
        <hr>
        <h2 class="about-title">
            Didukung Oleh
        </h2>
        <img src="{{asset('img/Logos/Partner.png')}}" alt="" style="max-width:60%;">
    </section>
    <script>
        $(window).scroll(function() {
            if($(window).scrollTop() >= 200) {
                $('.navnav').addClass('navnavcolored');
            } else {
                $('.navnav').removeClass('navnavcolored');
            }
        });
    </script>
@endsection