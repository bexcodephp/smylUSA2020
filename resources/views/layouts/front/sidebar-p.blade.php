<button type="button" class="btn position-absolute d-md-none d-block open-sidebar-btn" id="open_sidebar_btn">
  <i class="fas fa-ellipsis-v"></i>
</button>
<aside class="aside aside-p col-lg" id="aside">
  <button type="button" class="btn position-absolute d-md-none d-block close-sidebar-btn" id="close_sidebar_btn">
    <i class="fas fa-times"></i>
  </button>
  <div class="header-sidebar mb-3">
    <h2 class="color-blue text-bold sidebar-title">Welcome</h2>
    <h2 class="color-gray text-bold sidebar-subtitle">User Name</h2>
  </div>
  <ul class="list-group">
    <li class="list-group-item @if (Request::is('pDashboard'))active @endif">
      <a class="" href="{{ url('pDashboard') }}">Dashboard</a>
    </li>
    <li class="list-group-item @if (Request::is('patient-profile'))active @endif">
      <a class="" href="{{ url('patient-profile') }}">My Profile</a>
    </li>
    <li class="list-group-item @if (Request::is('patient-picture'))active @endif">
      <a class="" href="{{ url('patient-picture') }}">My Pictures</a>
    </li>
    <li class="list-group-item @if (Request::is('patient-orders'))active @endif">
      <a class="" href="{{ url('patient-orders') }}">My Orders</a>
    </li>
    <li class="list-group-item @if (Request::is('pPaymentPlan'))active @endif">
      <a class="" href="{{ url('pPaymentPlan') }}">Payment Plan</a>
    </li>
    <li class="list-group-item @if (Request::is('pResources'))active @endif">
      <a class="" href="{{ url('pResources') }}">Resources</a>
    </li>
  </ul>
</aside>