
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
  <h2>Vertical (Edit) form</h2>
  <form action="/edit/<?php echo @$data->id ?>" method="post">
    <div class="form-group"> 
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />              <label for="Name">Name:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter name" name="name" value=<?php echo @$data->name ?>>
    </div>
    <div class="form-group">
      <label for="Email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value=<?php echo @$data->email ?>>
    </div>
    <div class="form-group">
      <label for="Number">Number:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter number" name="number" value=<?php echo @$data->number ?>>
    </div>
 
    <div class="form-group">
      <label for="Gender">gender:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter gender" name="gender" value=<?php echo @$data->gender ?>>
    </div>
 
    <div class="form-group">
      <label for="address">address:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter address" name="address" value=<?php echo @$data->address ?>>
    </div>
 
    <button type="submit" class="btn btn-default" name="edit" value=<?php echo @$data->id ?>>Submit</button>
  </form>
</div>

</body>
</html>
