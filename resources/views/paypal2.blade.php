<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laravel 6 PayPal Integration Tutorial - codesolutionstuff.com</title>
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha256-YLGeXaapI0/5IgZopewRJcFXomhRMlYYjugPLSyNjTY=" crossorigin="anonymous" />

  <!-- Styles -->

  <style>
    html,
    body {
      background-color: #fff;
      color: #636b6f;
      font-family: 'Nunito', sans-serif;
      font-weight: 200;
      height: 100vh;
      margin: 0;
    }

    .content {
      margin-top: 100px;
      text-align: center;
    }
  </style>
</head>

<body>

    <div class="flex-center position-ref full-height">
        <div class="content">
            <h1>Laravel 9 PayPal Integration Tutorial - codesolutionstuff.com</h1>

            <div class="container d-flex justify-content-center align-items-center">
                <div class="row" style="padding: 18px; display: none;" id="paypalbtn">
                    <div>
                        <input type="hidden" name="cmd" value="_xclick">
                        <input type="hidden" name="business" value="sb-wrj47s1394765104@business.example.com">
                        <input type="hidden" name="currency_code" value="USD">
                        <input type="hidden" name="amount" value="{{ $dPayableAmount }}">
                        <input type="hidden" name="first_name" id="first_name" value="">
                        <input type="hidden" name="last_name" id="last_name" value="">
                        <input type="hidden" name="address1" value="">
                        <input type="hidden" name="address2" value="">
                        <input type="hidden" name="email" value="{{ Crypt::decryptString(Session::get('ue')) }}">
                        <input type="hidden" name="country" value="Saudi Arabia">

                        <input type="hidden" name="return" value="{{ URL('paypal/success') }}">
                        <input type="hidden" name="cancel_return" value="{{ URL('paypal/cancel') }}">

                        <input type="image" src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/btn_paynow_107x26.png" alt="Pay Now" style="cursor: pointer;">

                        <img alt="" src="https://paypalobjects.com/en_US/i/src/pixel.gif" width="1" height="1" style="cursor: pointer;">
                    </div>
                </div>
            </div>


            <a href="{{ route('payment') }}" class="btn btn-success">Pay $100 from Paypal</a>
        </div>
    </div>
</body>

</html>