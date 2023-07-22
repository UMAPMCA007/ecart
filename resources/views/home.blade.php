@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                  
                  
                 <h1>Add Product</h1>
                    
                    <form 
                    method="POST"
                    action="{{url('/store')}}"
                    enctype="multipart/form-data"
                    >
                    @csrf
                    
                    <input type="text" name="name" placeholder="Enter Product Name" class="form-control" required>
                    <input type="text" name="price" placeholder="Enter Product Price" class="form-control" required>
                    <input type="text" name="description" placeholder="Enter Product Description" class="form-control" required>
                    <input type="file" name="image" class="form-control" required>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                    <h2>product Table</h2>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>name</th>
                                    <th>price</th>
                                    <th>description</th>
                                    <th>image</th>
                                    <th>action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                <tr>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->description}}</td>
                                    <td><img src="{{asset('storage/'.$product->image)}}" alt="" width="100"></td>
                                    <td>
                                        <a href="{{url('/edit',$product->id)}}">Edit</a>
                                        <a href="{{url('/delete',$product->id)}}">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                    
                   
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script>

    $(document).ready(function(){
        
        $('#addProduct').on('submit',function(e){
            e.preventDefault();
            $.ajax({
                type:"POST",
                url:"{{url('/store')}}",
                data:$('#addProduct').serialize(),
                success:function(response){
                    console.log(response)
                    $('#productAdd').modal('hide')
                    alert("Data Saved");
                },
                error:function(error){
                    console.log(error)
                    alert("Data Not Saved");
                }
            });
        });
    });


</script> 
@endsection
