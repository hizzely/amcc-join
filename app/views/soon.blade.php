<!DOCTYPE html>
<html>
<head>
  <title>Segera Dibuka!</title>
  <link rel="stylesheet" href="flipclock/css/flipclock.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="flipclock/js/flipclock.js"></script>
  <style media="screen">
    .jarak {
      margin-top: 20%;
    }
  </style>
</head>

<body style="background-color:#079BDB">
  <div class="jarak"></div>
  <h1 class="text-center" style="color:white">Pendaftaran AMCC akan di buka dalam</h1>
  <div class="container">
    <div class="row">
      <div class="col-7 mx-auto">
        <div class="clock" style="margin:2em;"></div>
      </div>
    </div>
  </div>
  </div>
  <div class="message"></div>
  <script type="text/javascript">
    var clock;

    $(document).ready(function () {
      // Grab the current date
      var currentDate = new Date();

      // Set some date in the future. In this case, it's always Jan 1
      var futureDate = new Date('<?= $dateOpen ?>');

      // Calculate the difference in seconds between the future and current date
      var diff = futureDate.getTime() / 1000 - currentDate.getTime() / 1000;

      // Instantiate a coutdown FlipClock
      clock = $('.clock').FlipClock(diff, {
        clockFace: 'DailyCounter',
        countdown: true
      });
    });
  </script>
</body>
</html>
