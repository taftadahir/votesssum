<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Election SSSUM</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
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
            margin-top: 50px;
            text-align: center;
            font-weight: 400;
            padding: 0 30px;
            color: #707070;
            margin-bottom: 50px;
          }

          .first-page-form * {
            width: 100%;
            max-width: 900px;
          }

          .first-page-form input {
            height: 70px;
            text-align: center;
            margin-bottom: 15px;
            font-size: 25px;
          }

          .first-page-form button {
            height: 70px;
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
            border-radius: 10px 10px 0 0;
            -webkit-border-radius: 10px 10px 0 0;
            -moz-border-radius: 10px 10px 0 0;
            -ms-border-radius: 10px 10px 0 0;
            -o-border-radius: 10px 10px 0 0;
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


          .text-style{
            font-weight:600;
            letter-spacing:1.5px;
            font-size:25px;
          }

          @media only screen and (max-width: 768px) {


          .text-style{
            font-weight:600;
            letter-spacing:1.5px;
            font-size:20px;
          }
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
              max-width: 900px;
            }
            .first-page-form input {
                height: 60px;
                text-align: center;
                margin-bottom: 15px;
                font-size: 20px;
            }
            .first-page-form button {
                height: 60px;
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

          .text-style{
            font-weight:600;
            letter-spacing:1.5px;
            font-size:18px;
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
              margin-top: 50px;
              text-align: center;
              font-weight: 500;
              padding: 0 20px;
              color: #707070;
              margin-bottom: 50px;
            }
            .first-page-form * {
              width: 100%;
              max-width: 900px;
            }
            .first-page-form input {
                height: 50px;
                text-align: center;
                margin-bottom: 15px;
                font-size: 20px;
            }
            .first-page-form button {
                height: 50px;
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
            <img class="img-fluid logo rounded" src="{{asset('imgs/phone-booth-203492_1920.jpg')}}" alt="">
            <div class="d-flex flex-column align-items-center justify-content-center center">
                <span class="">Welcome to <span>SSSUM</span></span>
                <span>Election 2020</span>
            </div>
            <img class="img-fluid logo rounded" src="{{asset('imgs/04bb29011217e6117774931db30677f2.jpg')}}" alt="">
        </div>
    </header>

  {{-- Timer --}}
  <div class="container mt-5">
    <div class="alert alert-info text-center text-style" role="alert" id="timer">
    </div>
  </div>

    <!-- Premiere page -->
    <div class="container first-page-content first-page">
        Considering the situation of covid-19 pandemie, we decided to make this election through our Online platform for voting. It s open for all South Sudanese Students in the Kingdom of Morocco.
    </div>
    <form action="{{ route('votes') }}" method="POST" class="container mt-5 d-flex flex-column align-items-center first-page-form first-page"  enctype="multipart/form-data">
        @csrf
        @method("POST")
        @if($errors->has('error'))
            <div class="alert alert-danger pl-3" role="alert">
                {{ $errors->first('error') }}
            </div>
        @endif
        <input class="form-control" type="email" name="email" placeholder="Enter your email" required>
        <button type="submit" class="btn btn-primary">Access vote</button>
    </form>

    <footer class="footer">
        <div class="container-xl flex-sm-row flex-column d-flex justify-content-sm-between justify-content-center align-items-center h-100">
            <span>SSSUM#2020Election</span>
            <span>Done by Taftadjani Dahirou</span>
        </div>
    </footer>

    <script>

       $(function() {
            const timer=document.querySelector('#timer');
            const endTime = new Date(2020, 7, 30, 23, 59, 59, 1000);
            const time = setInterval(_=>{
              const nowTime = new Date();
              const diffTime = endTime.getTime() - nowTime.getTime();
              let day = 0;
              let hour = 0;
              let minute = 0;
              let second = 0;
              if (diffTime>=0){
                day = Math.ceil(diffTime/(1000*60*60*24));
                hour = Math.ceil((diffTime%(1000*60*60*24))/(1000*60*60));
                minute = Math.ceil(((diffTime%(1000*60*60*24))%(1000*60*60))/(1000*60));
                second = Math.ceil((((diffTime%(1000*60*60*24))%(1000*60*60))%(1000*60))/(1000));
              }
              if(diffTime<=0){
                clearInterval(time);
              }
              timer.textContent = `${day}days : ${hour}hours : ${minute}minutes : ${second}seconds`;
            },1000);
       });
    </script>
</body>

</html>
