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
            <legend>Purchase Form</legend>
                <fieldset>
                <legend>Personal Details</legend>
                    <label for="fname">First Name</label>
                    <input type="text" name="fname" id="fname" pattern="[a-zA-Z]+" maxlength="25" required="required"/>
                    <label for="lname">Last Name</label>
                    <input type="text" name="lname" id="lname" pattern="[a-zA-Z]+" maxlength="25" required="required"/>
                    
                    <label for="email">Email address</label>
                    <input type="email" name="email" id="email" maxlength="30" size="20" required="required" />
                </fieldset>
                
                <fieldset>
                <legend>Address</legend>
                    <label for="street">Street Address</label>
                    <input type="text" name="street" id="street" maxlength="40" required="required"/>
                    
                    <label for="suburb">Suburb/Town</label>
                    <input type="text" name="suburb" id="suburb" maxlength="20" required="required"/>
                    
                    <label for="statecombo">State</label>
                    <select name="state" id="statecombo" required="required">
                        <option value="" selected="selected">Please Select</option>
                        <option value="VIC">VIC</option>
                        <option value="NSW">NSW</option>
                        <option value="QLD">QLD</option>
                        <option value="NT">NT</option>
                        <option value="WA">WA</option>
                        <option value="SA">SA</option>
                        <option value="TAS">TAS</option>
                        <option value="ACT">ACT</option>
                    </select>
                    <br>
                    <label for="postcode">Postcode</label>
                    <input type="text" name="postcode" id="postcode" pattern="[0-9]{4}" maxlength="4" required="required"/>  
                </fieldset>
                
                <fieldset>
                <legend>Preferred Contact</legend>
                    <label for="prefemail">Email</label>
                    <input type="radio" id="prefemail" name="contact" value="prefemail" required="required"/> <br>
                    <label for="prefpost">Post</label>
                    <input type="radio" id="prefpost" name="contact" value="prefpost"/> <br>
                    <label for="prefphone">Phone</label>
                    <input type="radio" id="prefphone" name="contact" value="prefphone"/> <br>
                    <br>
                    <label for="phone">Enter a phone number </label>
                    <input type="tel" id="phone" name="phone" placeholder="012 3456789" pattern="[0-9]{3}-[0-9]{7}" required="required">
                    <small>Format: 012-3456789</small>
                </fieldset>

                <fieldset>
                <legend>Product</legend>
                    <label for="product">Product</label>
                    <select id="product" name="product" value="product" onchange="hide()" required="required"> <!-- JS Implemented -->
                        <option value="" selected="selected">Please Select</option>
                        <option value="enigma">Enigma</option>
                        <option value="vertex">Vertex</option>
                    </select>
                    <div id="enigma-package"> <!-- JS Implemented -->
                        <p><strong>Enigma Package:</strong></p>
                        <p>
                            <input type="radio" id="lx" name="enigma_package" value="lx" required="required" />
                            <label class="nocolon" for="lx">LX Trim - $19,990 Driveaway</label>
                        </p>
                        <p>
                            <input type="radio" id="sport" name="enigma_package" value="sport"/>
                            <label class="nocolon" for="sport">Sport Trim - $27,990 Driveaway</label>
                        </p>
                        <p>
                            <input type="radio" id="touring" name="enigma_package" value="touring"/>
                            <label class="nocolon" for="touring">Touring Trim - $29,990 Driveaway</label>
                        </p>
                    </div>
                    <div id="vertex-package"> 
                        <p><strong>Vertex Transmission:</strong></p>
                        <p>
                            <input type="radio" id="auto" name="transmission" value="auto" required="required" />
                            <label class="nocolon" for="auto">Automatic Transmission - $17,990 + Onroads </label>
                        </p>
                        <p>
                            <input type="radio" id="manual" name="transmission" value="manual"/>
                            <label class="nocolon" for="manual">Manual Transmission - $18,990 + Onroads </label>
                        </p>
                    </div>
                    <div id="no-package"> 
                        <p><strong>Please Select A Product (Note for Markers: Payment Information is Behind Here) </strong></p>
                    </div>
                    <div id="product-qty"> 
                        <p><strong>Quantity:</strong></p>
                        <p>
                        <input type="number" id="qty" name="qty">
                        </p>
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Payment details</legend>
                        
                    <p><label for="card_type">Credit Card Type</label>
                       <select name="card_type" id="card_type" required>
                         <option value="" >Please Select</option>
                         <option value="visa">Visa</option>
                         <option value="mastercard">Mastercard</option>
                         <option value="amex">American Express</option>
                       </select>
                    </p>
                        
                        <label for="card_name">Name on card</label>
                        <input type="text" name="card_name" id="card_name" pattern="[a-zA-z]+" maxlength="40" required="required" />

                        <label for="card_num">Card number</label>
                        <input type="text" name="card_num" id="card_num" pattern="[0-9]{15,16}" required="required" />

                        <label for="expiry">Card expiry date</label>
                        <input type="date" name="expiry" id="expiry" placeholder="mm-yy" pattern="\d{1,2}-\d{1,2}" required="required" />

                        <label for="cvv">Card Verification Value</label>
                        <input type="text" name="cvv" id="cvv" pattern="[0-9]{3}" required="required" />
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