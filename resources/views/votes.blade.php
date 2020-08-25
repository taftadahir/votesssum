<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Election SSSUM</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script defer>
        $(function() {
            const votePresidentBtns = document.querySelectorAll('.second-page-president .box-user>button');
            const myForm=document.querySelector('#myForm');
            const voteSecretaireBtns = document.querySelectorAll('.second-page-secretaire .box-user>button');

            const clearBtns = voteBtns => {
                voteBtns.forEach(voteBtn => {
                    voteBtn.textContent = "Vote";
                });
            }

            votePresidentBtns.forEach(voteBtn => {
                voteBtn.addEventListener('click', e => {
                    if (e.target.textContent === "Voted") {
                        clearBtns(votePresidentBtns);
                        myForm.president.value=null;
                    } else {
                        clearBtns(votePresidentBtns);
                        e.target.textContent = "Voted";
                        myForm.president.value=e.target.value;
                    }

                    $.ajaxSetup({
                        headers:{
                            'X-CSRF-TOKEN':$("meta[name='csrf-token']").attr('content')
                        }
                    });
                    $.ajax({
                        url:"{{ url('updateVote') }}",
                        method:'post',
                        data:{
                            email:myForm.email.value,
                            president:myForm.president.value,
                            secretaire:myForm.secretaire.value
                        },
                        success:function(results){
                            console.log(results);
                        }
                    });
                });
            });

            voteSecretaireBtns.forEach(voteBtn => {
                voteBtn.addEventListener('click', e => {
                    if (e.target.textContent === "Voted") {
                        clearBtns(voteSecretaireBtns);
                        myForm.secretaire.value=null;
                    } else {
                        clearBtns(voteSecretaireBtns);
                        e.target.textContent = "Voted";
                        myForm.secretaire.value=e.target.value;
                    }

                    $.ajaxSetup({
                        headers:{
                            'X-CSRF-TOKEN':$("meta[name='csrf-token']").attr('content')
                        }
                    });
                    $.ajax({
                        url:"{{ url('updateVote') }}",
                        method:'post',
                        data:{
                            email:myForm.email.value,
                            president:myForm.president.value,
                            secretaire:myForm.secretaire.value
                        },
                        success:function(results){
                            console.log(results);
                        }
                    });
                });
            });
        });
    </script>

    <style>
        * {
            font-family: montserrat;
            font-weight: normal;
          }

          .hide {
            display: none !important;
          }

          .header {
            margin-top: 60px;
          }

          .header .logo {
            width: 130px;
            height: 130px;
            -o-object-fit: cover;
               object-fit: cover;
          }

          .header .center span:first-child {
            font-size: 45px;
          }

          .header .center span:first-child span {
            font-weight: 600;
          }

          .header .center span:last-child {
            font-size: 35px;
          }

          .first-page-content {
            font-size: 30px;
            margin-top: 150px;
            text-align: center;
            font-weight: 400;
            padding: 0 30px;
            color: #707070;
            margin-bottom: 100px;
          }

          .first-page-form * {
            width: 100%;
            height: 70px;
            max-width: 900px;
          }

          .first-page-form input {
            text-align: center;
            margin-bottom: 15px;
            font-size: 25px;
          }

          .first-page-form button {
            margin-bottom: 100px;
            font-size: 30px;
          }

          .page-container {
            margin-top: 5rem;
          }

          .page-container > h2 {
            text-align: center;
            font-size: 40px;
          }

          .page-container > div {
            margin-top: 2rem;
          }

          .page-container .box-user {
            width: 240px;
            margin: 1rem;
          }

          .page-container .box-user img {
            width: 240px;
            height: 240px;
            -o-object-fit: cover;
               object-fit: cover;
            border-radius: 10px;
            -webkit-border-radius: 10px;
            -moz-border-radius: 10px;
            -ms-border-radius: 10px;
            -o-border-radius: 10px;
          }

          .page-container .box-user h3 {
            padding-top: 1rem;
            padding-bottom: 1rem;
            background-color: #fff;
            font-size: 20px;
          }

          .page-container .box-user button {
            font-size: 20px;
          }

          .second-page-secretaire {
            margin-bottom: 3rem;
          }

          .third-page-container .box-user ~ div {
            margin-left: 5rem;
            letter-spacing: 1px;
          }

          .third-page-container .box-user ~ div span:first-child {
            font-size: 60px;
            font-weight: 600;
          }

          .third-page-container .box-user ~ div span:last-child {
            font-size: 30px;
          }

          .footer {
            height: 150px;
            background-color: #373737;
            color: #707070;
            font-size: 20px;
          }

          @media only screen and (max-width: 768px) {
            .header {
              margin-top: 60px;
            }
            .header .logo {
              width: 100px;
              height: 100px;
            }
            .header .center span:first-child {
              font-size: 30px;
            }
            .header .center span:first-child span {
              font-weight: 600;
            }
            .header .center span:last-child {
              font-size: 20px;
            }
            .footer {
              height: 150px;
              background-color: #373737;
              color: #707070;
              font-size: 15px;
            }
            .page-container > h2 {
              font-size: 30px;
            }
            .first-page-form * {
              width: 100%;
              height: 60px;
              max-width: 900px;
            }
            .first-page-form input {
              text-align: center;
              margin-bottom: 15px;
              font-size: 20px;
            }
            .first-page-form button {
              margin-bottom: 100px;
              font-size: 25px;
            }
            .third-page-container .box-user ~ div {
              margin-left: 3rem;
              letter-spacing: 1px;
              text-align: center;
            }
            .third-page-container .box-user ~ div span:first-child {
              font-size: 40px;
            }
            .third-page-container .box-user ~ div span:last-child {
              font-size: 20px;
            }
          }

          @media only screen and (max-width: 540px) {
            .header {
              margin-top: 60px;
            }
            .header .logo {
              width: 60px;
              height: 60px;
            }
            .header .center > span:first-child {
              font-size: 20px;
            }
            .header .center > span:first-child span {
              font-weight: 600;
            }
            .header .center > span:last-child {
              font-size: 12px;
            }
            .page-container > h2 {
              font-size: 20px;
            }
            .first-page-content {
              font-size: 20px;
              margin-top: 100px;
              text-align: center;
              font-weight: 500;
              padding: 0 20px;
              color: #707070;
              margin-bottom: 100px;
            }
            .first-page-form * {
              width: 100%;
              height: 50px;
              max-width: 900px;
            }
            .first-page-form input {
              text-align: center;
              margin-bottom: 15px;
              font-size: 20px;
            }
            .first-page-form button {
              margin-bottom: 100px;
              font-size: 20px;
            }
            .third-page-container .box-user {
              margin-bottom: 0;
            }
            .third-page-container .box-user h3 {
              margin-bottom: 0;
              padding-bottom: 0;
            }
            .third-page-container .box-user ~ div {
              margin-left: 1rem;
              margin-bottom: 2rem;
              letter-spacing: 1px;
              text-align: start;
            }
            .third-page-container .box-user ~ div span:first-child {
              font-size: 40px;
              margin-right: 1rem;
              font-weight: 600;
            }
            .third-page-container .box-user ~ div span:last-child {
              font-size: 20px;
            }
            .footer {
              height: 180px;
              background-color: #373737;
              color: #707070;
              font-size: 15px;
            }
            .footer > div span:first-child {
              font-size: 25px;
            }
            .footer > div span:last-child {
              font-size: 12px;
            }
          }
    </style>
