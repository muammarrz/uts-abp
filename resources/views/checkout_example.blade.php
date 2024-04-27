<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Midtrans Payment</title>
  <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?php echo htmlspecialchars(config('midtrans.client_key')); ?>"></script>
</head>
<body>
  <button id="pay-button">Pay!</button>

  <script type="text/javascript">
    // Get the transaction token from the server-side and set it here
    var transactionToken = "<?php echo htmlspecialchars(session('key')); ?>";

    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
      // Trigger Snap popup with the transaction token
      if(transactionToken) {
        window.snap.pay(transactionToken);
      } else {
        console.error("Transaction token is missing.");
      }
    });
  </script>
</body>
</html>

