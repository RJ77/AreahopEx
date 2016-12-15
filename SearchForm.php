<?php
session_start();
include("Connection.php");
?>
<!DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" type="text/css" href="bootstrap.min.css" />
	<title>Search</title>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-6 col-md-offset-3">
<form name="reviewForm" >

  
  <!--  Review Form -->
  <h4>Search Hotel</h4>

  <fieldset class="form-group">
    Choose Hotel :<select class="form-control" id="select1">
      <?php 
      $qry="SELECT * FROM hotel"; 
      $res= mysql_query($qry); 
      while($row = mysql_fetch_array($res)){
      	echo "<option value='".$row['NAME']."'>".$row['NAME']."</option>";
      }
      ?>
    </select>
  </fieldset>
   <fieldset class="form-group">
    <input type="button" onclick="find()" class="btn btn-primary pull-right" value="Search" />
  </fieldset>
</form>
 <table  class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Date</th>
                        <th>Hotel Name</th>
                        <th>Review</th>
                        <th>Stars</th>
                        <th>User Email</th>
                      </tr>
                    </thead>
                    <tbody id="items">
                      
                     </tbody>
           </table>
</div>
</div>
</div>
 <script src="jQuery-2.1.4.min.js"></script>
 <script type="text/javascript">
  function find(){
    var s1= $('#select1').val();
   
     $.ajax({
                                  url: 'showData.php',
                                  type: 'POST',
                                  data: {s1:s1},
                                  dataType: 'json',
                                 success:function(result){
                                        $("#items").empty();
                                        $.each(result, function(i, val){
                                           var tr = "<tr>" +
                                                 "<td>"+ val.DATE + "</td>" +
                                                 "<td>"+ val.HOTEL + "</td>" +
                                                 "<td>"+ val.REVIEW + "</td>" +
                                                 "<td>"+ val.STARS+ "</td>" +
                                                 "<td>"+ val.EMAIL+ "</td></tr>";
                                                 $(tr).appendTo("#items");
                                        }); 
                                                        }

                });
  }
 </script>
</body>
</html>
