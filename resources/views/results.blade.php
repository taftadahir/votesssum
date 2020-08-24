<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Election SSSUM</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script defer>
        $(function() {
            const form = document.querySelector('.first-page-form');
            const firstPages = document.querySelectorAll('.first-page');
            const candidats = document.querySelectorAll('.candidat');
            const results = document.querySelectorAll('.result');
            const votePresidentBtns = document.querySelectorAll('.second-page-president .box-user>button');
            const voteSecretaireBtns = document.querySelectorAll('.second-page-secretaire .box-user>button');
            let votes = []

            const clearBtns = voteBtns => {
                voteBtns.forEach(voteBtn => {
                    voteBtn.textContent = "Vote";
                });
            }
            votePresidentBtns.forEach((voteBtn) => {
                voteBtn.addEventListener('click', e => {
                    if (e.target.textContent === "Voted") {
                        clearBtns(votePresidentBtns);
                        const elt = votes.find(elt => elt.email === form.email.value);
                        elt.president = undefined;
                        console.log(votes);
                    } else {
                        clearBtns(votePresidentBtns);
                        e.target.textContent = "Voted";
                        const elt = votes.find(elt => elt.email === form.email.value);
                        elt.president = e.target.value;
                        console.log(votes);
                    }
                });
            });

            voteSecretaireBtns.forEach((voteBtn) => {
                voteBtn.addEventListener('click', e => {
                    if (e.target.textContent === "Voted") {
                        clearBtns(voteSecretaireBtns);
                        const elt = votes.find(elt => elt.email === form.email.value);
                        elt.secretaire = undefined;
                        console.log(votes);
                    } else {
                        clearBtns(voteSecretaireBtns);
                        e.target.textContent = "Voted";
                        const elt = votes.find(elt => elt.email === form.email.value);
                        elt.secretaire = e.target.value;
                        console.log(votes);
                    }
                });
            });

            form.addEventListener('submit', e => {
                e.preventDefault();

                // Ajout du mail dans l'array
                if (!(votes.find(elt => elt.email === form.email.value))) {
                    votes.push({ email: form.email.value, president: undefined, secretaire: undefined });
                }

                for (let i = 0; i < 2; i++) {
                    // console.log(firstPages[i]);
                    firstPages[i].classList.add('hide');
                    candidats[i].classList.remove('hide');
                    // results[i].classList.remove('hide');
                }
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
            <img class="img-fluid logo rounded" src="{{asset('imgs/phone-booth-203492_1920.jpg')}}" alt="">
            <div class="d-flex flex-column align-items-center justify-content-center center">
                <span class="">Welcome to <span>SSSUM</span></span>
                <span>Election 2020</span>
            </div>
            <img class="img-fluid logo rounded" src="{{asset('imgs/04bb29011217e6117774931db30677f2.jpg')}}" alt="">
        </div>
    </header>

    <!-- Troisieme page -->
    <div class="container page-container third-page-container hide result">
        <h2>Resultat des elections au poste de President</h2>
        <div class="d-flex flex-wrap justify-content-center">
            <div class=" d-flex flex-column flex-sm-row">
                <div class="box-user">
                    <img src="{{asset('imgs/beanie-2562646_1920.jpg')}}" alt="">
                    <h3>Cruz Stevens</h3>
                </div>
                <div class="d-flex flex-row flex-sm-column align-items-center">
                    <span>50%</span>
                    <span>(200/400 votes)</span>
                </div>
            </div>
            <div class=" d-flex flex-column flex-sm-row">
                <div class="box-user">
                    <img src="{{asset('imgs/beanie-2562646_1920.jpg')}}" alt="">
                    <h3>Cruz Stevens</h3>
                </div>
                <div class="d-flex flex-row flex-sm-column align-items-center">
                    <span>50%</span>
                    <span>(200/400 votes)</span>
                </div>
            </div>
            <div class=" d-flex flex-column flex-sm-row">
                <div class="box-user">
                    <img src="{{asset('imgs/beanie-2562646_1920.jpg')}}" alt="">
                    <h3>Cruz Stevens</h3>
                </div>
                <div class="d-flex flex-row flex-sm-column align-items-center">
                    <span>50%</span>
                    <span>(200/400 votes)</span>
                </div>
            </div>
        </div>
    </div>
    <div class="container page-container third-page-container hide result">
        <h2>Resultat des elections au poste de secretaire</h2>
        <div class=" d-flex flex-wrap justify-content-center">
            <div class=" d-flex flex-column flex-sm-row">
                <div class="box-user">
                    <img src="{{asset('imgs/beanie-2562646_1920.jpg')}}" alt="">
                    <h3>Cruz Stevens</h3>
                </div>
                <div class="d-flex flex-row flex-sm-column align-items-center">
                    <span>50%</span>
                    <span>(200/400 votes)</span>
                </div>
            </div>
            <div class=" d-flex flex-column flex-sm-row">
                <div class="box-user">
                    <img src="{{asset('imgs/beanie-2562646_1920.jpg')}}" alt="">
                    <h3>Cruz Stevens</h3>
                </div>
                <div class="d-flex flex-row flex-sm-column align-items-center">
                    <span>50%</span>
                    <span>(200/400 votes)</span>
                </div>
            </div>
            <div class=" d-flex flex-column flex-sm-row">
                <div class="box-user">
                    <img src="{{asset('imgs/beanie-2562646_1920.jpg')}}" alt="">
                    <h3>Cruz Stevens</h3>
                </div>
                <div class="d-flex flex-row flex-sm-column align-items-center ">
                    <span>50%</span>
                    <span>(200/400 votes)</span>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container-xl flex-sm-row flex-column d-flex justify-content-sm-between justify-content-center align-items-center h-100">
            <span>SSSUM#2020Election</span>
            <span>Done by Taftadjani Dahirou</span>
        </div>
    </footer>
</body>

</html>
