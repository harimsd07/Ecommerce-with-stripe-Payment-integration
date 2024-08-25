<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   <center>
        <h3>Customer Name:{{$orderData->name}}</h3>
        <h3>Customer Address:{{$orderData->rec_address}}</h3>
        <h3>Customer phone:{{$orderData->phone}}</h3>

        <h2>product Tite:{{$orderData->product->title}}</h2>
        <h2>product Tite:{{$orderData->product->price}}</h2>

        <img height="250" width="300" src="products/{{$orderData->product->image}}" alt="">
   </center>
</body>
</html>
