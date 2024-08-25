<!DOCTYPE html>
<html>
  <head>
    @include('admin.css')

    <style type="text/css">
        table{
            border:2px solid skyblue;
            text-align: center;
            width: 1050px;
        }
        th{
            background-color: skyblue;
            padding: 7px;
            font-size: 15px;
            font-weight: bold;
            text-align: center;
            color: white;
        }

        td{
            color: white;
            padding: 15px;
            border: 1px solid skyblue;
        }
        .table-center{
            display: flex;
            justify-content: center;
            align-items: center;

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
                <h1 style="color: white">Order Details</h1>
                <br>
               <div class="mt-8 table-center">

                <table>
                    <tr>
                        <th>Costomer Name</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Product Title</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Change Status</th>
                        <th>Print PDF</th>
                    </tr>
                    @foreach ($orders as $order)
                    <tr>
                        <td>{{$order->name}}</td>
                        <td>{{$order->rec_address}}</td>
                        <td>{{$order->phone}}</td>
                        <td>{{$order->product->title}}</td>
                        <td>{{$order->product->price}}</td>
                        <td>
                            <img width="150" src="products\{{$order->product->image}}" alt="">
                        </td>
                        <td>
                            @if($order->status == 'in progress')
                                <span style="color: red">{{$order->status}}</span>
                            @elseif ($order->status == 'On the Way')
                                <span style="color:goldenrod">{{$order->status}}</span>
                            @else
                                <span style="color: greenyellow">{{$order->status}}</span>
                            @endif
                            </td>
                        <td>
                            <div class="flex space-x-2">
                                <a href="{{url('ontheWay',$order->id)}}" class="mb-3 btn btn-primary"> On the Way</a>
                            <a href="{{url('delivered',$order->id)}}" class="btn btn-success"> Delivered</a>
                            </div>
                        </td>
                        <td >
                            <a href="{{url('print-PDF',$order->id)}}" class="btn btn-secondary"> Print PDF</a>
                        </td>
                    </tr>
                    @endforeach

                </table>
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
