<?php session_start(); 
if(!isset($_SERVER['HTTP_REFERER'])) {
    header('Location: '.'index.php');
}?>
<!DOCTYPE html>
<html lang="en">    
<head>
	<title>Foo Motor Corporation | Enquiry</title>
	<meta charset="utf-8" /> 
	<meta name="viewport" content="width=device-width" />
	<meta name="description" content="Foo Motor Corporation | Enquiry Page" />
	<meta name="keywords" content="html, css, car, corporation, enquiry, service" />
	<meta name="author" content="WebsiteWizard&trade;" />
	<link href="styles/style.css" rel="stylesheet" />
    <script src="src/hide.js"></script> <!-- Script for Order Package function-->
</head>
<body>
	<?php include "includes/navbar.inc" ?>

    <?php include "includes/header-small.inc" ?>

    <section class="form-container container">
        <form id="enquire" method="post" action="process_order.php" novalidate="novalidate">
            <fieldset>
            <legend>Enquiry Form</legend>
                <fieldset>
                <legend>Personal Details</legend>
                    <label for="fname">First Name</label>
                    <span class="error">* <?php echo $_SESSION["fnameErr"];?></span>
                    <input type="text" name="fname" id="fname" value="<?php echo $_SESSION["fname"];?>" />
                    
                    <label for="lname">Last Name</label>
                    <span class="error">* <?php echo $_SESSION["lnameErr"];?></span>
                    <input type="text" name="lname" id="lname" value="<?php echo $_SESSION["lname"]?>" />
                    
                    <label for="email">Email address</label>
                    <span class="error">* <?php echo $_SESSION["emailErr"];?></span>
                    <input type="email" name="email" id="email"  value="<?php echo $_SESSION["email"]?>"/>
                </fieldset>
                
                <fieldset>
                <legend>Address</legend>
                    <label for="street">Street Address</label>
                    <span class="error">* <?php echo $_SESSION["streetErr"];?></span>
                    <input type="text" name="street" id="street" value="<?php echo $_SESSION["street"];?>" />
                    
                    <label for="suburb">Suburb/Town</label>
                    <span class="error">* <?php echo $_SESSION["suburbErr"];?></span>
                    <input type="text" name="suburb" id="suburb" value="<?php echo $_SESSION["suburb"];?>" />
                    
                    <label for="statecombo">State</label> 
                    <select name="state" id="statecombo" required="required">
                        <option value="" selected="selected">Please Select</option>
                        <option value="VIC" <?php if ($_SESSION["state"] == "VIC") echo "selected";?> >VIC</option>
                        <option value="NSW" <?php if ($_SESSION["state"] == "NSW") echo "selected";?>>NSW</option>
                        <option value="QLD" <?php if ($_SESSION["state"] == "QLD") echo "selected";?>>QLD</option>
                        <option value="NT" <?php if ($_SESSION["state"] == "NT") echo "selected";?>>NT</option>
                        <option value="WA" <?php if ($_SESSION["state"] == "WA") echo "selected";?>>WA</option>
                        <option value="SA" <?php if ($_SESSION["state"] == "SA") echo "selected";?>>SA</option>
                        <option value="TAS" <?php if ($_SESSION["state"] == "TAS") echo "selected";?>>TAS</option>
                        <option value="ACT" <?php if ($_SESSION["state"] == "ACT") echo "selected";?>>ACT</option>
                    </select> <span class="error">* <?php echo $_SESSION["stateErr"];?></span>
                    <br>
                    <label for="postcode">Postcode</label>
                    <span class="error">* <?php echo $_SESSION["postcodeErr"];?></span>
                    <input type="text" name="postcode" id="postcode" value="<?php echo $_SESSION["postcode"];?>"/>  
                </fieldset>
                
                <fieldset>
                <legend>Preferred Contact</legend>
                    <label for="prefemail">Email</label>
                    <input type="radio" id="prefemail" name="contact" value="prefemail" <?php if ($_SESSION["contact"] == "prefemail") echo "checked";?> /> <br>
                    <label for="prefpost">Post</label>
                    <input type="radio" id="prefpost" name="contact" value="prefpost" <?php if ($_SESSION["contact"] == "prefpost") echo "checked";?>/> <br>
                    <label for="prefphone">Phone</label>
                    <input type="radio" id="prefphone" name="contact" value="prefphone" <?php if ($_SESSION["contact"] == "prefphone") echo "checked";?>/> 
                    <span class="error">* <?php echo $_SESSION["contactErr"];?></span> <br> <br>
                    
                    <label for="phone">Enter a phone number </label>
                    <span class="error">* <?php echo $_SESSION["phoneErr"];?></span>
                    <input type="tel" id="phone" name="phone" placeholder="012 3456789" value="<?php echo $_SESSION["phone"];?>">
                    <small>Format: 012-3456789</small>
                </fieldset>

                <fieldset>
                <legend>Product</legend>
                    <label for="product">Product</label>
                    <span class="error">* <?php echo $_SESSION["productErr"];?></span>
                    <select id="product" name="product" value="product" onchange="hide()" required="required"> <!-- JS Implemented -->
                        <option value="">Please Select</option>
                        <option value="enigma" <?php if ($_SESSION["product"] == "enigma") echo "selected";?>>Enigma</option>
                        <option value="vertex" <?php if ($_SESSION["product"] == "vertex") echo "selected";?>>Vertex</option>
                    </select>
                    <div id="enigma-package"> <!-- JS Implemented -->
                        <p><strong>Enigma Package:</strong></p>
                        <span class="error">* <?php echo $_SESSION["enigma_packageErr"];?></span>
                        <p>
                            <input type="radio" id="lx" name="enigma_package" value="lx" required="required" 
                            <?php if ($_SESSION["enigma_package"] == "lx") echo "checked";?> />
                            <label class="nocolon" for="lx">LX Trim - $19,990 Driveaway</label>
                        </p>
                        <p>
                            <input type="radio" id="sport" name="enigma_package" value="sport" 
                            <?php if ($_SESSION["enigma_package"] == "sport") echo "checked";?> />
                            <label class="nocolon" for="sport">Sport Trim - $27,990 Driveaway</label>
                        </p>
                        <p>
                            <input type="radio" id="touring" name="enigma_package" value="touring"
                            <?php if ($_SESSION["enigma_package"] == "touring") echo "checked";?> />
                            <label class="nocolon" for="touring">Touring Trim - $29,990 Driveaway</label>
                        </p>
                    </div>
                    <div id="vertex-package"> 
                        <p><strong>Vertex Transmission:</strong> <span class="error">* <?php echo $_SESSION["transmissionErr"];?></span></p>
                        <p>
                            <input type="radio" id="auto" name="transmission" value="auto" required="required" 
                            <?php if ($_SESSION["transmission"] == "auto") echo "checked";?> />
                            <label class="nocolon" for="auto">Automatic Transmission - $17,990 + Onroads </label>
                        </p>
                        <p>
                            <input type="radio" id="manual" name="transmission" value="manual"
                            <?php if ($_SESSION["transmission"] == "manual") echo "checked";?> />
                            <label class="nocolon" for="manual">Manual Transmission - $18,990 + Onroads </label>
                        </p>
                    </div>
                    <div id="no-package"> 
                        <p><strong>Please Select A Product (Note for Markers: Payment Information is Behind Here) </strong></p>
                    </div>
                    <div id="product-qty"> 
                        <p><strong>Quantity:</strong> <span class="error">* <?php echo $_SESSION["qtyErr"];?></span></p>
                        <p>
                        <input type="number" id="qty" name="qty" value="<?php echo $_SESSION["qty"]?>" />
                        </p>
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Payment details</legend>
                        
                    <p><label for="card_type">Credit Card Type</label>
                       <select name="card_type" id="card_type" required>
                         <option value="" >Please Select</option>
                         <option value="visa" <?php if ($_SESSION["card_type"] == "visa") echo "selected";?>>Visa</option>
                         <option value="mastercard" <?php if ($_SESSION["card_type"] == "mastercard") echo "selected";?>>Mastercard</option>
                         <option value="amex" <?php if ($_SESSION["card_type"] == "amex") echo "selected";?>>American Express</option>
                       </select>
                       <span class="error">* <?php echo $_SESSION["card_typeErr"];?></span>
                    </p>
                        
                        <label for="card_name">Name on card</label>
                        <span class="error">* <?php echo $_SESSION["card_nameErr"];?></span>
                        <input type="text" name="card_name" id="card_name"  />

                        <label for="card_num">Card number</label>
                        <span class="error">* <?php echo $_SESSION["card_numErr"];?></span>
                        <input type="text" name="card_num" id="card_num"  />

                        <label for="expiry">Card expiry date</label>
                        <span class="error">* <?php echo $_SESSION["expiryErr"];?></span>
                        <input type="date" name="expiry" id="expiry"  />

                        <label for="cvv">Card Verification Value</label>
                        <span class="error">* <?php echo $_SESSION["cvvErr"];?></span>
                        <input type="text" name="cvv" id="cvv"  />
                </fieldset>

                <label for="comments">Comments</label>   
                <textarea id="comments" name="comments" rows="5" cols="80" placeholder="Enter your questions, concerns, etc."></textarea>
                <button class="btn btn-primary" type="submit" form="enquire" value="Submit">Check Out</button>
                
            </fieldset>
        </form>
    </section>
	<?php include "includes/footer.inc" ?>
</body>
</html>