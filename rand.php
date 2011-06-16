<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
?>
<html>
  <head>
    <title>random password generator</title>
    <meta http-equiv="expires" value="Expires: Sat, 26 Jul 1997 05:00:00 GMT" />
    <meta http-equiv="pragma" content="no-cache" />
  </head>
  <body>
    <h2>cryptographic quality random password generator</h2>
    <h3>generated with openssl using the default linux non-hw prng<br />
    each 14 character password has approx 84 bits of entropy (NIST recommends 80)</h3>
    <?php
      echo "<b>available pool = ";
      $entropy_avail = system('cat /proc/sys/kernel/random/entropy_avail');
      echo "</b>";
      if($entropy_avail < 150) {
        echo "<p><font color=red>WARNING: Not enough entropy is available. Please try again later.</font></p>";
      } else {
        echo "<pre><p>START OF PASSWORD LIST</p>";
        system("/usr/bin/openssl rand -base64 128|/bin/cut -c0-14");
        echo "<p>END OF PASSWORD LIST</p></pre>";
      }
    ?>
  </body>
</html>
