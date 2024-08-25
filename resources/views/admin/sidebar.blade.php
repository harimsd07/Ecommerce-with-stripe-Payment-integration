<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center p-4"><img class="avatar shadow-0 img-fluid rounded-circle" src="{{asset('admincss/img/avatar-6.jpg')}}" alt="...">
      <div class="ms-3 title">
        <h1 class="h5 mb-1">Mark Stephen</h1>
        <p class="text-sm text-gray-700 mb-0 lh-1">Web Designer</p>
      </div>
    </div>
    <span class="text-uppercase text-gray-600 text-xs mx-3 px-2 heading mb-2">Main</span>
    <ul class="list-unstyled">
          <li class="sidebar-item active">
            <a class="sidebar-link" href="{{url('admin/dashboard')}}">
                  <svg class="svg-icon svg-icon-sm svg-icon-heavy">

                  </svg><span>Home </span>
                </a>
            </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{url('view-category')}}">
                  <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                    <use xlink:href="#portfolio-grid-1"> </use>
                  </svg><span>Category </span>
                </a>
            </li>

          <li class="sidebar-item"><a class="sidebar-link" href="#exampledropdownDropdown" data-bs-toggle="collapse">
                  <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                    <use xlink:href="#browser-window-1"> </use>
                  </svg><span>Products </span></a>
            <ul class="collapse list-unstyled " id="exampledropdownDropdown">
              <li><a class="sidebar-link" href="{{url('add-product')}}">Add Product</a></li>
              <li><a class="sidebar-link" href="{{url('view-product')}}">View Product</a></li>
              <li><a class="sidebar-link" href="{{url('view-order')}}">Orders</a></li>

            </ul>
          </li>
    </ul>
  </nav>
