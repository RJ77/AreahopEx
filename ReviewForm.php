<?php
session_start();
include("Connection.php");
?>
<!DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" type="text/css" href="bootstrap.min.css" />
	<title>Review</title>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-6 col-md-offset-3">
<form name="reviewForm" >

  
  <!--  Review Form -->
  <h4>Submit a Review</h4>

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
    Select Rating:<select class="form-control" id="select2">
      <option value="5">5</option>
      <option value="4">4</option>
      <option value="3">3</option>
      <option value="2">2</option>
      <option value="1">1</option>

    </select>
  </fieldset>

  <fieldset class="form-group">
    <textarea  class="form-control" id="review" placeholder="Write a short review of the product..." ></textarea>
  </fieldset>
  <fieldset class="form-group">
    <input  type="email" class="form-control" id="email" placeholder="xyz@example.com"  />
  </fieldset>
  <fieldset class="form-group">
  <a href="index.html" class="btn btn-primary pull-left">Home</a>
    <input type="button" onclick="add()" class="btn btn-primary pull-right" value="Submit Review" />
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
 	function add(){
 		var s1= $('#select1').val();
 		var s2= $('#select2').val();
 		var r= $('#review').val();
 		var e= $('#email').val();
 		 $.ajax({
                                  url: 'addData.php',
                                  type: 'POST',
                                  data: {s1:s1,s2:s2,r:r,e:e},
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