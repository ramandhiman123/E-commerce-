<link href="{{ url('asset/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ url('asset/css/address.css') }}" rel="stylesheet">
<style>
    /* .mr-3 {
        margin-right: 0px;
    }

    .pd-3 {
        padding-right: 0px;
    }

    .pd-4 {
        padding-left: 0px;
    }

    .delivery {
        float: right;
    } */
</style>

@include('layouts.header')

<body>
    <div class="row mr-1">
        <div class="col-75">
            <div class="container">
                @if (Session::has('success'))
                    <div class="alert alert-success text-center">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <p>{{ Session::get('success') }}</p>
                    </div>
                @endif
                <form role="form" action="{{ route('stripe.post') }}" method="post" class="require-validation"
                    data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                    @csrf
                    <div class="row">
                        <div class="col-50">
                            <h3>Billing Address</h3>
                            <label for="fname"> Full Name</label>
                            <input type="text" class="form-control" id="fname"
                                name="fullname"value="{{ old('fullname') }}" placeholder="John M. Doe">
                            <span class="text-danger">
                                @error('fullname')
                                    {{ $message }}
                                @enderror
                            </span><br>
                            <label for="number"> MobileNo</label>
                            <input type="number" id="number" name="number" class="form-control"
                                value="{{ old('number') }}" placeholder="enter phone number">
                            <span class="text-danger">
                                @error('number')
                                    {{ $message }}
                                @enderror
                            </span>
                            <div class="row">
                                <div class="col-50 pd-1">
                                    <label for="state">State</label>
                                    <input type="text" id="state" class="form-control"
                                        value="{{ old('state') }}" name="state" placeholder="NY">
                                    <span class="text-danger">
                                        @error('state')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col-50 pd-2">
                                    <label for="city"> City</label>
                                    <input type="text" id="city" class="form-control"
                                        value="{{ old('city') }}" name="city" placeholder="New York">
                                    <span class="text-danger">
                                        @error('city')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-50 pd-1">
                                    <label for="house no">House No</label>
                                    <input type="text" id="house no" class="form-control"
                                        value="{{ old('houseNo') }}" name="houseNo" placeholder="# 4563">
                                    <span class="text-danger">
                                        @error('houseNo')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col-50 pd-2">
                                    <label for="pin">Pincode</label>
                                    <input type="number" id="pin" class="form-control"
                                        value="{{ old('pincode') }}" name="pincode" placeholder="10001">
                                    <span class="text-danger">
                                        @error('pincode')
                                            {{ $message }}
                                        @enderror       
                                    </span>
                                </div>
                            </div>
                            <label class="form-label" for="form7Example6">Address Type</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                    id="inlineRadio1" value="option1" />
                                <label class="form-check-label" for="inlineRadio1">Home</label>
                                <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                    id="inlineRadio2" value="option2" />
                                <label class="form-check-label" for="inlineRadio2">Office</label>
                            </div>
                        </div>

                        <div class="col-50">
                            <h3>Payment</h3>
                            <label for="fname">Accepted Cards</label>
                            <div class="icon-container">
                                <i class="fa fa-cc-visa" style="color:navy;"></i>
                                <i class="fa fa-cc-amex" style="color:blue;"></i>
                                <i class="fa fa-cc-mastercard" style="color:red;"></i>
                                <i class="fa fa-cc-discover" style="color:orange;"></i>
                            </div>
                            <label for="cname">Name on Card</label>
                            <input type="text" id="cname" name="cardname" placeholder="John More Doe"
                                autocomplete='off'>
                            <label for="ccnum">Credit card number</label>
                            <input type="text" id="ccnum" name="cardnumber" class="card-number"
                                placeholder="1111-2222-3333-4444" autocomplete='off'>

                            <label for="expmonth">Exp Month</label>
                            <input type="text" id="expmonth" name="expmonth" class="card-expiry-month"
                                placeholder="September" autocomplete='off'>
                            <div class="row">
                                <div class="col-50">
                                    <label for="expyear">Exp Year</label>
                                    <input type="text" id="expyear" name="expyear" class="card-expiry-year"
                                        placeholder="2018" autocomplete='off'>
                                </div>
                                <div class="col-50">
                                    <label for="cvv">CVV</label>
                                    <input type="password" id="cvv" name="cvv" class="card-cvc"
                                        placeholder="352" max="4" min="3" autocomplete='off'>

                                </div>

                            </div>
                            <div class='col-md-12 error form-group hide'>
                                <div class="alert alert-light text-danger" role="alert">
                                </div>
                            </div>
                        </div>

                    </div>
                    <label>
                        <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
                    </label>

                    <button type="submit" value="Continue to checkout" class="btn">Continue to checkout</button>
                </form>
            </div>
        </div>
        <div class="col-25">
            <div class="side-box">
                <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>
                            <span>{{ count(Session::get('items')) }}</span></b></span>
                </h4>
                @foreach ($totalitems as $products)
                        <p><a href="#" class="product_title">{{ $products->product->product_title }} (x{{$products->quantity}})</a>
                            <span class="price">${{$products->product->product_price * $products->quantity}}</span></p>
                @endforeach
                <hr>
                <p>Total <span class="price" style="color:black"><b>${{ Session::get('ammount') }}</b></span></p>
            </div>
        </div>
    </div>

    <footer>
        @include('layouts.footer')
    </footer>
    
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>

    <script type="text/javascript">
        $(function() {

            var $form = $(".require-validation");

            $('form.require-validation').bind('submit', function(e) {
                var $form = $(".require-validation"),
                    inputSelector = ['input[type=email]', 'input[type=password]',
                        'input[type=text]', 'input[type=file]',
                        'textarea'
                    ].join(', '),
                    $inputs = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid = true;
                $errorMessage.addClass('hide');

                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('hide');
                        e.preventDefault();
                    }
                });

                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                }

            });

            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('hide')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    /* token contains id, last4, and card type */
                    var token = response['id'];

                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }

        });
    </script>
    <footer>
        @include('layouts.footer')
    </footer>
