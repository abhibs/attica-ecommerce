<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <!-- <img src="{{ 'admin/assets/images/logo-icon.png' }}" class="logo-icon" alt="logo icon"> -->
        </div>
        <div>
            <h4 class="logo-text">Admin Panel</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('admin-dashboard') }}">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>

        </li>
        {{-- <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Gold Rate</div>
                <ul>
                    <li> <a href="{{ route('gold-create') }}"><i class="bx bx-right-arrow-alt"></i>Add Gold</a>
                    </li>
                    <li> <a href="{{ route('gold-index') }}"><i class="bx bx-right-arrow-alt"></i>View Golds</a>
                    </li>

                </ul>
            </a>
        </li> --}}

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-cart'></i>
                </div>
                <div class="menu-title">Gold-Rate</div>
            </a>
            <ul>
                <li> <a href="{{ route('gold-create') }}"><i class="bx bx-right-arrow-alt"></i>Add Gold-Rate</a>
                </li>
                <li> <a href="{{ route('gold-index') }}"><i class="bx bx-right-arrow-alt"></i>View Gold-Rate</a>
                </li>

            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-cart'></i>
                </div>
                <div class="menu-title">Weight</div>
            </a>
            <ul>
                <li> <a href="{{ route('weight-create') }}"><i class="bx bx-right-arrow-alt"></i>Add Weight</a>
                </li>
                <li> <a href="{{ route('weight-index') }}"><i class="bx bx-right-arrow-alt"></i>View Weights</a>
                </li>

            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
                </div>
                <div class="menu-title">Category</div>
            </a>
            <ul>
                <li> <a href="{{ route('category-create') }}"><i class="bx bx-right-arrow-alt"></i>Add Category</a>
                </li>
                <li> <a href="{{ route('category-index') }}"><i class="bx bx-right-arrow-alt"></i>View Categories</a>
                </li>

            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-repeat"></i>
                </div>
                <div class="menu-title">Quality</div>
            </a>
            <ul>
                <li> <a href="{{ route('quality-create') }}"><i class="bx bx-right-arrow-alt"></i>Add Quality</a>
                </li>
                <li> <a href="{{ route('quality-index') }}"><i class="bx bx-right-arrow-alt"></i>View Qualities</a>
                </li>

            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-repeat"></i>
                </div>
                <div class="menu-title">Pincode</div>
            </a>
            <ul>
                <li> <a href="{{ route('pincode-create') }}"><i class="bx bx-right-arrow-alt"></i>Add Pincode</a>
                </li>
                <li> <a href="{{ route('pincode-index') }}"><i class="bx bx-right-arrow-alt"></i>View Pincode</a>
                </li>

            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"> <i class="bx bx-donate-blood"></i>
                </div>
                <div class="menu-title">Product</div>
            </a>
            <ul>
                <li> <a href="{{ route('product-create') }}"><i class="bx bx-right-arrow-alt"></i>Add Product</a>
                </li>
                <li> <a href="{{ route('product-index') }}"><i class="bx bx-right-arrow-alt"></i>View Products</a>
                </li>

            </ul>
        </li>
        <!-- <li class="menu-label">Forms & Tables</li> -->
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                </div>
                <div class="menu-title">Users List</div>
            </a>
            <ul>
                <li> <a href="{{ route('user-list') }}"><i class="bx bx-right-arrow-alt"></i>All Users</a>
                </li>


            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-grid-alt"></i>
                </div>
                <div class="menu-title">State</div>
            </a>
            <ul>
                <li> <a href="{{ route('state-create') }}"><i class="bx bx-right-arrow-alt"></i>Add State</a>
                </li>
                <li> <a href="{{ route('state-index') }}"><i class="bx bx-right-arrow-alt"></i>All States</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-lock"></i>
                </div>
                <div class="menu-title">Authentication</div>
            </a>
            <ul>
                <li> <a href="authentication-signin.html" target="_blank"><i class="bx bx-right-arrow-alt"></i>Sign
                        In</a>
                </li>
                <li> <a href="authentication-signup.html" target="_blank"><i class="bx bx-right-arrow-alt"></i>Sign
                        Up</a>
                </li>

            </ul>
        </li>


        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-line-chart"></i>
                </div>
                <div class="menu-title">Charts</div>
            </a>
            <ul>
                <li> <a href="charts-apex-chart.html"><i class="bx bx-right-arrow-alt"></i>Apex</a>
                </li>
                <li> <a href="charts-chartjs.html"><i class="bx bx-right-arrow-alt"></i>Chartjs</a>
                </li>

            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-map-alt"></i>
                </div>
                <div class="menu-title">Maps</div>
            </a>
            <ul>
                <li> <a href="map-google-maps.html"><i class="bx bx-right-arrow-alt"></i>Google Maps</a>
                </li>
                <li> <a href="map-vector-maps.html"><i class="bx bx-right-arrow-alt"></i>Vector Maps</a>
                </li>
            </ul>
        </li>

    </ul>
    <!--end navigation-->
</div>
<!--end sidebar wrapper -->
