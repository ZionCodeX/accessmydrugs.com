<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>

    <meta charset="utf-8" />
    <!-- CSRF Token -->
    <!--<meta name="csrf-token" content="xxVeIgERLxwaTuQYVmGyQ6gmVaD5xv2DXAt1VNTR">-->
    <title>Checkout | Spreadit Shop </title>

</head>


    
<form id="paymentForm">
    <input type="text" id="email-address" value='{{ $email }}' required />
    <input type="text" id="first-name" value='{{ $first_name }}' required />
    <input type="text" id="last-name" value='{{ $last_name }}' required />
    <input type="text" id="last-name" value='{{ $phone }}' />
    <input type="text" id="delivery_address" value='{{ $delivery_address }}' required />
    <button class='btn' type="submit" id='button' onclick="payWithPaystack()">Pay {{ $amount }}</button>
</form>




<script>
setTimeout(document.getElementByID('button').click(),3000);
const paymentForm = document.getElementById('paymentForm');
paymentForm.addEventListener("submit", payWithPaystack, false);
function payWithPaystack(e) {
  e.preventDefault();

  let handler = PaystackPop.setup({
    key: 'pk_live_fd52b7c2eb9f75ebcfa094694514dabc02296476', // Replace with your public key
    email: {{ $email }},
    amount: {{ $amount }} * 100,
    //email: document.getElementById("email-address").value,
    //amount: document.getElementById("amount").value * 100,
    ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
    // label: "Optional string that replaces customer email"
    onClose: function(){
      alert('Window closed.');
    },
    callback: function(response){
      let message = 'Payment complete! Reference: ' + response.reference;
      alert(message);
    }
  });

  handler.openIframe();
}
</script>



</body>

</html>
