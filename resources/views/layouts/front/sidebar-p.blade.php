<button type="button" class="btn position-absolute d-lg-none d-block open-sidebar-btn" id="open_sidebar_btn">
  <i class="fas fa-ellipsis-v"></i>
</button>
<aside class="aside aside-p col-lg" id="aside">
  <button type="button" class="btn position-absolute d-lg-none d-block close-sidebar-btn" id="close_sidebar_btn">
    <i class="fas fa-times"></i>
  </button>
  <div class="header-sidebar mb-3">
    <h2 class="color-blue text-bold sidebar-title">Welcome</h2>
    {{-- <h2 class="color-gray text-bold sidebar-subtitle">{{ auth()->user()->name }}</h2> --}}
    <h2 class="color-gray text-bold sidebar-subtitle">User Name</h2>
  </div>
  <ul class="list-group">
    <li class="list-group-item @if (Request::is('dashboard'))active @endif">
      <a class="" href="{{ url('dashboard') }}">Dashboard</a>
    </li>
    <li class="list-group-item @if (Request::is('profile'))active @endif">
      <a class="" href="{{ url('profile') }}">My Profile</a>
    </li>
    <li class="list-group-item @if (Request::is('patient-picture'))active @endif">
      <a class="" href="{{ url('patient-picture') }}">My Pictures</a>
    </li>
    <li class="list-group-item @if (Request::is('patient-orders'))active @endif">
      <a class="" href="{{ url('patient-orders') }}">My Orders</a>
    </li>
    <li class="list-group-item @if (Request::is('patient-payment'))active @endif">
      <a class="" href="{{ url('patient-payment') }}">Payment Plan</a>
    </li>
    <li class="list-group-item @if (Request::is('patient-resources'))active @endif">
      <a class="" href="{{ url('patient-resources') }}">Resources</a>
    </li>
  </ul>
</aside>