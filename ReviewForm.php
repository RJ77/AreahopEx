<!DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" type="text/css" href="bootstrap.min.css" />
	<title>Review</title>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-6 col-md-offset-6"></div>
<form name="reviewForm" >

  
  <!--  Review Form -->
  <h4>Submit a Review</h4>

  <fieldset class="form-group">
    <select class="form-control" id="select1">
      <option value>Choose Hotel</option>
    </select>
  </fieldset>
  <fieldset class="form-group">
    <select class="form-control" id="select2">
      <option value>Select Rating</option>
    </select>
  </fieldset>

  <fieldset class="form-group">
    <textarea  class="form-control" id="review" placeholder="Write a short review of the product..." ></textarea>
  </fieldset>
  <fieldset class="form-group">
    <input  type="email" class="form-control" id="email" placeholder="xyz@example.com"  />
  </fieldset>
  <fieldset class="form-group">
    <input type="submit" class="btn btn-primary pull-right" value="Submit Review" />
  </fieldset>
</form>
</div>
</div>
</body>
</html>