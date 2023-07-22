<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        
            
               <h1>Product Edit</h1>
                    
                    <form id="productEdit"  >
                    <input type="text" name="name" placeholder="Enter Product Name" value="{{$product->name}}" class="form-control" required>
                    <input type="text" name="price" placeholder="Enter Product Price" class="form-control" value="{{$product->price}}" required>
                    <input type="text" name="description" placeholder="Enter Product Description" class="form-control" value="{{$product->description}}" required>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
            
              

</body>

</html>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script>

    $(document).ready(function(){
        $.ajaxSetup({
            headers:
            { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });
        
        $('#productEdit').on('submit',function(e){
           
            e.preventDefault();
            $.ajax({
                type:"POST",
                url:"{{url('/updateProduct/'.$product->id)}}",
                data: {
                        id="{{$product->id}}",
                        "_token": "{{ csrf_token() }}",
                        },
                success:function(response){
                    console.log(response)
                },
                error:function(error){
                    console.log(error)
                    alert("Data Not Saved");
                }
            });
        });
    });


</script> 