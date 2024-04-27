<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript"
      src="https://app.sandbox.midtrans.com/snap/snap.js"
      data-client-key="<?php echo htmlspecialchars(config('midtrans.client_key')); ?>"></script>
  </head>

  <body>
    <button id="pay-button">Pay!</button>
    <!-- script untuk midtrans -->
    <script type="text/javascript">
      var payButton = document.getElementById('pay-button');
      payButton.addEventListener('click', function () {
        window.snap.pay('<?php echo htmlspecialchars(session('key')); ?>', {
        onSuccess: function (result) {
          /* You may add your own implementation here */
          alert("payment success!"); console.log(result);
          
        },
        onPending: function (result) {
          /* You may add your own implementation here */
          alert("wating your payment!"); console.log(result);
        },
        onError: function (result) {
          /* You may add your own implementation here */
          alert("payment failed!"); console.log(result);
        },
        onClose: function () {
          /* You may add your own implementation here */
          alert('you closed the popup without finishing the payment');
        }
        });

      });
    </script>
  </body>
</html><?php /**PATH H:\Kuliah\Semester 6\APLIKASI_BERBASIS_PLATFORM_IF-45-08_[TRK]\Tubes_1\JazzOrJas\resources\views/checkout.blade.php ENDPATH**/ ?>