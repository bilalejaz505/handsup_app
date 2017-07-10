<!DOCTYPE HTML>

<html>

<head>

    <title>Constant Contact API v2 Add/Update Contact Example</title>

    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">

    <link href="styles.css" rel="stylesheet">

</head>



<!--

README: Add or update contact example

This example flow illustrates how a Constant Contact account owner can add or update a contact in their account. In order for this example to function 

properly, you must have a valid Constant Contact API Key as well as an access token. Both of these can be obtained from 

http://constantcontact.mashery.com.

-->



<?php

?>



<body>

<div class="well">

    <h3>Add or Update a Contact</h3>



    <form class="form-horizontal" name="submitContact" id="submitContact" method="POST" action="addOrUpdateContact.php">

        <div class="control-group">

            <label class="control-label" for="email">Email</label>



            <div class="controls">

                <input type="email" id="email" name="email" placeholder="Email Address">

            </div>

        </div>

        <div class="control-group">

            <label class="control-label" for="first_name">First Name</label>



            <div class="controls">

                <input type="text" id="first_name" name="first_name" placeholder="First Name">

            </div>

        </div>

        <div class="control-group">

            <label class="control-label" for="last_name">Last Name</label>



            <div class="controls">

                <input type="text" id="last_name" name="last_name" placeholder="Last Name">

            </div>

        </div>

        <div class="control-group">

            <label class="control-label" for="list">List</label>



            <div class="controls">

                <select name="list">

                    <?php

                    foreach ($lists as $list) {

                        echo '<option value="' . $list->id . '">' . $list->name . '</option>';

                    }

                    ?>

                </select>

            </div>

        </div>

        <div class="control-group">

            <label class="control-label">

                <div class="controls">

                    <input type="submit" value="Submit" class="btn btn-primary"/>

                </div>

        </div>

    </form>

</div>



<!-- Success Message -->

<?php if (isset($returnContact)) {

    echo '<div class="container alert-success"><pre class="success-pre">';

    print_r($returnContact);

    echo '</pre></div>';

} ?>



</body>

</html>

