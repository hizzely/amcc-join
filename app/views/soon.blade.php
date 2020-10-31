<!DOCTYPE html>
<html>
<head>
  <title>Segera Dibuka!</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/vendor/flipdown/flipdown.min.css">
  <script src="assets/vendor/flipdown/flipdown.min.js"></script>
  <style media="screen">
    html {
      height: 100%;
    }

    body {
      margin: 0px;
      height: 100%;
      display: flex;
      align-items: center;
      align-content: space-around;
    }

    body, .countdown h1 {
      transition: all .2s ease-in-out;
    }

    .countdown {
      font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif;
      width: 550px;
      height: 378px;
      margin: auto;
      padding: 20px;
      box-sizing: border-box;
    }

    .countdown .flipdown {
      margin: auto;
    }

    .countdown h1 {
      text-align: center;
      font-weight: 100;
      font-size: 3em;
      margin-top: 0;
      margin-bottom: 10px;
    }

    @media(max-width: 550px) {
      .countdown {
        width: 100%;
        height: 362px;
      }

      .countdown h1 {
        font-size: 2.5em;
      }
    }
  </style>
</head>

<body style="background-color:#079BDB">
  <div class="countdown">
    <h1 class="text-center" style="color:white">Pendaftaran AMCC<br>akan di buka dalam</h1><br>
    <div id="flipdown" class="flipdown flipdown__theme-light"></div>
  </div>
  

  <script type="text/javascript">
    document.addEventListener('DOMContentLoaded', () => {
      // Set some date in the future.
      var futureDate = new Date('<?= $dateOpen ?>').getTime() / 1000;

      // Set up FlipDown
      var flipdown = new FlipDown(futureDate)
        .start()
        .ifEnded(() => {
          console.log('The countdown has ended!');
        });
    });
  </script>
</body>
</html>
