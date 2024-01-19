<html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
        <script type="text/javascript"
                src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="SB-Mid-client-r1mVD3EuXO-YRCTa"></script>
        <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

        <style>
            body {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }
            .center-div {
                width: 200px; /* Set your desired width */
                height: 130px; /* Set your desired height */
            }
            .btn-success {
                width: 200px;
            }
            #pay-button {
                top: 20px;
            }

            .label {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 50px; /* Set your desired height for the container */
                background-color: white;
            }
            h2 {
                margin: 0;
            }

        </style>
    
    </head>

    <body>
        <div class="center-div shadow">
            <div class="label mb-5">
                <h2>CHECKOUT</h2>
            </div>
            <button id="pay-button" class="btn btn-success">Bayar</button>
        </div>

        <form action="" id="submit_form" method="post">
            @csrf
            <input type="hidden" name="json" id="json_callback">
        </form>

        <!-- @TODO: You can add the desired ID as a reference for the embedId parameter. -->
        <div id="snap-container"></div>

        <script type="text/javascript">
            // For example trigger on button clicked, or any time you need
            var payButton = document.getElementById('pay-button');
            payButton.addEventListener('click', function () {
                // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token.
                // Also, use the embedId that you defined in the div above, here.
                window.snap.embed('{{ $snap_token }}', {
                    embedId: 'snap-container',
                    onSuccess: function (result) {
                        /* You may add your own implementation here */
                        console.log(result);
                        send_response_to_form(result);
                    },
                    onPending: function (result) {
                        /* You may add your own implementation here */
                        console.log(result);
                        send_response_to_form(result);
                    },
                    onError: function (result) {
                        /* You may add your own implementation here */
                        console.log(result);
                        send_response_to_form(result);
                    },
                    onClose: function () {
                        /* You may add your own implementation here */
                        alert('you closed the popup without finishing the payment');
                    }
                });
            });

            function send_response_to_form(result) {
                document.getElementById('json_callback').value = JSON.stringify(result);
                $('#submit_form').submit();
            }
        </script>
    </body>

    </html>