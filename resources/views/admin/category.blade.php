<!DOCTYPE html>
<html>
  <head>

    @include('admin.css')

    <style type="text/css">

    input[type='text']
    {
        width:400px;
        height: 50px;
    }

    .div_design{
        display: flex;
        justify-items: center;
        justify-content: center;
        margin: 30px;
    }
    .table_deg{
        text-align: center;
        margin: auto;
        border: 2px solid yellowgreen;
        margin-top: 50px;
        width: 600px
    }

    th{
        background-color: skyblue;
        padding: 15px;
        font-size: 20px;
        font-weight: bold;
        color: white;
    }

    td{
        color: white;
        padding: 10px;
        border: 1px solid skyblue;
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

                <h1 style="color: white">Add Category</h1>
                <div class="div_design">
                <form action="{{url('add-category')}}" method="POST">
                    @csrf
                    <div>
                        <input type="text" name="category">
                        <input class="btn btn-primary" type="submit" value="Add Category">
                    </div>
                </form>
              </div>
            </div>

            <div>

                <table class="table_deg">

                    <tr>
                        <th>Category</th>

                        <th>Edit</th>

                        <th>Delete</th>
                    </tr>
                    @foreach ($categories as $category )
                    <tr>
                        <td>{{$category->category_name}}</td>
                        <td>
                            <a href="{{url('edit-category',$category->id)}}" class="btn btn-success">Edit</a>
                        </td>
                        <td>
                            <a href="{{url('delete-category',$category->id)}}" onclick="confirmation(event)" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach

                </table>

            </div>
      </div>
    </div>
    <!-- JavaScript files-->
   @include('admin.js')



    <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  </body>
</html>
