<div class="sidebar">
  <div class="sidebar-inner">
    <!-- ### $Sidebar Header ### -->
    <div class="sidebar-logo">
      <div class="peers ai-c fxw-nw">
        <div class="peer peer-greed">
          <a class='sidebar-link td-n' href="{{ URL('/')}}" class="td-n">
            <div class="peers ai-c fxw-nw">
              <div class="peer">
                <div class="logo">
                <img src="{{ asset('images/logo-survenia-color.png') }}" class="logo-dark" alt="Survenia" width="250px" height="65px">
                </div>
              </div>
              <div class="peer peer-greed">

              </div>
            </div>
          </a>
        </div>
        <div class="peer">
          <div class="mobile-toggle sidebar-toggle">
            <a href="" class="td-n">
              <i class="ti-arrow-circle-left"></i>
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- ### $Sidebar Menu ### -->
    <ul class="sidebar-menu scrollable pos-r">
      @include('admin.partials.menu')
    </ul>
  </div>
</div>