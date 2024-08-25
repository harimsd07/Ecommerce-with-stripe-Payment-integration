<!DOCTYPE html>
<html>

<head>

    @include('home.css')

</head>

<body>
  <div class="hero_area">
   @include('home.header')
    <!-- slider section -->

        @include('home.slider')
    <!-- end slider section -->
  </div>
  <!-- end hero area -->

  <!-- shop section -->

  @include('home.shop')

  <!-- end shop section -->




  <!-- info section -->

  @include('home.footer')

</body>

</html>
