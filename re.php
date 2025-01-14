<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accept/Reject User Donation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="./Admin-donation-list.css">

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
                <li><a href="./req.php.php">View Donations</a></li>
                <li id="Logout"><a href="./Myhome.html">Logout</a></li>
            </ul>
        </div>
    </div>

    <h2>Confirm/Reject User Donation</h2>
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">

    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <table id="myTable">
            <tr class="header">
                <th><input type="checkbox" id="checkboxAll"> Select All</th>
            
                <th>Donor Name</th>
                <th>Medicine Name</th>
                <th>Manufacture date</th>
                <th>Expiry Date</th>
                <th>Quantity</th>
                <th>status </th>
            </tr>
            <!-- PHP code to fetch and display the donation data from MySQL database -->
 <?PHP
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Process form submission
                $host = "localhost";
                $username = "root";
                $password = "root123";
                $dbname = "node";
                $conn = new mysqli($host, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                if (isset($_POST['accept'])) {
                    // Accept selected donations
                    if (isset($_POST['Name']) && is_array($_POST['Name'])) {
                        foreach ($_POST['Name'] as $Name) {
                            $sql = "UPDATE donar3 SET status='Accepted' WHERE Name='$Name'";
                            $conn->query($sql);
                        }
                    }
                }  elseif (isset($_POST['reject'])) {
                    // Reject selected donations
                    if (isset($_POST['Name']) && is_array($_POST['Name'])) {
                        foreach ($_POST['Name'] as $Name) {
                            $sql = "UPDATE donar3 SET status='Rejected' WHERE Name='$Name'";
                            $conn->query($sql);
                        }
                    }
                }
    

            $conn->close();

            // Redirect back to the page with the donation list
           header("Location: re.php");
            exit();
            }

            // Fetch and display the donation data from MySQL database
            $host = "localhost";
            $username = "root";
            $password = "root123";
            $dbname = "node";
            $conn = new mysqli($host, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM donar3 ";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td><input type='checkbox' name='Name[]' value='" . $row['Name'] . "' class='chkboxname'></td>";

                    echo "<td>" . $row['Name'] . "</td>";
                    echo "<td>" . $row['Medicine_name'] . "</td>";
                    echo "<td>" . $row['Manufacture_date'] . "</td>";
                    echo "<td>" . $row['Expiry_date'] . "</td>";
                    echo "<td>" . $row['Quantity'] . "</td>";
                    echo "<td>" . $row['status'] . "</td>";

                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No donation requests found.</td></tr>";
            }

            $conn->close();
            ?>
        </table>

        <button class="btn" type="submit" name="accept">Accept</button>
        <button class="button" type="submit" name="reject">Reject</button>
    </form>

    <script>
        function myFunction() {
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those that don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
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
                $(".chkboxname").prop('checked', $(this).prop('checked'));
            });
        });
    </script>
</body>
</html>
