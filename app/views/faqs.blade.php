<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Join AMCC</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css" integrity="sha384-2hfp1SzUoho7/TsGGGDaFdsuuDL0LX2hnUp6VkX3CUQ2K4K+xjboZdsXyp4oUHZj" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <header class="header col-md-3">
        <div class="header-inner">
          <h1>
            {{-- <span class="join">Registrasi</span><br>
            <span class="amcc">AMCC</span> --}}
            <img src="img/logo.png" alt="" class="img-fluid">
          </h1>

          <ul class="socials hidden-sm-down">
            <li><a href="/faqs">FAQ</a></li>
            <li><a href="http://amcc.or.id/"><i class="ion-ios-world-outline"></i> amcc.or.id</a></li>
            <li><a href="https://www.facebook.com/AmikomComputerClub/"><i class="ion-social-facebook"></i>AmikomComputerClub</a></li>
            <li><a href="https://instagram.com/amccamikom/"><i class="ion-social-instagram-outline"></i> @amccamikom</a></li>
          </ul>
        </div>
      </header>

      <main class="content col-md-9">
        <h1><b>FAQ</b></h1>
        <p>Pertanyaan kamu mungkin udah pernah terjawab sebelumnya, coba kamu cek disini ;)</p>
        <br>
        <div class="accordion" id="faqs">
          @foreach ($faqs as $faq)
            <div class="card">
              <div class="card-header" style="padding: 0; padding-top: 7px">
                <h2 class="mb-0">
                  <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#faq{{ $faq['id'] }}" aria-expanded="true" aria-controls="faq{{ $faq['id'] }}">
                    {{ $faq['pertanyaan'] }}
                  </button>
                </h2>
              </div>   
              <div id="faq{{ $faq['id'] }}" class="collapse show" data-parent="#faqs">
                <div class="card-body" style="padding: 1.5rem">
                  {{ $faq['jawaban'] }}
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </main>

      <div class="footer-sm col-xs-12 hidden-md-up">
        <ul class="socials">
          <li><a href="/faqs">FAQ</a></li>
          <li><a href="http://amcc.or.id/"><i class="ion-ios-world-outline"></i> amcc.or.id</a></li>
          <li><a href="https://www.facebook.com/AmikomComputerClub/"><i class="ion-social-facebook"></i>AmikomComputerClub</a></li>
          <li><a href="https://instagram.com/amccamikom/"><i class="ion-social-instagram-outline"></i> @amccamikom</a></li>
        </ul>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/js/bootstrap.min.js" integrity="sha384-VjEeINv9OSwtWFLAtmc4JCtEJXXBub00gtSnszmspDLCtC0I4z4nqz7rEFbIZLLU" crossorigin="anonymous"></script>
  <script src="assets/js/all.js"></script>
  <script src="assets/js/app.js"></script>
</body>
</html>
