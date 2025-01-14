<?php
// Assuming you have a database connection established
$host = "localhost";
$username = "root";
$password = "root123";
$database = "node";

// Create a database connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// Check if the form is submitted
if(isset($_POST['submit'])){
    // Get the selected checkboxes
    $selectedIds = $_POST['checkbox'];

    // Process the selected checkboxes
    if(!empty($selectedIds)){
        foreach($selectedIds as $id){
            // Perform your accept/reject logic here
            // Update the status of the request in the database
            // Example SQL query to update the status to "accepted"
            $sql = "UPDATE requests SET status = 'accepted' WHERE id = $id";
            mysqli_query($connection, $sql);
        }
        echo "Selected requests have been accepted.";
    } else {
        echo "No requests selected.";
    }
}

// Fetch requests from the database
$sql = "SELECT * FROM requests";
$result = mysqli_query($connection, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Add your CSS styles here -->
    <style>
         <style>
    *{
        box-sizing: border;
    }
    .name{
        margin:0;
        background-color: #AEE2FF;
        
    }
    body{
        margin: 0;
        padding:0;
    }
    .navbar{
        display: flex;
        position: relative;
        background-color: #F0EEED;
        padding: 0px;
    }
    .navbar li{
        list-style: none;
        font-family: "'Suez One', serif";

    }
    .navbar-links ul{
        display: flex;
        gap: 15px;
        padding-left: 10px;
        margin-top: 16px;
      
    }
    h4{
        font-family: "'Suez One', serif";
        margin:0;
        padding: 5px;
        font-size: 25px;
    }
    h2{
      font-family: "'Suez One', serif";
      margin: 20px auto 20px 30px ;
      font-weight: 600;
      font-size: 25px;
      
    }
    #myInput {
    background-image: url('./IMAGES/Search-icon.png'); /* Add a search icon to input */
    background-position: 10px 12px; /* Position the search icon */
    background-repeat: no-repeat; /* Do not repeat the icon image */
    width: 1090px; /* Full-width */
    font-size: 16px; /* Increase font-size */
    padding: 12px 20px 12px 40px; /* Add some padding */
    border: 1px solid #ddd; /* Add a grey border */
    margin-bottom: 12px; /* Add some space below the input */
    margin-left: 30px;
  }
  
  #myTable {
    border-collapse: collapse; /* Collapse borders */
    width: 1090px; /* Full-width */
    border: 1px solid #ddd; /* Add a grey border */
    font-size: 18px; /* Increase font-size */
    margin-left: 30px;
  }
  
  #myTable th, #myTable td {
    text-align: left; /* Left-align text */
    padding: 12px; /* Add padding */
    font-family: "'Suez One', serif";
  }
  
  #myTable tr {
    /* Add a bottom border to all table rows */
    border-bottom: 1px solid #ddd;
  }
  
  #myTable tr.header, #myTable tr:hover {
    /* Add a grey background color to the table header and on hover */
    background-color: #f1f1f1;
  }
  .btn {
        background: #23ed85;
        background-image: -webkit-linear-gradient(top, #23ed85, #56bf7d);
        background-image: -moz-linear-gradient(top, #23ed85, #56bf7d);
        background-image: -ms-linear-gradient(top, #23ed85, #56bf7d);
        background-image: -o-linear-gradient(top, #23ed85, #56bf7d);
        background-image: linear-gradient(to bottom, #23ed85, #56bf7d);
        -webkit-border-radius: 28;
        -moz-border-radius: 28;
        border-radius: 28px;
        font-family: Arial;
        color: #ffffff;
        font-size: 15px;
        padding: 10px 20px 10px 20px;
        text-decoration: none;
        margin: 20px;
      }
      
      .btn:hover {
        background: #50e68c;
        background-image: -webkit-linear-gradient(top, #50e68c, #6ee09b);
        background-image: -moz-linear-gradient(top, #50e68c, #6ee09b);
        background-image: -ms-linear-gradient(top, #50e68c, #6ee09b);
        background-image: -o-linear-gradient(top, #50e68c, #6ee09b);
        background-image: linear-gradient(to bottom, #50e68c, #6ee09b);
        text-decoration: none;
        color: black;
      }

      .button {
        background: #f54242;
        background-image: -webkit-linear-gradient(top, #f54242, #db343a);
        background-image: -moz-linear-gradient(top, #f54242, #db343a);
        background-image: -ms-linear-gradient(top, #f54242, #db343a);
        background-image: -o-linear-gradient(top, #f54242, #db343a);
        background-image: linear-gradient(to bottom, #f54242, #db343a);
        -webkit-border-radius: 28;
        -moz-border-radius: 28;
        border-radius: 28px;
        font-family: Arial;
        color: #ffffff;
        font-size: 15px;
        padding: 10px 20px 10px 20px;
        text-decoration: none;
        border: 0;
}

.button:hover {
  background: #fa4d67;
  background-image: -webkit-linear-gradient(top, #fa4d67, #f53f4f);
  background-image: -moz-linear-gradient(top, #fa4d67, #f53f4f);
  background-image: -ms-linear-gradient(top, #fa4d67, #f53f4f);
  background-image: -o-linear-gradient(top, #fa4d67, #f53f4f);
  background-image: linear-gradient(to bottom, #fa4d67, #f53f4f);
  text-decoration: none;
  color: black;
}
#Logout{
    padding-left: 470px;
  }
   /* Additional styles for desktop */
   @media (min-width: 1920px) {
        .container {
            max-width: 1400px; /* Adjust the maximum width based on your preference */
            margin: 0 auto;
        }
    }
    
    
    
    
    </style>
    </style>
</head>
<body>
    <h2>Confirm/Reject NGO Request</h2>
    <form method="post" action="">
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">
        <table id="myTable">
            <tr class="header">
                <th><input type="checkbox" id="checkboxAll"> Select All</th>
                <th>S.No</th>
                <th>NGO Name</th>
                <th>Medicine Name</th>
                <th>Address</th>
                <th>Quantity</th>
            </tr>
            <?php while($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><input type="checkbox" class="chkboxname" name="checkbox[]" value="<?php echo $row['id']; ?>"></td>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['ngo_name']; ?></td>
                <td><?php echo $row['medicine_name']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['quantity']; ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
        <button type="submit" name="submit" class="btn">Accept</button>
        <button type="button" class="button">Reject</button>
    </form>

    <!-- Add your JavaScript code here -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#checkboxAll').click(function(){
                $(".chkboxname").prop('checked', $(this).prop('checked'));
            });
        });
    </script>
    <script>
        function myFunction() {
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
          
            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</body>
</html>


 <!--   <style>
    *{
        box-sizing: border;
    }
    .name{
        margin:0;
        background-color: #AEE2FF;
        
    }
    body{
        margin: 0;
        padding:0;
    }
    .navbar{
        display: flex;
        position: relative;
        background-color: #F0EEED;
        padding: 0px;
    }
    .navbar li{
        list-style: none;
        font-family: "'Suez One', serif";

    }
    .navbar-links ul{
        display: flex;
        gap: 15px;
        padding-left: 10px;
        margin-top: 16px;
      
    }
    h4{
        font-family: "'Suez One', serif";
        margin:0;
        padding: 5px;
        font-size: 25px;
    }
    h2{
      font-family: "'Suez One', serif";
      margin: 20px auto 20px 30px ;
      font-weight: 600;
      font-size: 25px;
      
    }
    #myInput {
    background-image: url('./IMAGES/Search-icon.png'); /* Add a search icon to input */
    background-position: 10px 12px; /* Position the search icon */
    background-repeat: no-repeat; /* Do not repeat the icon image */
    width: 1090px; /* Full-width */
    font-size: 16px; /* Increase font-size */
    padding: 12px 20px 12px 40px; /* Add some padding */
    border: 1px solid #ddd; /* Add a grey border */
    margin-bottom: 12px; /* Add some space below the input */
    margin-left: 30px;
  }
  
  #myTable {
    border-collapse: collapse; /* Collapse borders */
    width: 1090px; /* Full-width */
    border: 1px solid #ddd; /* Add a grey border */
    font-size: 18px; /* Increase font-size */
    margin-left: 30px;
  }
  
  #myTable th, #myTable td {
    text-align: left; /* Left-align text */
    padding: 12px; /* Add padding */
    font-family: "'Suez One', serif";
  }
  
  #myTable tr {
    /* Add a bottom border to all table rows */
    border-bottom: 1px solid #ddd;
  }
  
  #myTable tr.header, #myTable tr:hover {
    /* Add a grey background color to the table header and on hover */
    background-color: #f1f1f1;
  }
  .btn {
        background: #23ed85;
        background-image: -webkit-linear-gradient(top, #23ed85, #56bf7d);
        background-image: -moz-linear-gradient(top, #23ed85, #56bf7d);
        background-image: -ms-linear-gradient(top, #23ed85, #56bf7d);
        background-image: -o-linear-gradient(top, #23ed85, #56bf7d);
        background-image: linear-gradient(to bottom, #23ed85, #56bf7d);
        -webkit-border-radius: 28;
        -moz-border-radius: 28;
        border-radius: 28px;
        font-family: Arial;
        color: #ffffff;
        font-size: 15px;
        padding: 10px 20px 10px 20px;
        text-decoration: none;
        margin: 20px;
      }
      
      .btn:hover {
        background: #50e68c;
        background-image: -webkit-linear-gradient(top, #50e68c, #6ee09b);
        background-image: -moz-linear-gradient(top, #50e68c, #6ee09b);
        background-image: -ms-linear-gradient(top, #50e68c, #6ee09b);
        background-image: -o-linear-gradient(top, #50e68c, #6ee09b);
        background-image: linear-gradient(to bottom, #50e68c, #6ee09b);
        text-decoration: none;
        color: black;
      }

      .button {
        background: #f54242;
        background-image: -webkit-linear-gradient(top, #f54242, #db343a);
        background-image: -moz-linear-gradient(top, #f54242, #db343a);
        background-image: -ms-linear-gradient(top, #f54242, #db343a);
        background-image: -o-linear-gradient(top, #f54242, #db343a);
        background-image: linear-gradient(to bottom, #f54242, #db343a);
        -webkit-border-radius: 28;
        -moz-border-radius: 28;
        border-radius: 28px;
        font-family: Arial;
        color: #ffffff;
        font-size: 15px;
        padding: 10px 20px 10px 20px;
        text-decoration: none;
        border: 0;
}

.button:hover {
  background: #fa4d67;
  background-image: -webkit-linear-gradient(top, #fa4d67, #f53f4f);
  background-image: -moz-linear-gradient(top, #fa4d67, #f53f4f);
  background-image: -ms-linear-gradient(top, #fa4d67, #f53f4f);
  background-image: -o-linear-gradient(top, #fa4d67, #f53f4f);
  background-image: linear-gradient(to bottom, #fa4d67, #f53f4f);
  text-decoration: none;
  color: black;
}
   /* Additional styles for desktop */
   @media (min-width: 1920px) {
        .container {
            max-width: 1400px; /* Adjust the maximum width based on your preference */
            margin: 0 auto;
        }
    }
    
    
    
    
    </style>
</head>
<body>

    <div class="name">
        <h4><strong>Online Medicine Donation</strong></h4>
    </div>
    <div class="navbar">
        <div class="navbar-links">
        <ul>
          <li><a href="./Admin-user-list.php">User list</a></li>
          <li><a href="./Admin-NGO-list.php">NGO list</a></li>
          <li><a href="./Admin-donation-list.html">View Donation list</a></li>
          <li><a href="./Admin-request-list.html">NGO requested medicine</a></li>
          <li><a href="./Admin-View-Donations.php">View Donations</a></li>
        </ul>
        </div>
    </div>

    <h2>Confirm/Reject NGO Request</h2>
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">
    
    <table id="myTable">
      <tr class="header">
        <th style="width:60%;">Name</th>
        <th style="width:40%;">Country</th>  
        <th><input type="checkbox" id="checkboxAll"> Select All</th>
        <th>S.No</th>
        <th>NGO Name</th>
        <th>Medicine Name</th>
        <th>Address</th>
        <th>Quantity</th>
      </tr>
      
        <td>carboplatin</td>
        <td>Nashik</td>
        <td>60</td>
      </tr>
      <tr>
        <td><input type="checkbox" class="chkboxname" id="chechbox4"></td>
        <td>4</td>
        <td>pqr</td>
        <td>Doxil </td>
        <td>Delhi</td>
        <td>35</td>
      </tr>
    </table>
    <button class="btn"> Accept</button>
    <button class="button">Reject</button>

    <script>
      function myFunction() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
      
        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
          td = tr[i].getElementsByTagName("td")[0];
          if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
              tr[i].style.display = "";
            } else {
              tr[i].style.display = "none";
            }
          }
        }
      }
      </script>
  
    

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
        $('#checkboxAll').click(function(){
        $(".chkboxname").prop('checked',$ (this).prop('checked'));
        });
        });
    </script>
</body>
</html>-->