</body>

</html>



{{-- <div class="row">
    <div class="col-md-8 mb-4">
        <div class="card mb-4">
            <div class="card-header py-3">
                <h5 class="mb-0"><u><b>Address details</b></u></h5>
            </div>
            <div class="card-body">

                <form role="form" action="{{ route('stripe.post') }}" method="post" class="require-validation"
                    data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-outline">
                                <label class="form-label" for="form7Example1">Fullname</label>
                                <input type="text" id="form7Example1" name="fullname" class="form-control" />
                            </div>
                        </div>
                        <div class="col-lg-6 ">
                            <div class="form-outline">
                                <label class="form-label" for="form7Example2">MobileNo</label>
                                <input type="text" id="form7Example2" name="number" class="form-control" />

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 pd-4">
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form7Example3">Pincode</label>
                            <input type="text" id="form7Example3" name="pincode" class="form-control" />
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form7Example4">HouseNo</label>
                            <input type="text" id="form7Example4" name="houseNo" class="form-control" />
                        </div>
                    </div>

                    <div class="col-lg-4 pd-3">
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form7Example5">City</label>
                            <input type="text" id="form7Example5" name="city" class="form-control" />
                        </div>
                    </div>

                    <div class="col-lg-6 pd-4">
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form7Example6">State</label>
                            <input type="text" id="form7Example6" name="state" class="form-control" />
                        </div>
                    </div>
                    <div class="col-lg-6 pd-3">
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form7Example6">landmark</label>
                            <input type="text" id="form7Example6" class="form-control" />
                        </div>
                    </div>
                    <div class="col-lg-12 pd-4">
                        <label class="form-label" for="form7Example6">Address Type</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                id="inlineRadio1" value="option1" />
                            <label class="form-check-label" for="inlineRadio1">Home</label>
                            <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                id="inlineRadio2" value="option2" />
                            <label class="form-check-label" for="inlineRadio2">Office</label>
                        </div>
                    </div>

            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card mb-4">
            <div class="card-header py-3">
                <h5 class="mb-0">Summary</h5>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                        Products
                        <span>{{ count(Session::get('items')) }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center px-0 ">
                        Delivery charges :
                        <span class="delivery">$10</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                        <div>
                            <strong>Total amount</strong>
                            <strong>
                                <p class="mb-0">(including GST)</p>
                            </strong>
                        </div>
                        <span><strong>${{ Session::get('ammount') }}</strong></span>
                    </li>
                </ul>

                <div class="row">
                    <div class="panel panel-default credit-card-box">
                        <div class="panel-heading display-table">
                            <div class="row display-tr">
                                <h3 class="panel-title display-td">Payment Details</h3>
                            </div>
                        </div>
                        <div class="panel-body">

                            

                            <form role="form" action="{{ route('stripe.post') }}" method="post"
                                class="require-validation" data-cc-on-file="false"
                                data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                                @csrf

                                <div class='form-row row'>
                                    <div class='col-xs-12 form-group required'>
                                        <label class='control-label'>Name on Card</label> <input class='form-control'
                                            size='4' type='text'>
                                    </div>
                                </div>

                                <div class='form-row row'>
                                    <div class='col-xs-12 form-group card required'>
                                        <label class='control-label'>Card Number</label> <input autocomplete='off'
                                            class='form-control card-number' size='20' type='text'>
                                    </div>
                                </div>

                                <div class='form-row row'>
                                    <div class='col-xs-12 col-md-4 form-group cvc required'>
                                        <label class='control-label'>CVC</label> <input autocomplete='off'
                                            class='form-control card-cvc' placeholder='ex. 311' size='4'
                                            type='text'>
                                    </div>
                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                        <label class='control-label'>Expiration Month</label> <input
                                            class='form-control card-expiry-month' placeholder='MM' size='2'
                                            type='text'>
                                    </div>
                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                        <label class='control-label'>Expiration Year</label> <input
                                            class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                            type='text'>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now
                                            ${{ Session::get('ammount') }}</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<style type="text/css">
    .panel-title {
        display: inline;
        font-weight: bold;
    }

    .display-table {
        display: table;
    }

    .display-tr {
        display: table-row;
    }

    .display-td {
        display: table-cell;
        vertical-align: middle;
        width: 61%;
    }
</style>
</head>

<body>



</body>

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script type="text/javascript">
    $(function() {

        var $form = $(".require-validation");

        $('form.require-validation').bind('submit', function(e) {
            var $form = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]',
                    'input[type=text]', 'input[type=file]',
                    'textarea'
                ].join(', '),
                $inputs = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid = true;
            $errorMessage.addClass('hide');

            $('.has-error').removeClass('has-error');
            $inputs.each(function(i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('hide');
                    e.preventDefault();
                }
            });

            if (!$form.data('cc-on-file')) {
                e.preventDefault();
                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                }, stripeResponseHandler);
            }

        });

        function stripeResponseHandler(status, response) {
            if (response.error) {
                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                /* token contains id, last4, and card type */
                var token = response['id'];

                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }

    });
</script> --}}
