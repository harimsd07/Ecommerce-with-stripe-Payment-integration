
<!DOCTYPE html>
<html>

<head>

    @include('home.css')

    <style>
        .div-deg{
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 60px;
        }
        table{
            border: 2px solid black;
            text-align: center;
            width: 800px;
        }
        th{
            border: 2px solid black;
            text-align: center;
            color: white;
            font: 20px;
            font-weight: bold;
            background-color:black;
        }
        td{
            border: 1px solid black;
        }
        .cart-value{
            margin-bottom: 70px;
            padding: 18px;
            text-align: center;
        }
        .order-deg{
            padding-right: 100px;
            margin-top: 30px;
        }
        label{
            display: inline-block;
            width: 150px;
        }
        /* .div-gap{
            padding: 20px;
        } */
    </style>

</head>

<body>
  <div class="hero_area">
   @include('home.header')
    <!-- slider section -->

   <div class="div-deg">


        <table>
            <tr>
                <th>Product Tittle</th>
                <th> Price</th>
                <th> Image</th>
                <th>Remove</th>
            </tr>

            <?php
                $value = 0;
            ?>
            @foreach ($cart as $cart)
            <tr>
                <td>{{$cart->product->title}}</td>
                <td>{{$cart->product->price}}</td>
                <td>
                    <img width="150" src="/products/{{$cart->product->image}}" alt="">
                </td>
                <td>
                    <a href="{{url('delete-cart',$cart->id)}}" class="btn btn-danger">Remove</a>
                </td>
            </tr>

            <?php
                $value = $value + $cart->product->price
            ?>
            @endforeach

        </table>
   </div>

   <div class="cart-value">
    <h3>Total Value of the Cart: ${{$value}}</h3>
   </div>

   <div class="order-deg" style=" display: flex;
            justify-content: center;
            align-items: center;">
    <form action="{{url('confirm-order')}}" method="POST">
        @csrf
        <div>
            <label class="div-gap">Reciver Name</label>
            <input type="text" name="name" value="{{Auth::user()->name}}">
        </div>
        <div>
            <label class="div-gap" >Reciver Address</label>
           <textarea name="address" >{{Auth::user()->address}}</textarea>
        </div>
        <div>
            <label class="div-gap">Phone No</label>
            <input type="text" name="phone" value="{{Auth::user()->phone}}">
        </div>
        <div class="div-gap">

            <input type="submit" class="mt-3 btn btn-primary" value="Cash on Delivery">

            <a href="{{url('stripe',$value)}}" class="btn btn-success mt-3">Pay Using Card</a>
        </div>
    </form>
   </div>
   <br>

  @include('home.footer')

</body>

</html>
