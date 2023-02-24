<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
        <img src="{{ asset('images/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ auth()->user()->getAvatar() }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->getFullname() }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="nav-icon fas fa-tv"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="collapse" href="#master_files_submenu"
                    role="button" aria-expanded="false">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>Master Files</p>
                    </a>
                    <ul class="collapse lisst-unstyled" id="master_files_submenu" style="list-style-type: none;">
                        <li>
                            <a href="{{ route('location.index') }}" class="nav-link {{ activeSegment('location') }}">
                                <i class="nav-icon fas fa-location-arrow"></i>
                                <p>Location</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('message.index') }}" class="nav-link {{ activeSegment('message') }}">
                                <i class="nav-icon fas fa-comment-alt"></i>
                                <p>Messages</p>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('modifiers_category.index') }}" class="nav-link {{ activeSegment('modifiers_category') }} {{ activeSegment('modifier') }}">
                                <i class="nav-icon fas fa-hamburger"></i>
                                <p>Modifier Category</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('price_level.index') }}" class="nav-link {{ activeSegment('price_level') }}">
                                <i class="nav-icon fas fa-chart-line"></i>
                                <p>Price Level</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('printer_group.index') }}" class="nav-link {{ activeSegment('printer_group') }}">
                                <i class="nav-icon fas fa-print"></i>
                                <p>Kitchen Printer</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('department.index') }}" class="nav-link {{ activeSegment('department') }}">
                                <i class="nav-icon fas fa-stream"></i>
                                <p>Departments</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('tax.index') }}" class="nav-link {{ activeSegment('tax') }}">
                                <i class="nav-icon fas fa-percent"></i>
                                <p>Tax</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('unit.index') }}" class="nav-link {{ activeSegment('unit') }}">
                                <i class="nav-icon fas fa-balance-scale"></i>
                                <p>Unit</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('voucher_type.index') }}" class="nav-link {{ activeSegment('voucher_type') }}">
                                <i class="nav-icon fas fa-stream"></i>
                                <p>Voucher Types</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="collapse" href="#items_submenu"
                    role="button" aria-expanded="false">
                        <i class="nav-icon fas fa-boxes"></i>
                        <p>Items</p>
                    </a>
                    <ul class="collapse lisst-unstyled" id="items_submenu" style="list-style-type: none;">
                        <li>
                            <a href="{{ route('item.index') }}" class="nav-link {{ activeSegment('item') }}">
                                <i class="nav-icon fas fa-dice-d6"></i>
                                <p>Items</p>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link {{ activeSegment('global_price') }}">
                                <i class="nav-icon fas fa-money-check-alt"></i>
                                <p>Global Price Change</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="collapse" href="#security_submenu"
                    role="button" aria-expanded="false">
                        <i class="nav-icon fas fa-lock"></i>
                        <p>Security</p>
                    </a>
                    <ul class="collapse lisst-unstyled" id="security_submenu" style="list-style-type: none;">
                        <li>
                            <a href="{{ route('user.index') }}" class="nav-link {{ activeSegment('user') }}">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Users</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('role.index') }}" class="nav-link {{ activeSegment('role') }}">
                                <i class="nav-icon fas fa-briefcase"></i>
                                <p>Roles</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="collapse" href="#terminal_submenu"
                    role="button" aria-expanded="false">
                        <i class="nav-icon fas fa-store"></i>
                        <p>Terminal</p>
                    </a>
                    <ul class="collapse lisst-unstyled" id="terminal_submenu" style="list-style-type: none;">
                        <li>
                            <a href="{{ route('terminal.index') }}" class="nav-link {{ activeSegment('terminal') }}">
                                <i class="nav-icon fas fa-desktop"></i>
                                <p>Terminal</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('terminal_option_detail.index') }}" class="nav-link {{ activeSegment('terminal_option_detail') }}">
                                <i class="nav-icon fas fa-stream"></i>
                                <p>Terminal Options</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('keyboard.index') }}" class="nav-link {{ activeSegment('keyboard') }}">
                                <i class="nav-icon fas fa-keyboard"></i>
                                <p>Keyboard</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="collapse" href="#customer_submenu"
                    role="button" aria-expanded="false">
                        <i class="nav-icon fas fa-handshake"></i>
                        <p>Customer</p>
                    </a>
                    <ul class="collapse lisst-unstyled" id="customer_submenu" style="list-style-type: none;">
                        <li>
                            <a href="{{ route('account.index') }}" class="nav-link {{ activeSegment('account') }}">
                                <i class="nav-icon fas fa-address-card"></i>
                                <p>Accounts</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('voucher.index') }}" class="nav-link {{ activeSegment('voucher') }}">
                                <i class="nav-icon fas fa-money-check"></i>
                                <p>Vouchers</p>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link {{ activeSegment('dry_till') }}">
                                <i class="nav-icon fas fa-shopping-basket"></i>
                                <p>Dry Till</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="collapse" href="#promotions_submenu"
                    role="button" aria-expanded="false">
                        <i class="nav-icon fas fa-certificate"></i>
                        <p>Promotions</p>
                    </a>
                    <ul class="collapse lisst-unstyled" id="promotions_submenu" style="list-style-type: none;">
                        <li>
                            <a href="{{ route('advertisement.index') }}" class="nav-link {{ activeSegment('advertisement') }}">
                                <i class="nav-icon fas fa-play"></i>
                                <p>Advertisement</p>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link {{ activeSegment('happy_hour') }}">
                                <i class="nav-icon fas fa-clock"></i>
                                <p>Happy Hour</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{route('report.index')}}" class="nav-link {{ activeSegment('reports') }}">
                        <i class="nav-icon fas fa-file-invoice"></i>
                        <p>Reports</p>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="collapse" href="#system_submenu"
                    role="button" aria-expanded="false">
                        <i class="nav-icon fas fa-network-wired"></i>
                        <p>System</p>
                    </a>
                    <ul class="collapse lisst-unstyled" id="system_submenu" style="list-style-type: none;">
                        <li>
                            <a href="{{ route('settings.index') }}" class="nav-link {{ activeSegment('settings') }}">
                                <i class="nav-icon fas fa-cogs"></i>
                                <p>Settings</p>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link {{ activeSegment('report_time') }}">
                                <i class="nav-icon fas fa-business-time"></i>
                                <p>Report Time</p>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link {{ activeSegment('database') }}">
                                <i class="nav-icon fas fa-database"></i>
                                <p>Database</p>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link {{ activeSegment('import') }}">
                                <i class="nav-icon fas fa-file-import"></i>
                                <p>Import</p>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link {{ activeSegment('export') }}">
                                <i class="nav-icon fas fa-file-export"></i>
                                <p>Export</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!--
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="nav-icon fas fa-list-ul"></i>
                        <p>Locations</p>
                    </a>
                    <div class="dropdown-menu">
                        <a href="{{ route('location.index') }}" class="nav-link {{ activeSegment('location') }}">
                            <i class="nav-icon fas fa-location-arrow"></i>
                            <p>Locations</p>
                        </a>
                        <a href="{{ route('location_table_details.index') }}" class="nav-link {{ activeSegment('location_table_details') }}">
                            <i class="nav-icon fa fa-table"></i>
                            <p>Location Tables</p>
                        </a>
                    </div>
                </li>
                -->
