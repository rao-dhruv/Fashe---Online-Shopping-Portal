<?php include ( "inc/connect.inc.php" ); ?>
<?php 

session_start();
if (!isset($_SESSION['user_login'])) {
    $user = "";
    header("location: login.php?ono=".$poid."");
}
else {
    $user = $_SESSION['user_login'];
    $result = mysql_query("SELECT * FROM user WHERE id='$user'");
        $get_user_email = mysql_fetch_assoc($result);
            $name = $get_user_email['firstName'];
            $email = $get_user_email['email'];

            $mobile = $get_user_email['mobile'];
            $address = $get_user_email['address'];
}

                                  $query = "SELECT * FROM orders WHERE uid='$user' ORDER BY id DESC";
                                    $run = mysql_query($query);
                                    $row=mysql_fetch_assoc($run);
                                        $pid = $row['pid'];
                                        $quantity = $row['quantity'];
                                        $oplace = $row['oplace'];
                                        $mobile = $row['mobile'];
                                        $odate = $row['odate'];
                                        $ddate = $row['ddate'];
                                        $dstatus = $row['dstatus'];
                                        $query1 = "SELECT * FROM products WHERE id='$pid'";
                                        $run1 = mysql_query($query1);
                                        $row1=mysql_fetch_assoc($run1);
                                        $pId = $row1['id'];
                                        $pName = substr($row1['pName'], 0,50);
                                        $price = $row1['price'];
                                        $picture = $row1['picture'];
                                        $item = $row1['item'];
                                        $category = $row1['category'];
                                    

?>


                                   
                                 
                                    
                                   
                                  
                                  
































<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>A simple, clean, and responsive HTML invoice template</title>
    
    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="image\ebuybdlogo.png" style="width:100%; max-width:200px;">
                            </td>
                            
                            <td>
                            <form  name="myform1" action="index.php">
                             <input type="submit" value="Continue Shopping">
                            </form>
                            </td>
                            <center><h2>Receipt</h2></center>
                        </tr>
                    </table>
                </td>
            </tr>
            
       
            
            <tr class="heading">
                <td>
                    Name
                </td>
                
                <td>
                    <?php echo $name ?>
                </td>
            </tr>
            
            <tr class="details">
                <td>
                    Email
                </td>
                
                <td>
                    <?php echo $email ?>
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    Mobile
                </td>
                
                <td>
                    <?php echo $mobile ?>
                </td>
            </tr>
            
            <tr class="item">
                <td>
                    address
                </td>
                
                <td>
                    <?php echo $address ?>
                </td>
            </tr>
            
            <tr class="item">
                <td>
                    product name
                </td>
                
                <td>
    <?php echo $pName; ?>
                </td>
            </tr>
            
            <tr class="item last">
                <td>
                    Product price
                </td>
                
                <td>
                
                 <?php echo "₹".$price*$quantity; ?>
                </td>
            </tr>

             <tr class="item last">
                <td>
                    total product
                </td>
                
                <td>
                       <?php echo $quantity; ?>
                </td>
            </tr>

             <tr class="item last">
                <td>
                    order date
                </td>
                
                <td>
                <?php echo $odate; ?>
                </td>
            </tr>

             <tr class="item last">
                <td>
                    delivery date
                </td>
                
                <td>
             <?php echo $ddate; ?>
                </td>
            </tr>

             <tr class="item last">
                <td>
                    delivery place
                </td>
                
                <td>
              <?php echo $oplace; ?>
                </td>
            </tr>

             <tr class="item last">
                <td>
                    delivery status
                </td>
                
                <td>
            <?php echo $dstatus; ?>
                </td>
            </tr>
            
           
        </table>
    </div>
</body>
</html>