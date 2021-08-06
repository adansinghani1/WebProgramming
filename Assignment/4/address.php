<?php
include 'dbconnect.php';

if(isset($_POST['submit'])){
  $firstname = mysqli_real_escape_string($conn,$_POST['firstname']);
  $lastname = mysqli_real_escape_string($conn,$_POST['lastname']);
  $address = mysqli_real_escape_string($conn,$_POST['address']);
  $number = mysqli_real_escape_string($conn,$_POST['number']);
  $emailid = mysqli_real_escape_string($conn,$_POST['emailid']);
  $alt = mysqli_real_escape_string($conn,$_POST['alt']);



$query = "INSERT INTO addressbook(firstname,lastname,address,number,emailid,alt) VALUES('$firstname','$lastname','$address','$number','$emailid','$alt')";

if(mysqli_query($conn,$query)){
  header('Location:address.php');

}
else {
  echo "Error".mysqli_error($conn);
}
}

//get all contact list
//query
$query = 'select *from addressbook';
//get result
$result = mysqli_query($conn,$query);
//get allpost in array
$contacts = mysqli_fetch_all($result,MYSQLI_ASSOC);

//delete the contact details here
if(isset($_POST['delete'])){
  $id = $_POST['id'];
  $query = "delete from addressbook where id=$id";

  if(mysqli_query($conn,$query)){
    echo "<script>window.alert('Deleted!');</script>";
    header('Location:address.php');

  }
  else {
    echo "<script>window.alert('Failed To Delete!');</script>";
  }
}



if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `addressbook` WHERE CONCAT(`id`, `firstname`, `lastname`, `address`, 'number', 'emailid', 'alt') LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `adressbook`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "address");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>
 ?>
<html>
  <head>
    <script src="js/jquery-1.11.2.js"></script>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <title>My Address book</title>
  </head>
  <body>
    <div class="container text-center col-lg-12">
      <h2>My Address Book</h2>
        <div class="col-lg-12 text-center">
          <h3>Add a new Address List</h3>
          <form method="post">
            <div class="form-group">
              <label for="new-first-name">Enter First name</label>
              <input type="text" name="firstname" class="form-control" id="new-first-name">
            </div>
            <div class="form-group">
              <label for="new-last-name">Enter Last name</label>
              <input type="text" name="lastname" class="form-control" id="new-last-name">
            </div>
            <div class="form-group">
              <label for="new-address">Enter Address</label>
              <input type="text" name="address" class="form-control" id="new-address">
            </div>
	         <div class="form-group">
              <label for="new-number">Enter Phone Number</label>
              <input type="text" name="number" class="form-control" id="new-number">
            </div>
            <div class="form-group">
              <label for="new-email">Enter e-Mail</label>
              <input type="text" name="emailid" class="form-control" id="new-email">
            </div>
           <div class="form-group">
              <label for="new-address">Enter Alt e-Mail</label>
              <input type="text" name="alt" class="form-control" id="new-alt">
            </div>

            <input type="submit" name="submit" class="btn btn-primary">
          </form>

          </div>
        </div>

          <div class="container col-lg-5 text-center" id="data-col">
          <h2>Contacts:</h2>
          <body>
        
        <form action="php_html_table_data_filter.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
            <input type="submit" name="search" value="Filter"><br><br>
            
            <table>
                <tr>
                <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Address</th>
                    <th>Number</th>
                    <th>e-Mail</th>
                    <th>Alt e-Mail</th>   
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                <td><?php echo $contact['firstname']; ?></td>
                <td><?php echo $contact['lastname']; ?></td>
                <td><?php echo $contact['address']; ?></td>
                <td><?php echo $contact['number']; ?></td>
                <td><?php echo $contact['emailid']; ?></td>
                <td><?php echo $contact['alt']; ?></td>
                </tr>
                <?php endwhile;?>
            </table>
        </form>
        
    </body>
</html>
          <ul class="list-group">
          </ul>
                <table class="table table-hovered">
                  <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Address</th>
                    <th>Number</th>
                    <th>e-Mail</th>
                    <th>Alt e-Mail</th>                    
                  </tr>
              <?php
                foreach ($contacts as $contact) {
                  ?>
                    <tr>
                      <td><?php echo $contact['firstname']; ?></td>
                      <td><?php echo $contact['lastname']; ?></td>
                      <td><?php echo $contact['address']; ?></td>
                      <td><?php echo $contact['number']; ?></td>
                      <td><?php echo $contact['emailid']; ?></td>
                      <td><?php echo $contact['alt']; ?></td>
                      <td><a href="edit.php?id=<?php echo $contact['id']; ?>">Edit</a></td>
                      <td><form method="post"><input type="hidden" name="id" value="<?php echo $contact['id']; ?>">                      
                      <input type="submit" name="delete" value="Delete" class="btn btn-danger"></form></td>

                    </tr>
                  <?php
                }
               ?>
             </table>
        </div>
      <footer class="text-center"><p>Assignment 4</p></footer>
  </body>
</html>
