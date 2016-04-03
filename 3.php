<?php
$con=mysqli_connect("localhost","root","ubuntu","test");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

mysqli_select_db($con,"test");
?>
<html>
    <head>
        <title>Example-3</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <script src="list.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div id="party" class="row col-xs-8 col-xs-offset-2">
                <table class="table table-hover">
                    <tr>
                        <td>Name</td>
                        <td>Address</td>
                    </tr>
                    <tr>
                        <td colspan="2"><input class="search form-control" placeholder="Search" /></td>
                    </tr>
                    <tbody class="list">
                    <?php
                        $sql = "select party_name,party_address from party_master;";
                        $result = mysqli_query($con,$sql);
                        while($row=mysqli_fetch_array($result))
                        {
                    ?>
                    <tr>
                        <td class="name"><?php echo $row[0] ?></td>
                        <td class="address"><?php echo $row[1] ?></td>
                    </tr>
                    <?php
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        <script>
		var options = {
		  valueNames: [ 'name', 'address' ]
		};
		
		var userList = new List('party', options);
		</script>
    </body>
</html>