<!--
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="nav-icon fas fa-list-ul"></i>
                        <p>Product Management</p>
                    </a>
                    <div class="dropdown-menu">
                        <a href="{{ route('department.index') }}" class="nav-link {{ activeSegment('department') }}">
                            <i class="nav-icon fas fa-stream"></i>
                            <p>Departments</p>
                        </a>
                        <a href="{{ route('item.index') }}" class="nav-link {{ activeSegment('products') }}">
                            <i class="nav-icon fas fa-dice-d6"></i>
                            <p>Products</p>
                        </a>
                    </div>
                </li> -->
                <!--
                <li class="nav-item has-treeview">
                    <a href="{{ route('cart.index') }}" class="nav-link {{ activeSegment('cart') }}">
                        <i class="nav-icon fas fa-barcode"></i>
                        <p>Open POS</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('orders.index') }}" class="nav-link {{ activeSegment('orders') }}">
                        <i class="nav-icon fas fa-cart-plus"></i>
                        <p>Orders</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('customers.index') }}" class="nav-link {{ activeSegment('customers') }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Customers</p>
                    </a>
                </li>
                -->
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="document.getElementById('logout-form').submit()">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                        <form action="{{ route('logout') }}" method="POST" id="logout-form">
                            @csrf
                        </form>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
