
<!DOCTYPE html>
<html>
  <head>
    @include('admin.css')

    <style>
        .div-deg{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        label{
            display: inline-block;
            width: 150px;
            padding: 20px;
            color: white;
        }
        textarea{
            width: 450px;
            height: 100px;
        }
        input[type='text']{
            width: 300px;
            height: 60px;

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


                    <h1 style="color: white">Update Product</h1>

                    <div class="div-deg">
                        <form action="{{url('edit-product',$product->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <label >Title</label>
                                <input type="text" name="title" value="{{$product->title}}">
                            </div>
                            <div>
                                <label >Description</label>
                                <Textarea name="description">{{$product->description}}</Textarea>
                            </div>
                            <div>
                                <label >Price</label>
                                <input type="text" name="price" value="{{$product->price}}">
                            </div>
                            <div>
                                <label >Quantity</label>
                                <input type="text" name="quantity" value="{{$product->quantity}}">
                            </div>
                            <div>
                                <label >Category</label>
                                <select name="category" id="">
                                    <option value="{{$product->category}}">{{$product->category}}</option>

                                    @foreach ($category as $category )
                                            <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label >Current Image</label>
                                <img width="150" src="/products/{{$product->image}}" alt="">
                            </div>

                            <div>
                                <label >New Image</label>
                                <input type="file" name="image" style="color: white">
                            </div>
                            <br>
                            <div>
                                <input type="submit" class="btn btn-success" value="Update">
                            </div>
                        </form>
                    </div>
              </div>
      </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.js');
    <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  </body>
</html>
