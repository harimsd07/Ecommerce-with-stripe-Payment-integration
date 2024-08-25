<h2 class="h5 mb-0">Dashboard</h2>
</div>
</div>
<section>
<div class="container-fluid">
<div class="row gy-4">
<div class="col-md-3 col-sm-6">
  <div class="card mb-0">
    <div class="card-body">
      <div class="d-flex align-items-end justify-content-between mb-2">
        <div class="me-2">
              <svg class="svg-icon svg-icon-sm svg-icon-heavy text-gray-600 mb-2">
                <use xlink:href="#user-1"> </use>
              </svg>
          <p class="text-sm text-uppercase text-gray-600 lh-1 mb-0">Total User</p>
        </div>
        <p class="text-xxl lh-1 mb-0 text-dash-color-1">{{$user}}</p>
      </div>
      <div class="progress" style="height: 3px">
        <div class="progress-bar bg-dash-color-1" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
    </div>
  </div>
</div>
<div class="col-md-3 col-sm-6">
  <div class="card mb-0">
    <div class="card-body">
      <div class="d-flex align-items-end justify-content-between mb-2">
        <div class="me-2">
              <svg class="svg-icon svg-icon-sm svg-icon-heavy text-gray-600 mb-2">
                <use xlink:href="#stack-1"> </use>
              </svg>
          <p class="text-sm text-uppercase text-gray-600 lh-1 mb-0">Total Product</p>
        </div>
        <p class="text-xxl lh-1 mb-0 text-dash-color-2">{{$product}}</p>
      </div>
      <div class="progress" style="height: 3px">
        <div class="progress-bar bg-dash-color-2" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
    </div>
  </div>
</div>
<div class="col-md-3 col-sm-6">
  <div class="card mb-0">
    <div class="card-body">
      <div class="d-flex align-items-end justify-content-between mb-2">
        <div class="me-2">
              <svg class="svg-icon svg-icon-sm svg-icon-heavy text-gray-600 mb-2">
                <use xlink:href="#survey-1"> </use>
              </svg>
          <p class="text-sm text-uppercase text-gray-600 lh-1 mb-0">Total Order</p>
        </div>
        <p class="text-xxl lh-1 mb-0 text-dash-color-3">{{$totalOrder}}</p>
      </div>
      <div class="progress" style="height: 3px">
        <div class="progress-bar bg-dash-color-3" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
    </div>
  </div>
</div>
<div class="col-md-3 col-sm-6">
  <div class="card mb-0">
    <div class="card-body">
      <div class="d-flex align-items-end justify-content-between mb-2">
        <div class="me-2">
              <svg class="svg-icon svg-icon-sm svg-icon-heavy text-gray-600 mb-2">
                <use xlink:href="#paper-stack-1"> </use>
              </svg>
          <p class="text-sm text-uppercase text-gray-600 lh-1 mb-0">Total Delivered</p>
        </div>
        <p class="text-xxl lh-1 mb-0 text-dash-color-4">{{$delivered}}</p>
      </div>
      <div class="progress" style="height: 3px">
        <div class="progress-bar bg-dash-color-4" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</section>


<!-- Page Footer-->
<footer class="position-absolute bottom-0 bg-dash-dark-2 text-white text-center py-3 w-100 text-xs" id="footer">
<div class="container-fluid text-center">
<!-- Please do not remove the backlink to us unless you support us at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
<p class="mb-0 text-dash-gray">2021 &copy; Your company. Design by <a href="https://bootstrapious.com">Bootstrapious</a>.</p>
</div>
</footer>
