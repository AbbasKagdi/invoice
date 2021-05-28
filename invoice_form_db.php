<!DOCTYPE html>
<html lang="en">

<?php 
require_once "conn.php"; 
include_once "html_headers.php"; 
insert_header("Create Invoice");
?>

<body>
    <?php $curdatehtml5 = date("Y-m-d", strtotime("now"));  ?>
    <center>
    <div class="container bg-light border border-dark p-3 mt-5 col-md-4">
        <form action="invoice_db.php" method="get" id="entry_form">
            <select name='invoice_id'>
                <?php
                    // show invoice list as options
                    $query = mysqli_query($link,"select * from invoices");
                    while($invoice = mysqli_fetch_array($query)){
                        $iid = $invoice['invoice_id'];
                        echo "<option value='$iid'>$iid</option>";
                    }
                ?>
            </select>
            <input type='submit' name='submit' value='Generate' />
        </form>
    </div>

    <?php require_once "modal.php"; ?>
    </center>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>