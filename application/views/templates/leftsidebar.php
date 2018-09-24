<!-- START LEFT SIDEBAR NAV-->
<aside id="left-sidebar-nav" class="nav-expanded nav-lock nav-collapsible">
  <div class="brand-sidebar">
    <h1 class="logo-wrapper">
      <a href="/" class="brand-logo darken-1">
        <img src="<?php echo asset_url();?>images/logo.png" alt="logo">
        <span class="logo-text hide-on-med-and-down">Tracker</span>
      </a>
      <a href="#" class="navbar-toggler">
        <i class="material-icons">radio_button_checked</i>
      </a>
    </h1>
  </div>
  <ul id="slide-out" class="side-nav fixed leftside-navigation">
    <li class="no-padding">
    <li <?php if($title == 'Dashboard') print 'class="active"'; ?>>
      <a href="/dashboard" class="waves-effect waves-cyan">
        <i class="material-icons">dashboard</i>
        <span class="nav-text">Dashboard</span>
      </a>
    </li>
      <ul class="collapsible" data-collapsible="accordion">
        <li class="bold <?php if($title == 'New Transaction' || $title == 'All Transactions' || $title == 'Edit Transaction') print 'active'; ?>">
          <a class="collapsible-header waves-effect waves-cyan <?php if($title == 'Create New Transaction' || $title == 'List of All Transactions' || $title == 'Edit Transaction') print 'active'; ?>">
            <i class="material-icons">import_contacts</i>
            <span class="nav-text">My Transactions</span>
          </a>
          <div class="collapsible-body">
            <ul>
              <li <?php if($title == 'Create New Transaction') print 'class="active"'; ?>>
                <a href="/transaction/create">
                  <i class="material-icons">note_add</i>
                  <span>Add New</span>
                </a>
              </li>
              <li <?php if($title == 'List of All Transactions' || $title == 'Edit Transaction') print 'class="active"'; ?>>
                <a href="/transaction">
                  <i class="material-icons">list</i>
                  <span>View All</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
      </ul>
    </li>
  </ul>
  <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only gradient-45deg-light-blue-cyan gradient-shadow">
    <i class="material-icons">menu</i>
  </a>
</aside>
<!-- END LEFT SIDEBAR NAV-->