</head>

<body class="mh-100">
    <header class="header">
        <div class="container-xl d-flex justify-content-between align-items-center">
            <img class="img-fluid logo rounded" src="{{asset('imgs/WhatsApp Image 2020-08-25 at 13.43.14.jpeg')}}" alt="">
            <div class="d-flex flex-column align-items-center justify-content-center center">
                <span class="">Welcome to <span>SSSUM</span></span>
                <span>Election 2020</span>
            </div>
            <img class="img-fluid logo rounded" src="{{asset('imgs/04bb29011217e6117774931db30677f2.jpg')}}" alt="">
        </div>
    </header>

    <form action="{{ route('update') }}" method="POST"  hidden  enctype="multipart/form-data" id="myForm">
        @csrf
        <input type="text" name="email" id="email" value="{{ $email }}">
        <input type="text" name="president" id="president">
        <input type="text" name="secretaire" id="secretaire">
    </form>

    <!-- Deuxieme page -->
    <div class="container d-flex flex-column align-items-center second-page-president page-container candidat">
        <h2>Candidat au poste de president</h2>
        <div class="d-flex flex-wrap justify-content-center">
            <div class="box-user">
                <img src="{{asset('imgs/beanie-2562646_1920.jpg')}}" alt="">
                <h3>Cruz Stevens</h3>
                <button class="btn btn-dark w-100" value="A">Vote</button>
            </div>
            <div class="box-user">
                <img src="{{asset('imgs/beanie-2562646_1920.jpg')}}" alt="">
                <h3>Cruz Stevens</h3>
                <button class="btn btn-dark w-100" value="B">Vote</button>
            </div>
            <div class="box-user">
                <img src="{{asset('imgs/beanie-2562646_1920.jpg')}}" alt="">
                <h3>Cruz Stevens</h3>
                <button class="btn btn-dark w-100" value="C">Vote</button>
            </div>
        </div>
    </div>
    <div class="container second-page-secretaire d-flex flex-column align-items-center page-container candidat">
        <h2>Candidat au poste de secretaire</h2>
        <div class="d-flex flex-wrap justify-content-center">
            <div class="box-user">
                <img src="{{asset('imgs/beanie-2562646_1920.jpg')}}" alt="">
                <h3>Cruz Stevens</h3>
                <button class="btn btn-dark w-100" value="A">Vote</button>
            </div>
            <div class="box-user">
                <img src="{{asset('imgs/beanie-2562646_1920.jpg')}}" alt="">
                <h3>Cruz Stevens</h3>
                <button class="btn btn-dark w-100" value="B">Vote</button>
            </div>
            <div class="box-user">
                <img src="{{asset('imgs/beanie-2562646_1920.jpg')}}" alt="">
                <h3>Cruz Stevens</h3>
                <button class="btn btn-dark w-100" value="C">Vote</button>
            </div>
            <div class="box-user">
                <img src="{{asset('imgs/beanie-2562646_1920.jpg')}}" alt="">
                <h3>Cruz Stevens</h3>
                <button class="btn btn-dark w-100" value="D">Vote</button>
            </div>
            <div class="box-user">
                <img src="{{asset('imgs/beanie-2562646_1920.jpg')}}" alt="">
                <h3>Cruz Stevens</h3>
                <button class="btn btn-dark w-100" value="E">Vote</button>
            </div>
            <div class="box-user">
                <img src="{{asset('imgs/beanie-2562646_1920.jpg')}}" alt="">
                <h3>Cruz Stevens</h3>
                <button class="btn btn-dark w-100" value="F">Vote</button>
            </div>
        </div>
    </div>

    <div class="container">
        <form action="{{ route('valider') }}" method="POST" class="container mt-5 d-flex flex-column align-items-center first-page-form first-page"  enctype="multipart/form-data">
            @csrf
            @method("POST")
            <input class="form-control" type="text" name="email" hidden value="{{ $email }}">
            <button type="submit" class="btn btn-primary w-100">Validate</button>
        </form>
    </div>

    <footer class="footer">
        <div class="container-xl flex-sm-row flex-column d-flex justify-content-sm-between justify-content-center align-items-center h-100">
            <span>SSSUM#2020Election</span>
            <span>Done by HakTech
                <img class="ml-2 rounded-circle" src="{{asset('imgs/WhatsApp Image 2020-08-25 at 17.42.44.jpeg')}}" alt="" width="50" height="50">
            </span>
        </div>
    </footer>
</body>

</html>
