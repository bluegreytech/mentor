<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>
<?php if(($this->session->flashdata('error'))){ ?>
        <div class="alert alert-danger" id="errorMessage">
        <strong> <?php echo $this->session->flashdata('error'); ?></strong> 
        </div>
    <?php } ?>
    <form method="post">
        <table align="center" border="1">
            <tr>
                <td>Email Address</td>
                <td><input type="text" name="EmailAddress"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="text" name="Password"></td>
            </tr>
            <tr>
            
                <td align="center" colspan="2"><input type="submit" name="logins" value="Submit"></td>
            </tr>
        </table>
    </form>
</body>
</html>
