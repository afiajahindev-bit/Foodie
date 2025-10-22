
<input type="text" name="rev" id="rev">
<input type="submit" value="submit" id="sbutton">
        
        
    </form>

<?php
require_once('database.php');


    $input = $_SESSION['value'];

$food_id= $input;
$rev_id = $_POST['rev'];
$user_id = $user_value['id'];


// Retrieve the user_id, rev_id, and results from the database
$sql = "SELECT user_id, rev_id, result FROM ad WHERE rev_id = '{$rev_id}' AND user_id = '{$user_id}' AND food_id = '{$food_id}'";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
  // Get the row's result value
  $resultt = $result->fetch_assoc()['result'];
} else {
  // The row does not exist, so set the result to none
  $resultt = "none";
}

// Do whatever you need with the $resultt value
// For example, you could store it in a session variable:

if(isset($_POST['results'])) {
  $resultt = $_POST['results'];
  $sql = "SELECT * FROM ad WHERE rev_id = '{$rev_id}' AND user_id = '{$user_id}'";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
  // If the row exists, perform an update or delete
  if ($resultt === "none") {
    // Delete the row
    $sql = "DELETE FROM ad WHERE rev_id = '{$rev_id}' AND user_id = '{$user_id}'";
  } else {
    // Update the row
    $sql = "UPDATE ad SET result = '{$resultt}' WHERE rev_id = '{$rev_id}' AND user_id = '{$user_id}'";
  }
} else {
  // If the row doesn't exist, perform an insert
  $sql = "INSERT INTO ad (rev_id, user_id, result) VALUES ('{$rev_id}', '{$user_id}', '{$resultt}')";
}


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<input type="hidden" id="result" value="<?php echo $resultt; ?>">
<form action="popup.php" method="POST">


        
        <input type="text" name="results" id="results">
        <input type="submit" value="submit" id="submit-button">
        
    </form>

<button class="button agree"><i class="fa-solid fa-thumbs-up fa-xl"></i><span> </span>Agree</button>
<button class="button disagree"><i class="fa-solid fa-thumbs-up fa-xl"></i><span> </span>Disagree</button>
</body>
</html>
<style>
    .button {
      width: 100px;
      height: 50px;
      background-color: #046c4e;
      border: 2px dotted #ccc;
      border-radius: 10px;
      cursor: pointer;
      margin: 10px;
      color: white;
      font-weight: bold;
      
    }

    .button.agree {
      background-color: #3b82f6;
      background-color: #1f60e0;
      color: white;
      font-weight: bold;
      padding-top: 2px;
     padding-bottom: 2px;
     padding-left: 4px;
    padding-right: 4px;
     border: 1px solid;
     border-color: #1f60e0;
     border-radius: 10px;

    }

    .button.disagree {

      background-color: #a81b1b;
      color: white;
      font-weight: bold;
      padding-top: 2px;
     padding-bottom: 2px;
     padding-left: 4px;
    padding-right: 4px;
     border: 1px solid;
     border-color: #1f60e0;
     border-radius: 10px;

    }
  </style>
 

  <script src="agree.js"></script>