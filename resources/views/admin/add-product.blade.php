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
        h1{
            color: white;
        }

        label{
            display: inline-block;
            width: 200px;
            font-size: 18px;
            color: white;
        }

        input[type='text']{
            width: 350px;
            height: 50px;
        }

        textarea{
            width: 450px;
            height: 80px;
        }

        .input-deg{
            padding: 15px;
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

                <h1>Add Product</h1>
                <div class="div-deg">
                    <form action="{{url('upload-product')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="input-deg">
                            <label >Product Title</label>
                            <input type="text" name="title">
                        </div>

                        <div class="input-deg">
                            <label >Description</label>
                           <textarea name="description" required></textarea>
                        </div>

                        <div class="input-deg">
                            <label >Price</label>
                            <input type="text" name="price">
                        </div>

                        <div class="input-deg">
                            <label >Quantity</label>
                            <input type="number" name="quantity">
                        </div>

                        <div class="input-deg">
                            <label >Product Category</label>
                            <select required name="category">
                                <option >Select a Option</option>
                                @foreach ($category as $category )
                                <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="input-deg">
                            <label >Product Image</label>
                            <input type="file" name="image">
                        </div>

                        <div class="input-deg">

                            <input type="submit" value="Add Product" class="btn btn-success">
                        </div>

                    </form>
                </div>

              </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/just-validate/js/just-validate.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/choices.js/public/assets/scripts/choices.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <!-- Main File-->
    <script src="{{asset('admincss/js/front.js')}}"></script>
    <script>
      // ------------------------------------------------------- //
      //   Inject SVG Sprite -
      //   see more here
      //   https://css-tricks.com/ajaxing-svg-sprite/
      // ------------------------------------------------------ //
      function injectSvgSprite(path) {

          var ajax = new XMLHttpRequest();
          ajax.open("GET", path, true);
          ajax.send();
          ajax.onload = function(e) {
          var div = document.createElement("div");
          div.className = 'd-none';
          div.innerHTML = ajax.responseText;
          document.body.insertBefore(div, document.body.childNodes[0]);
          }
      }
      // this is set to BootstrapTemple website as you cannot
      // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
      // while using file:// protocol
      // pls don't forget to change to your domain :)
      injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg');


    </script>
    <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  </body>
</html>
