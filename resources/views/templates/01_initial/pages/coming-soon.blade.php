<!DOCTYPE html>
<html>
<style>
  body,
  html {
    height: 100%;
    margin: 0;
  }

  .bgimg {
    position: relative;
    height: 100%;
    font-family: "Courier New", Courier, monospace;
    font-size: 25px;
    color: white;
    background-image: url('https://i.imgur.com/8b3q0yl.jpg');
    background-position: center;
    background-size: cover;
  }

  .topleft {
    position: absolute;
    top: 0;
    left: 16px;
  }

  .bottomleft {
    position: absolute;
    bottom: 0;
    left: 16px;
  }

  .middle {
    position: absolute;
    top: 50%;
    left: 50%;
    text-align: center;
    transform: translate(-50%, -50%);
  }

  hr {
    width: 40%;
    margin: auto;
  }
</style>
<body>

<div class="bgimg">
    <div class="topleft">
        <p>Logo</p>
    </div>
    <div class="middle">
        <h1>COMING SOON</h1>
        <hr>
        <p id="demo" style="

      font-size: 30px;"></p>
    </div>
    <div class="bottomleft">
        <p>Some text</p>
    </div>
</div>

<script>
    // Set the date we're counting down to
    var countDownDate = new Date("Feb 5, 2019 15:37:25").getTime();

    // Update the count down every 1 second
    var countdownfunction = setInterval(function() {

        // Get todays date and time
        var now = new Date().getTime();

        // Find the distance between now an the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Output the result in an element with id="demo"
        document.getElementById("demo").innerHTML = days + "d " + hours + "h "
            + minutes + "m " + seconds + "s ";

        // If the count down is over, write some text
        if (distance < 0) {
            clearInterval(countdownfunction);
            document.getElementById("demo").innerHTML = "EXPIRED";
        }
    }, 1000);
</script>

</body>
</html>