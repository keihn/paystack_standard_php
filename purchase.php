<?php require_once 'views/inc/header.php';?>


<!-- <script src="https://js.paystack.co/v1/inline.js"></script>

<div class="container">
<div id="paystackEmbedContainer"></div>
</div>


<script>
  PaystackPop.setup({
   key: 'pk_test_8679c860de91b51a89d2d61eccf42bed6248117f',
   email: 'customer@email.com',
   amount: 10000,
   container: 'paystackEmbedContainer',
   callback: function(response){
        alert('successfully subscribed. transaction ref is ' + response.reference);
    },
  });
</script>-->









<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://js.paystack.co/v1/paystack.js"></script>

<div class="container">

    <form id="paystack-card-form">
        <div class="form-group">
            <label for="number">Card Nmber:</label>
            <input class="form-control" type="text" data-paystack="number">
        </div>

        <div class="form-group">
            <label for="cvv">CVV:</label>
            <input class="form-control" type="text" data-paystack="cvv">
        </div>

        <div class="form-group">
            
            <label for="expiryMonth">Month:</label>
                <input class="form-control" type="text" data-paystack="expiryMonth">

                <label for="expiryMonth">Year:</label>
                <input class="form-control" type="text" data-paystack="expiryYear">
        </div>

        <button type="submit" data-paystack="submit">Submit</button>
    </form>

</div>

<script src="./charge/paystack.js"></script> 


<?php require_once 'views/inc/footer.php';?>