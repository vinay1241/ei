<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Vertical (basic) form</h2>
  <form action="/create-user" method="post">
    <div class="form-group">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />              <label for="Name">Name:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter name" name="name">
    </div>
    <div class="form-group">
      <label for="Email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="Number">Number:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter number" name="number">
    </div>
 
    <div class="form-group">
      <label for="Gender">gender:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter gender" name="gender">
    </div>
 
    <div class="form-group">
      <label for="address">address:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter address" name="address">
    </div>
 
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body>
</html>
