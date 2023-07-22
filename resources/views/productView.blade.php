<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <div class="container">
            <div class="card-body">
                    
            </div>



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
                                        <a href="{{route('product.edit',$product->id)}}">Edit</a>
                                        <a href="{{route('product.delete',$product->id)}}">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

</body>
</html>