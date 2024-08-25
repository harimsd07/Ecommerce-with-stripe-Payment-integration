<!DOCTYPE html>
<html>
  <head>
    @include('admin.css')

    <style>
        .div-deg{
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 60px;
        }

        .table-deg{
            border: 2px solid greenyellow
        }

        th{
            background-color: skyblue;
            color: white;
            font-size: 19px;
            font-weight: bold;
            padding: 15PX;
        }

        td{
            border: 1px solid skyblue;
            text-align: center;
            color: white;
        }
        input[type='search']{
            width: 500px;
            height: 60px;
            margin-left: 50px;
        }
    </style>
  </head>
  <body>
    @include('admin.header')

    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <div class="page-content">
            <!-- Page Header-->
            <div class="bg-dash-dark-2 py-4">
              <div class="container-fluid">


                        <form action="{{url('product-search')}}" method="GET">
                            <input type="search" name="search">
                            <input type="submit" class="btn btn-secondary" value="Search">
                        </form>


                <div class="div-deg">
                    <table class="table-deg">
                        <tr>
                            <th>Product Title</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Image</th>
                            <th>Edit</th>
                            <th>Delete</th>

                        </tr>

                        @foreach ($product as $products )
                        <tr>
                            <td>{{$products->title}}</td>
                            <td>{!!Str::limit($products->description,50)!!}</td>
                            <td>{{$products->category}}</td>
                            <td>{{$products->price}}</td>
                            <td>{{$products->quantity}}</td>
                            <td>
                                <img height="120" width="120" src="products/{{$products->image}}" alt="">
                            </td>
                            <td>
                                <a href="{{url('update-product',$products->slug)}}" class="btn btn-success">Edit</a>
                            </td>
                            <td>
                              <a href="{{url('delete-product',$products->id)}}" onclick="confirmation(event)" class="btn btn-danger">Delete</a>
                          </td>
                        </tr>
                        @endforeach

                    </table>


                </div>
                <div class="div-deg">
                    {{$product->onEachSide(3)->links()}}
                </div>
              </div>
      </div>
    </div>



    <!-- JavaScript files-->
    @include('admin.js')


    <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  </body>
</html>

