<?php
    session_start();
    if(!isset($_SERVER['HTTP_REFERER'])) {
        header('Location: '.'index.php');
    }
    require_once("settings.php"); //connection info
    
    $conn = @mysqli_connect(
        $host,
        $user,
        $pwd, $sql_db
    ); // Checks if connection is successful

    function sanitize($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function get_value($mysqli, $sql) { // written by jbrahi: https://stackoverflow.com/users/471291/jbrahy
        $result = mysqli_query($mysqli, $sql);
        $value = mysqli_fetch_array($result, MYSQLI_NUM);
        return is_array($value) ? $value[0] : "";
    }

    if (mysqli_connect_errno()) {
        echo "<p>Failed to connect to MySQL:" . mysqli_connect_error() . "</p>";
        exit(); // not in production script
    } else { 
        // Upon successful connection

        $create_table_query = 
            "CREATE TABLE IF NOT EXISTS orders (
                order_id INT(11) AUTO_INCREMENT PRIMARY KEY,
                email VARCHAR(40) NOT NULL FOREIGN KEY REFERENCES customer(email),
                product_id int(11) NOT NULL REFERENCES product(product_id),
                order_qty int(11) NOT NULL,
                order_cost int(25) NOT NULL,
                order_time datetime NOT NULL,
                order_status VARCHAR(15) NOT NULL
            )";

        $result = mysqli_query($conn, $create_table_query);
            

        $customer_table="customer";
        $order_table="orders";
        $_SESSION["product"]="product";
        $invalid = false;

        $_SESSION["fname"] = $_SESSION["lname"] = $_SESSION["email"] = $_SESSION["street"] = 
        $_SESSION["suburb"] = $_SESSION["state"] = $_SESSION["postcode"] =  $_SESSION["phone"] = 
        $_SESSION["card_type"] = $_SESSION["card_name"] = $_SESSION["card_num"] = $_SESSION["cvv"] = 
        $_SESSION["expiry"] = $_SESSION["product"] = $_SESSION["enigma_package"] = $_SESSION["transmission"] = 
        $_SESSION["qty"] = $_SESSION["contact"] = "";

        $_SESSION["fnameErr"] = $_SESSION["lnameErr"] = $_SESSION["emailErr"] = $_SESSION["streetErr"] = 
        $_SESSION["suburbErr"] = $_SESSION["stateErr"] = $_SESSION["postcodeErr"] =  $_SESSION["phoneErr"] = 
        $_SESSION["card_typeErr"] = $_SESSION["card_nameErr"] = $_SESSION["card_numErr"] = $_SESSION["cvvErr"] = 
        $_SESSION["expiryErr"] = $_SESSION["productErr"] = $_SESSION["enigma_packageErr"] = $_SESSION["transmissionErr"] = 
        $_SESSION["qtyErr"] = $_SESSION["contactErr"] = "";

        // First Name Validation
        if (empty($_POST["fname"])) {
            $_SESSION["fnameErr"] = "First name is required";
            $invalid = true;
        } else {
            $fname = sanitize($_POST["fname"]);
            if (preg_match("/[a-zA-Z]+$/", $fname) && strlen($fname) <= 25) {
                $_SESSION["fname"] = $fname;
            } else {
              $_SESSION["fnameErr"] = "First name must be alphabetical and under 25 characters.";
              $invalid = true;
            }
        }

        // Last Name Validation
        if (empty($_POST["lname"])) {
            $_SESSION["lnameErr"] = "Last name is required";
            $invalid = true;
        } else {
            $lname = sanitize($_POST["lname"]);
            if (preg_match("/[a-zA-Z]+$/", $lname) && strlen($lname) <= 25) {
                $_SESSION["lname"] = $lname;
            } else {
              $_SESSION["lnameErr"] = "Last name must be alphabetical and under 25 characters.";
              $invalid = true;
            }
        }

        // Email Validation
        if (empty($_POST["email"])) {
            $_SESSION["emailErr"] = "Email is required";
            $invalid = true;
        } else {
            $email = sanitize($_POST["email"]);
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION["email"] = $email;
            } else {
              $_SESSION["emailErr"] = "Email must be valid.";
              $invalid = true;
            }
        }

        // Street Validation
        if (empty($_POST["street"])) {
            $_SESSION["streetErr"] = "Street is required";
            $invalid = true;
        } else {
            $street = sanitize($_POST["street"]);
            if (strlen($street) <= 40) {
                $_SESSION["street"] = $street;
            } else {
              $_SESSION["streetErr"] = "Street must be less than 40 characters in length.";
              $invalid = true;
            }
        }

        // Suburb Validation
        if (empty($_POST["suburb"])) {
            $_SESSION["suburbErr"] = "Suburb is required";
            $invalid = true;
        } else {
            $suburb = sanitize($_POST["suburb"]);
            if (strlen($suburb) <= 20) {
                $_SESSION["suburb"] = $suburb;
            } else {
              $_SESSION["suburbErr"] = "Suburb must be less than 20 characters in length.";
              $invalid = true;
            }
        }

        // State Validation
        if (empty($_POST["state"])) {
            $_SESSION["stateErr"] = "State is required";
            $invalid = true;
        } else {
            $_SESSION["state"] = sanitize($_POST["state"]);
        }

        // Postcode Validation
        if (empty($_POST["postcode"])) {
            $_SESSION["postcodeErr"] = "Postcode is required";
            $invalid = true;
        } else {
            $postcode = sanitize($_POST["postcode"]);
            if (preg_match("/[0-9]{4}/", $postcode)) {
                $_SESSION["postcode"] = $postcode;
            } else {
              $_SESSION["postcodeErr"] = "Postcode must be 4 digits.";
              $invalid = true;
            }
        }

        // Pref Contact Validation
        if (empty($_POST["contact"])) {
            $_SESSION["contactErr"] = "Preferred Contact is required";
            $invalid = true;
        } else {
            $_SESSION["contact"] = sanitize($_POST["contact"]);
        }

        // Phone Validation
        if (empty($_POST["phone"])) {
            $_SESSION["phoneErr"] = "Phone number is required";
            $invalid = true;
        } else {
            $phone = sanitize($_POST["phone"]);
            if (preg_match("/[0-9]{3}-[0-9]{7}/", $phone)) {
                $_SESSION["phone"] = $phone;
            } else {
              $_SESSION["phoneErr"] = "Phone number must be in the format 012-3456789.";
              $invalid = true;
            }
        }

        // Card Type Validation
        if (empty($_POST["card_type"])) {
            $_SESSION["card_typeErr"] = "Card Type is required";
            $invalid = true;
        } else {
            $_SESSION["card_type"] = sanitize($_POST["card_type"]);
        }

        // Card Name Validation
        if (empty($_POST["card_name"])) {
            $_SESSION["card_nameErr"] = "Card Name is required";
            $invalid = true;
        } else {
            $card_name = sanitize($_POST["card_name"]);
            if (preg_match("/[a-zA-Z]+$/", $card_name) && strlen($card_name) <= 20) {
                $_SESSION["card_name"] = $card_name;
            } else {
              $_SESSION["card_nameErr"] = "Card Name must be alphabetical and less than 40 characters in length.";
              $invalid = true;
            }
        }

        // Card Number Validation
        if (empty($_POST["card_num"])) {
            $_SESSION["card_numErr"] = "Card Number is required";
            $invalid = true;
        } else {
            $card_num = sanitize($_POST["card_num"]);
            switch ($_SESSION["card_type"]) {
                case "visa":
                    if (preg_match("/^(?=[0-9]{16})4/", $card_num)) { // positive lookahead - 16 length, starting in 4
                        $_SESSION["card_num"] = $card_num;
                    } else {
                      $_SESSION["card_numErr"] = "Invalid VISA card number.";
                      $invalid = true;
                    }
                    break;
                case "mastercard":
                    if (preg_match("/^(?=[0-9]{16})5[1-5]/", $card_num)) { // 16 length, starting in 5, then [1-5]
                        $_SESSION["card_num"] = $card_num;
                    } else {
                      $_SESSION["card_numErr"] = "Invalid MasterCard card number.";
                      $invalid = true;
                    }
                    break;
                case "amex":
                    if (preg_match("/^(?=[0-9]{15})3(4|7)", $card_num)) { // same technique, OR at the end
                        $_SESSION["card_num"] = $card_num;
                    } else {
                      $_SESSION["card_numErr"] = "Invalid American Express card number.";
                      $invalid = true;
                    }
                    break;
            }
        }

        // Expiry Validation
        if (empty($_POST["expiry"])) {
            $_SESSION["expiryErr"] = "Expiry Date is required";
            $invalid = true;
        } else {
            $_SESSION["expiry"] = sanitize($_POST["expiry"]);
        }

        // CVV Validation
        if (empty($_POST["cvv"])) {
            $_SESSION["cvvErr"] = "CVV is required";
            $invalid = true;
        } else {
            $cvv = sanitize($_POST["cvv"]);
            if (preg_match("/[0-9]{3}/", $cvv)) {
                $_SESSION["cvv"] = $cvv;
            } else {
              $_SESSION["cvvErr"] = "CVV must be a 3 digit number.";
              $invalid = true;
            }
        }

        // Product Validation
        if (empty($_POST["product"])) {
            $_SESSION["productErr"] = "Product is required";
            $invalid = true;
        } else {
            $_SESSION["product"] = sanitize($_POST["product"]);
        }

        // Package Validation
        if ($_SESSION["product"] == "enigma" && empty($_POST["enigma_package"])) {
            $_SESSION["enigma_packageErr"] = "Package is required";
            $invalid = true;
        } elseif ($_SESSION["product"] != "enigma" && empty($_POST["enigma_package"])) {
            $_SESSION["enigma_packageErr"] = "";
        } else {
            $_SESSION["enigma_package"] = sanitize($_POST["enigma_package"]);
        }

        // Transmission Validation
        if ($_SESSION["product"] == "vertex" && empty($_POST["transmission"])) {
            $_SESSION["transmissionErr"] = "Transmission is required";
            $invalid = true;
        } elseif ($_SESSION["product"] != "vertex" && empty($_POST["transmission"])) {
            $_SESSION["transmissionErr"] = "";
        } else {
            $_SESSION["transmission"] = sanitize($_POST["transmission"]);
        }

        // Quantity Validation
        if (empty($_POST["qty"])) {
            $_SESSION["qtyErr"] = "Quantity is required";
            $invalid = true;
        } else {
            $_SESSION["qty"] = filter_var(sanitize($_POST["qty"]), FILTER_VALIDATE_INT);
        }

        if ($invalid) { // Check for flag set
            header('Location: '.'fix_order.php');
        } else {
            switch ($_SESSION["product"]) { // check for model and options
                case "enigma":
                    $price_query = "select price * '{$_SESSION["qty"]}' from product where package like '{$_SESSION["enigma_package"]}' "; 
                    $product_id_query = "select product_id from product where model like 'enigma' and package like '{$_SESSION["enigma_package"]}' ";
                    break;
                case "vertex":
                    $price_query = "select price * '{$_SESSION["qty"]}' from product where package like '{$_SESSION["transmission"]}' ";
                    $product_id_query = "select product_id from product where model like 'vertex' and package like '{$_SESSION["transmission"]}' ";
                    break;
            }

            $total_price = get_value($conn, $price_query);
            $product_id = get_value($conn, $product_id_query);
            $order_time = date("Y-m-d H:i:s");

            $customer_query = "insert into customer (fname, lname, email, address, suburb, state, postcode, prefcontact, 
                                                    phone, card_type, card_name, card_num, expiry, cvv) 
                                                    values
                                                    ('{$_SESSION["fname"]}', '{$_SESSION["lname"]}', '{$_SESSION["email"]}', '{$_SESSION["street"]}',
                                                    '{$_SESSION["suburb"]}', '{$_SESSION["state"]}', '{$_SESSION["postcode"]}', '{$_SESSION["contact"]}', 
                                                    '{$_SESSION["phone"]}', '{$_SESSION["card_type"]}', '{$_SESSION["card_name"]}', '{$_SESSION["card_num"]}', 
                                                    '{$_SESSION["expiry"]}', '{$_SESSION["cvv"]}')";
            $result = mysqli_query($conn, $customer_query);

            $order_query = "insert into orders (email, product_id, order_qty, order_cost, order_time, order_status)
                            values
                            ('{$_SESSION["email"]}', '$product_id', '{$_SESSION["qty"]}', '$total_price', '$order_time', 'PENDING')";
            
            $result = mysqli_query($conn, $order_query);

            if ($result) {
                header('Location: '.'receipt.php');
            }
        }

        // array_push($filledform, $_SESSION["fname"], $_SESSION["lname"], $_SESSION["email"], $_SESSION["street"], )

        // set up the SQL command to query or add data into the table 
        // $query = "insert into $sql_table (make, model, price, yom) values ('$make', '$model', '$price', '$yom')";

        // execute the query and store result into the result pointer
        // $result = mysqli_query($conn, $query); // checks if the execution was successful
/* 
        if(!$result) {
            echo "<p>Something is wrong with ", $query, "</p>";
        } else {
            // Display operation successful
            echo '<pre>'; print_r($filledform); echo '</pre>';
        } // if successful query operation
        */
        // close the database connection 
        mysqli_close($conn); 
    } // if successful database connection
?>