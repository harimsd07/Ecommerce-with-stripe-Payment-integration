<script type="text/javascript">
    function confirmation(ev){
        ev.preventDefault();

        var urlToRedirect = ev.currentTarget.getAttribute('href');
        console.log(urlToRedirect);

        swal({
             title:"Are you Sure to Delete This ?",
             text:"This will delete permenently",
             icon:"warning",
             buttons:true,
             dangerMode:true,
        })

        .then((willCancel)=>{
            if(willCancel){
                window.location.href=urlToRedirect;
            }
        });
    }
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
