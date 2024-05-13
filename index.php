<?php
# Initialize the session
session_start();

# If user is not logged in then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== TRUE) {
  echo "<script>" . "window.location.href='./login.php';" . "</script>";
  exit;
}
?>

<!-- <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User login system</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/main.css">
  <link rel="shortcut icon" href="./img/favicon-16x16.png" type="image/x-icon">
</head>

<body>
  <div class="container">
    <div class="alert alert-success my-5">
      Welcome ! You are now signed in to your account.
    </div>
    
    <div class="row justify-content-center">
      <div class="col-lg-5 text-center">
        <img src="./img/blank-avatar.jpg" class="img-fluid rounded" alt="User avatar" width="180">
        <h4 class="my-4">Hello, <?= htmlspecialchars($_SESSION["username"]); ?></h4>
        <a href="./logout.php" class="btn btn-primary">Log Out</a>
      </div>
    </div>
  </div>
</body>

</html> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Budget Tracker System</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- Style CSS -->
    <link rel="stylesheet" href="style.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    
    <div class="main">
      
      
        
        <div class="budget-container row">
          
            <div class="add-container col-4">
                <div class="add-budget-container">
                <div class="head"><h1>Personal Finance Tracker</h1>
        <a href="./logout.php" class="btn btn-primary">Log Out</a>
        <a href="./budget.html" class="btnbud">Budget Tracker</a>
        <!-- <button id="redirectBtn">Redirect</button> -->
      
      <style>
        .btnbud{
          padding: 10px 20px;
  background-color: #007bff;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
        }
        .head{
    background-color: #eef1f3;
    position: sticky; 
    width: 800px;
    
            top: 20px; 
            margin-top: -80px; 
             
            padding: 10px;
}
      </style></div>
                
                    <h4>Add Income</h4>
                    

                    <form id="expenseForm" >
                    
                    <div>
                         <!-- Date Input -->
        <label for="date">Date:</label>
        <input type="date" id="date" name="date"><br><br>
                    </div>

                    <div>

                     <label for="dropdown">Select an option:</label>
        <select id="type" name="dropdown">
            <option value="Salary">Salary</option>
            <option value="FreeLance">FreeLance</option>
            <option value="Tuition">Tuition</option>
            <option value="Other">Other</option>
        </select>
        <br><br>

                    </div>

                        <div class="form-group">
                            <label for="budget">Budget:</label>
                            <input class="form-control" type="number" id="amount">
                        </div>
                        <input type="submit" value="Submit">
                            <!-- <button class="btn btn-primary form-control">Add Budget</button> -->
                              <!-- <button type="button" onclick="addData()">Submit</button> -->
                    </form>
                </div>





                <div class="add-expense-container mt-4">
                    <h4>Add Expense</h4>
                    <form>
                    <div>
                    <!-- Date Input -->
        <label for="date">Date:</label>
        <input type="date" id="date" name="date"><br><br>
                    </div>
                        <div class="form-group">
                            <label for="expense">Expense Title:</label>
                            <input class="form-control" type="text" id="expense">
                        </div>
                        <div class="form-group">
                            <label for="amount">Amount:</label>
                            <input class="form-control" type="text" id="amount">
                        </div>
                        <button class="btn btn-primary form-control">Add Expense</button>
                      
                    </form>
                </div>
                <button class="btn btn-danger form-control mt-2" onclick="resetAll()">Reset All</button>

            </div>




            <div class="display-container">
                <div class="heading row" style="display: flex; justify-content: space-around;">
                    <div class="alert alert-primary" role="alert">
                        Total Budget: <span id="totalBudget">100</span>
                    </div>
                    <div class="alert alert-primary" role="alert">
                        Total Expenses: <span id="totalExpenses">100</span>
                    </div>
                    <div class="alert alert-primary" role="alert">
                        Budget Left: <span id="budgetLeft">100</span>
                    </div>
                </div>
                <hr>
                <div class="table-container table-responsive">
                    <h5>Expense History:</h5>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Expense Name</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>

                          </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
       
 <button onclick="viewData()">View Data</button>
    <div id="data"></div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
   <script>
    function viewData() {
            // Make an AJAX request to fetch data from PHP script
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    // Display the fetched data in the 'data' div
                    document.getElementById("data").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "show.php", true);
            xhttp.send();
        }



document.getElementById("expenseForm").addEventListener("submit", function(event) {
  event.preventDefault(); // Prevent the form from submitting normally
  
  // Get form values
  var date = document.getElementById("date").value;
  var type = document.getElementById("type").value;
  var amount = document.getElementById("amount").value;
  
  // Create a new XMLHttpRequest object
  var xhr = new XMLHttpRequest();
  
  // Configure the request
  xhr.open("POST", "save_expense.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  
  // Set up a function to handle the response
  xhr.onload = function() {
    if (xhr.status === 200) {
      alert("Income added successfully!");
      // You can optionally clear the form fields here
    } else {
      alert("Error adding income. Please try again.");
    }
  };
  
  // Create the data to send
  var data = "date=" + encodeURIComponent(date) + "&type=" + encodeURIComponent(type) + "&amount=" + encodeURIComponent(amount);
  
  // Send the request
  xhr.send(data);
});


</script>
    <script src="./script.js"></script>
</body>
</html>