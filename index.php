<!DOCTYPE html>
<html>
<head>
  <title>Danbury Music Centre Raffle Tickets</title>
  <link rel='stylesheet' href='index.css'>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
  <div class='text-center'>
    <h2>Danbury Music Centre Raffle <br> - Hat Tricks Game - </h2>
    <h4>February 26th, 2022</h4>

    <form method="post" autocomplete="off">
      <label for='textdata'>Full Name</label>
      <input type="text" name="textdata">

      <label for='number'>Phone Number</label>
      <input type="text" name="number">

      <label for='number'>Phone Number Type (M/H)</label>
      <input type='text' name="numberType">

      <label for='start'>Number of Tickets</label>
      <input id='ticketCount' type='number' name='ticketCount'>

      <label for='start'>Number of First Ticket</label>
      <input id='start' type="number" name="start">

      <button type='button' id='range' class='btn btn-danger d-block mt-2 mb-3 mx-auto'>Calculate Range</button>

      <label for='end'>Number of Last Ticket</label>
      <input id='finish' type="text" name="end">

      <label for='tickets'>No. of Tickets (Calculated: <span id='calcTickets'></span>)</label>
      <input type="text" name="tickets">

      <p id='price'>Suggested Price: </p>
      <input type="submit" name="submit" class="btn btn-success mt-2">
    </form>
  </div>

  <script>
    document.getElementById("range").onclick = function (){
      let desiredTickets = document.getElementById('ticketCount').value;
      desiredTickets = parseFloat(desiredTickets);
      let startValue = document.getElementById('start').value;
      startValue = parseFloat(startValue);
      let endValue = desiredTickets + startValue - 1;
      document.getElementById('finish').value = endValue;
      calculateTicketTotal();
    }

    let calculateTicketTotal = function () {
        let startValue = document.getElementById('start').value;
        let endValue = document.getElementById('finish').value;
        let numberOfTickets = endValue - startValue + 1;
        
        document.getElementById('calcTickets').textContent = numberOfTickets;
        let numberOfTicketsRemaining = numberOfTickets;
        let price = 0;

        while (numberOfTicketsRemaining > 0){
          console.log("NOTR: "+numberOfTicketsRemaining);
          console.log("PRICE: "+price);
          if (numberOfTicketsRemaining >= 15){
            price += 20;
            numberOfTicketsRemaining -= 15;
          } else if (numberOfTicketsRemaining >= 7){
            price += 10;
            numberOfTicketsRemaining -= 7;
          } else if (numberOfTicketsRemaining >= 3){
            price += 5;
            numberOfTicketsRemaining -= 3;
          }else if (numberOfTicketsRemaining >= 1){
            price += 2;
            numberOfTicketsRemaining -= 1;
          }
        }

        document.getElementById('price').textContent = `Total Cost: $${price}`
        
    }
  </script>
</body>
</html>

<?php
              
if(isset($_POST['textdata']))
{
    $name='Name: '.$_POST['textdata'].PHP_EOL;
    $number='Number: '.$_POST['number'].PHP_EOL;
    $numberType='Number Type: '.$_POST['numberType'].PHP_EOL;
    $start='Start: '.$_POST['start'].PHP_EOL;
    $end='End: '.$_POST['end'].PHP_EOL;
    $tickets='Tickets: '.$_POST['tickets'].PHP_EOL;
    $space=''.PHP_EOL;
    $space2=''.PHP_EOL;

    $fp = fopen('data.txt', 'a');
    fwrite($fp, $name);
    fwrite($fp, $number);
    fwrite($fp, $numberType);
    fwrite($fp, $start);
    fwrite($fp, $end);
    fwrite($fp, $tickets);
    fwrite($fp, $space);
    fwrite($fp, $space2);
    fclose($fp);

    $fp2 = fopen('databackup.txt', 'a');
    fwrite($fp2, $name);
    fwrite($fp2, $number);
    fwrite($fp2, $numberType);
    fwrite($fp2, $start);
    fwrite($fp2, $end);
    fwrite($fp2, $tickets);
    fwrite($fp2, $space);
    fwrite($fp2, $space2);
    fclose($fp2);
}
?>