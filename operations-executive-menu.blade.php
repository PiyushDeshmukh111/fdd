<aside id="layout-menu" class="layout-menu-horizontal menu-horizontal  menu bg-menu-theme flex-grow-0">
  <div class="container-xxl d-flex h-100">
    
    
    <ul class="menu-inner">

      <!-- Dashboards -->
      <li class="menu-item">
        <a href="javascript:void(0)" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Dashboards">Dashboards</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="dashboards-analytics.html" class="menu-link">
              <i class="menu-icon tf-icons bx bx-pie-chart-alt-2"></i>
              <div data-i18n="Analytics">Analytics</div>
            </a>
          </li>
        </ul>
      </li>

      <!-- Layouts -->
      

      <!-- Apps -->
      <li class="menu-item">
        <a href="javascript:void(0)" class="menu-link menu-toggle">
          <i class='menu-icon tf-icons bx bx-customize'></i>
          <div data-i18n="Payment Request">Payment Request</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{url('OperationsExecutive/paymentRequestList')}}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-calendar"></i>
              <div data-i18n="All Request">All Request</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="{{url('OperationsExecutive/paymentRequest')}}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-calendar"></i>
              <div data-i18n="Create Request">Create Request</div>
            </a>
          </li>
        </ul>
      </li>

     
      

      <!-- Components -->
      <li class="menu-item">
        <a href="javascript:void(0)" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-code-block"></i>
          <div data-i18n="Components">Components</div>
        </a>
        <ul class="menu-sub">
          <!-- Cards -->
          
          <!-- User interface -->
          <li class="menu-item">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-box"></i>
              <div data-i18n="User interface">User interface</div>
            </a>
          </li>
          <li class="menu-item">
         <a href="{{url('OperationsExecutive/createuser')}}" class="menu-link">
 class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-box"></i>
              <div data-i18n="User add">User Add</div>
            </a>
          </li>
        </ul>
      </li>
    


    </ul>
    
    
  </div>
</aside>