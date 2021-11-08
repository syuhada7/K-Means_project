<!DOCTYPE html>
<html>

<head>
  <title><?= $title; ?></title>
  <link rel="shortcut icon" href="<?= base_url('assets/logo mercu.png'); ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/beranda.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/font-awesome.min.css'); ?>">

  <script type="text/javascript">
    function showTime() {
      var a_p = "";
      var today = new Date();
      var curr_hour = today.getHours();
      var curr_minute = today.getMinutes();
      if (curr_hour < 12) {
        a_p = "AM";
      } else {
        a_p = "PM";
      }
      if (curr_hour == 0) {
        curr_hour = 12;
      }
      if (curr_hour > 12) {
        curr_hour = curr_hour - 12;
      }
      curr_hour = checkTime(curr_hour);
      curr_minute = checkTime(curr_minute);
      document.getElementById('time').innerHTML = curr_hour + ":" + curr_minute + " " + a_p;
    }

    function checkTime(i) {
      if (i < 10) {
        i = "0" + i;
      }
      return i;
    }
    setInterval(showTime, 500);
  </script>
</head>

<body>