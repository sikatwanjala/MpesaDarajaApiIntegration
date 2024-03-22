

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>interface</title>
    <style>
        @import url(http://fonts.googleapis.com/css?family=Lato:400,100,300,700,900);
        @import url(http://fonts.googleapis.com/css?family=Source+code+pro:400,200,300,500,600,700,900);
        .container{
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            flex-direction: column;
        }
        *{
            box-sizing: border-box;
        }
        html{
            background: #171A3D;
            font-family: 'Lato', sans-serif;
        }
        .price h1{
            font-weight: 300;
            color: #18C2C0;
            letter-spacing: 2px;
            text-align: center;
        }
        .card{
            margin-top: 30px;
            margin-bottom: 30px;
            width: 520px;
        }
        .card .row{
            width: 100%;
            padding: 1rem 0;
            border-bottom: 1.2px solid  #292C58;
            }
        .card .row.number{
            background: #242852;
            margin-bottom: 50px;
        }
        .cardholder .info, .number .info{
            position: relative;
            margin-left: 40px;
        }
        .cardholder .info label, .number .info label{
            display: inline-block;
            letter-spacing: 0.5px;
            color: #8F92C3;
            width: 40%;
        }
        .cardholder .info input, .number .info input{
            display: inline-block;
            width: 55%;
            background: transparent;
            font-family: 'Source code pro';
            border: none;
            outline: none;
            margin-left: 1%;
            color: white;
        }
        .cardholder .info input::placeholder, .number .info input::placeholder{
            font-family: 'Source code pro';
            color: #444880;
        }
        #cardnumber, #cardnumber::placeholder{
            letter-spacing: 2px;
            font-size: 16px;
        }
            .button button{
                font-size: 1.5rem;
                font-weight: 400;
                letter-spacing: 1px;
                width: 520px;
                background: #18C2C0;
                border: none;
                cursor: pointer;
                transition: background-color 0.2s cubic-bezier(0.4, 0, 0.2,1);
            }
            .button button:hover{
                background: #15aeac;
            }
            .button button:active{
                background: #139b99;
                .button button i{
                    font-size: 1.2rem;
                    margin-right: 5px;
                }
            }
    </style>
</head>
<body>

<div class="container">
    <form action='./stkpush.php' method='POST'>
<div class="price">
    <h1>STK PUSH PAYMENT TEST</h1>

</div>
<div class="card_container">
    <div class="card">
        <div class="row">
            <img src="mpesa2.png" alt="not found" 
            style="width: 30%; margin:0 35%; border-radius:50%">
            <p style="color: #8F92C3; line-height:1.7px; ">
        1.  Enter your <b>Phone Number</b> and press <b>Confirm and Pay</b> <br>
    </p><br>
    <p style="color: #8F92C3;  ">
    2. You will receive a popup on your phone. please Enter <b>MPESA PIN </br> to confirm payment.<br>
   </p>
    <?php
    if($errmsg != ''):
    ?>
    <p style="background: #cc2a24; padding: .8rem; color: #ffffff">
<?php
echo $errmsg;
?>
</p>
<?php 
endif;
?>
    
 </div>
        <div  class="row number">
            <div class="info">
                <input type="hidden" name="orderNo" value="#02JDI2I3R" />
                <label for="cardnumber">
                    Phone Number
                </label>
                <input id="cardnumber" type="text" name="phone_number" maxlength="12" placeholder="+254700000000"/> 
            </div>
        </div>

        <div  class="row number">
            <div class="info">
                <input type="hidden" name="orderNo" value="#02JDI2I3R" />
                <label for="amount">
                    Enter Amount
                </label>
                <input id="amount" type="text" name="amount" maxlength="6" placeholder="Sh. 0000"/> 
            </div>
        </div>
    </div>
</div>
<div class="button">
    <button type="submit" name="pay"><i class="ion-locked"></i>
    Confirm and Pay</button>
</div>
</form>
<p style="color: #8F92C3; line-height: 1.7; margin-top: 5rem;"> Copyright 2024 | All Rights Reserved | Developed By Wanjala Filex</p>
</div>

</body>
</html>
<?php

include('stkpush.php');
?>