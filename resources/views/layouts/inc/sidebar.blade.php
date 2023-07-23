<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo"><a href="{{'/'}}" class="simple-text logo-normal">
        Barbatos Shop
      </a></div>
    <div class="sidebar-wrapper">
      <ul class="nav">
        <li class="nav-item {{Request::is('dashboard') ? 'active':''}}">
          <a class="nav-link" href="{{url('dashboard')}}">
            <i class="material-icons">dashboard</i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item  ">
          <a class="nav-link" href="{{url('/panel')}}">
            <i class="material-icons">person</i>
            <p>User Profile</p>
          </a>
        </li>

        <li class="nav-item {{Request::is('categories') ? 'active':''}} ">
            <a class="nav-link" href="{{ url('categories') }}">
              <i class="material-icons">content_paste</i>
              <p>Categories</p>
            </a>
          </li>

          <li class="nav-item {{Request::is('add-categories') ? 'active':''}} ">
            <a class="nav-link" href="{{ url('add-categories') }}">
              <i class="material-icons">content_paste</i>
              <p>Add Categories</p>
            </a>
          </li>

        <li class="nav-item {{Request::is('product') ? 'active':''}} ">
          <a class="nav-link" href="{{ url('product') }}">
            <i class="material-icons">content_paste</i>
            <p>Products</p>
          </a>
        </li>

        <li class="nav-item {{Request::is('add-product') ? 'active':''}} ">
            <a class="nav-link" href="{{ url('add-product') }}">
              <i class="material-icons">content_paste</i>
              <p>Add Product</p>
            </a>
          </li>

          <li class="nav-item {{Request::is('slider') ? 'active':''}} ">
            <a class="nav-link" href="{{ url('slider') }}">
              <i class="material-icons">content_paste</i>
              <p>Slider Image</p>
            </a>
          </li>

          <li class="nav-item {{Request::is('add-slider') ? 'active':''}} ">
            <a class="nav-link" href="{{ url('add-slider') }}">
              <i class="material-icons">content_paste</i>
              <p>Add Slider</p>
            </a>
          </li>

      </ul>
    </div>
  </div>
