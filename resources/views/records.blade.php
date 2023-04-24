<!-- <?php
echo $data;
?>

@foreach($data as $dd)




<p>{{$dd->name}}<p>
<p>{{$dd->email}}<p>
<p>{{$dd->number}}<p>
<p>{{$dd->gender}}<p>
<p>{{$dd->address}}<p>

@endforeach
 -->

<table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">email</th>
      <th scope="col">number</th>
      <th scope="col">gender</th>
      <th scope="col">address</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
  @foreach($data as $dd)
  <?php  $i=1;?>
  <tr>
      <td>{{$dd->name}}</td>
      <td>{{$dd->email}}</td>
      <td>{{$dd->number}}</td>
      <td>{{$dd->gender}}</td>
      <td>{{$dd->address}}</td>
      <td>
      <form method="post" action="/edit">
      <input type="hidden" name="_token" value="{{ csrf_token() }}" />              
     <button type="submit" name="edit" value=<?php echo $dd->id;?>>edit</button>
      <button type="submit" name="delete" value=<?php echo $dd->id;?>>delete</button>
      <form>
      </td>
      
    </tr>
    <?php  $i++;?>
        @endforeach
  </tbody>
</table>