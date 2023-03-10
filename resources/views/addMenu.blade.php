@component('nav-bar')
@endcomponent

<style>

.addMenu-section{
  position: fixed;
  top: 0;
  left: 160px;
  width: calc(100% - 158px);
  transition: all 0.5s ease;
display: flex; 
align-items: center; 
justify-content: center; 
height: 100vh;

  z-index: 2;
}
.sidebar.open ~ .addMenu-section{
  left: 300px;
  width: calc(100% - 300px);
}
.addMenu-section .text{
  display: inline-block;
  color: #11101d;
  font-size: 25px;
  font-weight: 500;
  margin: 20px;
}




  .form {
    margin: 0 auto;
    width: 500px;
    padding: 30px;
    background-color: #f7f7f7;
    border-radius: 10px;
  }
  .form-group {
    margin-bottom: 25px;
  }
  label {
    font-weight: 600;
  }
  input[type="text"],
  textarea.form-control {
    height: 40px;
    border-radius: 5px;
    border: 1px solid #ccc;
    padding: 10px;
    width: 100%;
    font-size: 16px;
  }
  input[type="number"] {
    height: 40px;
    border-radius: 5px;
    border: 1px solid #ccc;
    padding: 10px;
    width: 100%;
    font-size: 16px;
  }
  select.form-control {
    height: 40px;
    border-radius: 5px;
    border: 1px solid #ccc;
    padding: 10px;
    width: 100%;
    font-size: 16px;
  }
  .form-control-file {
    margin-top: 10px;
  }
  #save-button {
    width: 100%;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    height: 40px;
    font-size: 16px;
    cursor: pointer;
    margin-top: 20px;
  }


  .form {
    width: 50%;
    margin: 0 auto;
    padding: 20px;
    background-color: #f2f2f2;
    border-radius: 10px;
  }
  
  .form-control-file {
    background-color: #ffffff;
    border: 1px solid #dddddd;
    border-radius: 10px;
    padding: 10px;
  }
  
  #save-button {
    width: 100%;
    background-color: #007bff;
    color: #ffffff;
    border: none;
    border-radius: 10px;
    padding: 10px;
    margin-top: 20px;
    cursor: pointer;
  }

  #back-button {
    width: 100%;
    background-color: #ffd000;
    color: #ffffff;
    border: none;
    border-radius: 10px;
    padding: 10px;
    margin-top: 20px;
    cursor: pointer;
  }

</style>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.3.slim.js" integrity="sha256-DKU1CmJ8kBuEwumaLuh9Tl/6ZB6jzGOBV/5YpNE2BWc=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<div class="addMenu-section">
  <div class="form">
<h1>Add Menu</h1>
<form class=""  id="my-form" method="post" action="{{ route('saveItemRoute') }}" accept-charset="UTF-8" enctype="multipart/form-data" >
                {{ csrf_field() }}
  <div class="form-group ">
    <label for="name">Menu Name</label>
    <br>
    <input type="text" name="name" class="form-control" id="menuName" aria-describedby="menuName" placeholder="Enter menu name" required>
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <br>
    <textarea class="form-control" placeholder="Description" name="description" id="description" rows="3" required></textarea>
  </div>
  <div class="form-group">
    <label for="price" name="listItem">Price</label>
    <br>
    <input type="number" name="price" class="form-control" id="price" placeholder="Enter price" required min="1">
  </div>
  <div class="form-group">
    <label for="category" name="listItem">Category</label>
    <br>
    <select class="form-control"  name="category"id="category" required>
      <option>Breakfast</option>
      <option>Lunch</option>
      <option>Dinner</option>
      <option>Dessert</option>
    </select>
  </div>
  <br>
  <div class="form-group">
    <div class="preview">
    <img  src="" alt="" id="file-ip-1-preview">
    <label for="image">Upload Image</label>
    <br>
    <input type="file" id="file-ip-1" accept="image/*" onchange="showPreview(event);" name="image" class="form-control-file" id="image">

    </div>
  </div>


  <button type="submit"  id="save-button" onclick="validateForm()" class="btn btn-primary">Submit</button>
</form>

<br>
<form action="{{route('crud')}}">
        {{ csrf_field()}}
<button id="back-button"class="btn btn-warning">Back</button>
</form>






  </div>
</div>

<script>
  function showPreview(event){
    if(event.target.files.length > 0){
      var src = URL.createObjectURL(event.target.files[0]);
      var preview = document.getElementById("file-ip-1-preview");
      preview.src = src;
      preview.style.display ="block";
      preview.style.width = "100px";
      preview.style.height = "100px";
    }
  }
</script>


<script>
    document.getElementById('my-form').addEventListener('submit', function(event) {
        // Prevent the default form submission
        event.preventDefault();
        // Show an alert message
Swal.fire(
  'Good job!',
  'You clicked the button!',
  'success'
)
        // Submit the form
        this.submit();
    });
</script>

