@component('nav-bar')
@endcomponent

<style>
.styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);

}

table{
    min-width: 10vw;
    width: 70vw;
    padding: 5rem;
    border-radius: 40px;
    
}
th{
    padding: 20px;
}

td{
    text-align: center;
    padding: 20px;
}

button{
    border-radius: 40px;
    padding: 10px;
    margin: 2px;
    
}


</style>



<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.3.slim.js" integrity="sha256-DKU1CmJ8kBuEwumaLuh9Tl/6ZB6jzGOBV/5YpNE2BWc=" crossorigin="anonymous"></script>

<div class="crud-section">

    <br>

    <form action="{{route('addMenu')}}">
        {{ csrf_field()}}
<button class="btn btn-primary">create</button>
</form>


<!--Modal-->




 <table class="styled-table">
      <thead>
        <tr>
          <th>Name</th>
          <th>Description</th>
          <th>Price</th>
          <th>Category</th>
          <th>Image</th>
          <th>Delete</th>
          <th>Edit</th>
        </tr>
      </thead>
      <tbody>

            @foreach ($listItems as $listItem)
        <tr>
          <td>{{$listItem->name}}</td>
          <td>{{$listItem->description}}</td>
          <td>${{$listItem->price}}</td>
          <td>{{$listItem->category}}</td>
          <!--<td><img src="product1.jpg" alt="Product 1" style="width: 100px;"></td>-->
          <td><img src="{{ asset('/img/' . $listItem->image) }}" alt="{{ $listItem->name }}" style="width: 100px; height:100px;"></td>
          <td>
            <form id="myForm" method="post" action="{{ route('markCom', $listItem->id) }}" accept-charset="UTF-8">
                {{ csrf_field() }}

            <button type="submit" class="delete" style=" background-color:rgb(194, 2, 2); color:white;">
                <i class='bx bxs-message-alt-x'></i> Delete
                </button>

            </form> 
            </td>
            <td>

              <a href="{{url('editMenu', $listItem->id)}}">
<button type="submit" class="update btn btn-success">

<i class='bx bx-edit-alt' ></i>
  edit</button>



              </a>

</a>
</button>
</td>



 

        </tr>

           @endforeach

</tbody>
    </table>
<script src="https://code.jquery.com/jquery-3.6.3.slim.js" integrity="sha256-DKU1CmJ8kBuEwumaLuh9Tl/6ZB6jzGOBV/5YpNE2BWc=" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>





<script>
$(document).on('click', '.delete', function(event) {
  event.preventDefault();
  let form = $(this).closest('form');

  Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, submit it!'
  }).then((result) => {
    if (result.value) {
      form.submit();
    }
  });
});



  


</script>

<div class="d-flex justify-content-center">

      {{$listItems->links()}} 

</div>
</div>


