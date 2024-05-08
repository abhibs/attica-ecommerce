<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <title>Attica Gold Company</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />


    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="" />
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('user/assets/css/plugins/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('user/assets/css/main.css?v=5.3') }}" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />

</head>

<body>
    @include('user.layout.quickview')


    @include('user.layout.header')
    <main class="main">
        @yield('content')
    </main>







    @include('user.layout.footer')
    <!-- Vendor JS-->
    <script src="{{ asset('user/assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/plugins/slick.js') }}"></script>
    <script src="{{ asset('user/assets/js/plugins/jquery.syotimer.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/plugins/waypoints.js') }}"></script>
    <script src="{{ asset('user/assets/js/plugins/wow.js') }}"></script>
    <script src="{{ asset('user/assets/js/plugins/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('user/assets/js/plugins/magnific-popup.js') }}"></script>
    <script src="{{ asset('user/assets/js/plugins/select2.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/plugins/counterup.js') }}"></script>
    <script src="{{ asset('user/assets/js/plugins/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/plugins/images-loaded.js') }}"></script>
    <script src="{{ asset('user/assets/js/plugins/isotope.js') }}"></script>
    <script src="{{ asset('user/assets/js/plugins/scrollup.js') }}"></script>
    <script src="{{ asset('user/assets/js/plugins/jquery.vticker-min.js') }}"></script>
    <script src="{{ asset('user/assets/js/plugins/jquery.theia.sticky.js') }}"></script>
    <script src="{{ asset('user/assets/js/plugins/jquery.elevatezoom.js') }}"></script>
    <!-- Template  JS -->
    <script src="{{ asset('user/assets/js/main.js?v=5.3') }}"></script>
    <script src="{{ asset('user/assets/js/shop.js?v=5.3') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })



        function productView(id) {
            // alert(id)
            $.ajax({
                type: 'GET',
                url: '/product/view/modal/' + id,
                dataType: 'json',
                success: function(data) {
                    console.log(data)

                    $('#pname').text(data.product.name);
                    $('#ptotal').text(data.product.total);
                    $('#pprice').text(data.product.price);
                    $('#pcategory').text(data.product.category.name);
                    $('#pimage').attr('src', '/' + data.product.image);

                    $('#product_id').val(id);
                    $('#qty').val(1);
                }
            })
        }


        function addToCart() {
            var name = $('#pname').text();
            var id = $('#product_id').val();
            var quantity = $('#qty').val();
            $.ajax({
                type: "POST",
                dataType: 'json',
                data: {
                    quantity: quantity,
                    name: name,
                },
                url: "/cart/data/store/" + id,
                success: function(data) {
                    miniCart();
                    $('#closeModal').click();
                    console.log(data)

                    // Start Message

                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 5000
                    })
                    if ($.isEmptyObject(data.error)) {

                        Toast.fire({
                            type: 'success',
                            title: data.success,
                        })

                    } else {

                        Toast.fire({
                            type: 'error',
                            title: data.error,
                        })
                    }

                    // End Message
                }
            })

        }

        function addToCartDetails() {

            var name = $('#dpname').text();
            var id = $('#dproduct_id').val();
            var quantity = $('#dqty').val();
            $.ajax({
                type: "POST",
                dataType: 'json',
                data: {
                    quantity: quantity,
                    name: name,
                },
                url: "/dcart/data/store/" + id,
                success: function(data) {
                    miniCart();

                    // console.log(data)

                    // Start Message

                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {

                        Toast.fire({
                            type: 'success',
                            title: data.success,
                        })

                    } else {

                        Toast.fire({
                            type: 'error',
                            title: data.error,
                        })
                    }

                    // End Message
                }
            })

        }
    </script>



    <script type="text/javascript">
        function miniCart() {
            $.ajax({
                type: 'GET',
                url: '/product/mini/cart',
                dataType: 'json',
                success: function(response) {
                    // console.log(response)

                    // $('span[id="cartSubTotal"]').text(response.subtotal);
                    $('#cartQty').text(response.cartQty);

                    var miniCart = ""

                    $.each(response.carts, function(key, value) {
                        miniCart += ` <ul>
            <li>
                <div class="shopping-cart-img">
                    <a href=""><img alt="Nest" src="/${value.options.image} " style="width:50px;height:50px;" /></a>
                </div>
                <div class="shopping-cart-title" style="margin: -73px 74px 14px; width" 146px;>
                    <h4><a href=""> ${value.name} </a></h4>
                    <h4><span>${value.qty} × </span>${value.options.price}</h4>
                </div>
                <div class="shopping-cart-delete" style="margin: -85px 1px 0px;">
                    <a type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)"  ><i class="fi-rs-cross-small"></i></a>
                </div>
            </li>
        </ul>
        <hr><br>
               `
                    });

                    $('#miniCart').html(miniCart);

                }

            })
        }
        miniCart();


        function miniCartRemove(rowId) {
            $.ajax({
                type: 'GET',
                url: '/minicart/product/remove/' + rowId,
                dataType: 'json',
                success: function(data) {
                    miniCart();
                    // Start Message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {

                        Toast.fire({
                            type: 'success',
                            title: data.success,
                        })
                    } else {

                        Toast.fire({
                            type: 'error',
                            title: data.error,
                        })
                    }
                    // End Message
                }
            })
        }
    </script>


    <script type="text/javascript">
        function addToWishList(product_id) {
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: "/add-to-wishlist/" + product_id,

                success: function(data) {
                    wishlist();
                    // Start Message

                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {

                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success,
                        })

                    } else {

                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error,
                        })
                    }
                }
            })
        }
    </script>


    <script type="text/javascript">
        function wishlist() {
            $.ajax({
                type: "GET",
                dataType: 'json',
                url: "/user/get-wishlist-product/",

                success: function(response) {

                    $('#wishQty').text(response.wishQty);

                    var rows = ""
                    $.each(response.wishlist, function(key, value) {

                        rows += `<tr class="pt-30">
                        <td class="custome-checkbox pl-30">

                        </td>
                        <td class="image product-thumbnail pt-40"><img src="/${value.product.image}" alt="#" /></td>
                        <td class="product-des product-name">
                            <h6><a class="product-name mb-10" href="">${value.product.name} </a></h6>

                        </td>

                        <td class="product-des product-name">
                            <h6><a class="product-name mb-10" href="">${value.product.price} </a></h6>

                        </td>
                            <td class="product-des product-name">
                            <h6><a class="product-name mb-10" href="">${value.product.gst} </a></h6>

                        </td>
                                                <td class="product-des product-name">
                            <h6><a class="product-name mb-10" href="">${value.product.total} </a></h6>

                        </td>
                        <td class="action text-center" data-title="Remove">
                            <a type="submit" class="text-body" id="${value.id}" onclick="wishlistRemove(this.id)" ><i class="fi-rs-trash"></i></a>
                        </td>
                    </tr> `

                    });

                    $('#wishlist').html(rows);

                }
            })
        }

        wishlist();

        // / End Load Wishlist Data -->

        // Wishlist Remove Start


        function wishlistRemove(id) {
            $.ajax({
                type: "GET",
                dataType: 'json',
                url: "/user/wishlist-remove/" + id,

                success: function(data) {
                    wishlist();
                    // Start Message

                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {

                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success,
                        })

                    } else {

                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error,
                        })
                    }

                    // End Message


                }
            })
        }


        // Wishlist Remove End
    </script>

    <script type="text/javascript">
        function cart() {
            $.ajax({
                type: 'GET',
                url: '/user/get-cart-product',
                dataType: 'json',
                success: function(response) {
                    // console.log(response)


                    var rows = ""

                    $.each(response.carts, function(key, value) {
                        rows += `<tr class="pt-30">

            <td class="image product-thumbnail pt-40"><img src="/${value.options.image} " alt="#"></td>
                        <td class="custome-checkbox pl-30">
${value.name}
            </td>

            <td class="price" data-title="Price">
                <h4 class="text-body">Rs. ${value.options.price} </h4>
            </td>






            <td class="text-center detail-info" data-title="Stock">
                <div class="detail-extralink mr-15">
                    <div class="detail-qty border radius">

     <a type="submit" class="qty-down" id="${value.rowId}" onclick="cartDecrement(this.id)"><i class="fi-rs-angle-small-down"></i></a>

      <input type="text" name="quantity" class="qty-val" value="${value.qty}" min="1">

     <a  type="submit" class="qty-up" id="${value.rowId}" onclick="cartIncrement(this.id)"><i class="fi-rs-angle-small-up"></i></a>

                    </div>
                </div>
            </td>
            <td class="price" data-title="Price">
                <h4 class="text-brand">Rs. ${value.options.price * value.qty} </h4>
            </td>
            <td class="action text-center" data-title="Remove">
            <a type="submit" class="text-body"  id="${value.rowId}" onclick="cartRemove(this.id)"><i class="fi-rs-trash"></i></a></td>
        </tr>`
                    });

                    $('#cartPage').html(rows);

                }

            })
        }
        cart();

        // Cart Remove Start
        function cartRemove(id) {
            $.ajax({
                type: "GET",
                dataType: 'json',
                url: "/user/cart-remove/" + id,

                success: function(data) {
                    cart();
                    miniCart();
                    // Start Message

                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {

                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success,
                        })

                    } else {

                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error,
                        })
                    }

                    // End Message


                }
            })
        }
        // Cart Remove End

        // Cart INCREMENT

        function cartIncrement(rowId) {
            $.ajax({
                type: 'GET',
                url: "/user/cart-increment/" + rowId,
                dataType: 'json',
                success: function(data) {
                    cart();
                    miniCart();

                }
            });
        }


        // Cart INCREMENT End

        // Cart Decrement Start

        function cartDecrement(rowId) {
            $.ajax({
                type: 'GET',
                url: "/user/cart-decrement/" + rowId,
                dataType: 'json',
                success: function(data) {
                    cart();
                    miniCart();

                }
            });
        }


        // Cart Decrement End



        function couponCalculation() {
            $.ajax({
                type: 'GET',
                url: "/user/cart-details",
                dataType: 'json',
                success: function(data) {
                    // Initialize variables for total price and GST
                    let totalPrice = 0;
                    let totalGST = 0;

                    // Iterate through each item in the 'carts' object
                    Object.values(data.carts).forEach(item => {
                        // Get item price and GST from 'options'
                        const itemPrice = parseFloat(item.options.price);
                        // const itemGST = parseFloat(item.options.price * 0.3);

                        // Calculate item subtotal (price * quantity)
                        const itemSubtotal = itemPrice * item.qty;

                        // Add item subtotal to total price
                        totalPrice += itemSubtotal;

                        // Add item GST to total GST
                        totalGST = totalPrice * 0.03;
                    });

                    // Update HTML content with calculated totals
                    $('#couponCalField').html(
                        `
                <tr>
                    <td class="cart_total_label">
                        <h3 class="text-muted">Total Price</h3>
                    </td>
                    <td class="cart_total_amount">
                        <h4 class="text-brand text-end">Rs. ${totalPrice.toFixed(2)}</h4>
                    </td>
                </tr>
                <tr>
                    <td class="cart_total_label">
                        <h3 class="text-muted">Total GST</h3>
                    </td>
                    <td class="cart_total_amount">
                        <h4 class="text-brand text-end">Rs. ${totalGST.toFixed(2)}</h4>
                    </td>
                </tr>
                <tr>
                    <td class="cart_total_label">
                        <h3 class="text-muted">Grand Total</h3>
                    </td>
                    <td class="cart_total_amount">
                        <h4 class="text-brand text-end">Rs. ${(totalPrice + totalGST).toFixed(2)}</h4>
                    </td>
                </tr>
                `
                    );
                }
            });
        }

        // Call the couponCalculation function to fetch cart details and update HTML
        couponCalculation();
    </script>


    <script type="text/javascript">
        function checkPincode() {
            var pincode = $('#pincode').val();
            $.ajax({
                type: "POST",
                dataType: 'json',
                data: {
                    pincode: pincode
                },

                url: "/user/check/pincode",

                success: function(data) {

                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 5000
                    })
                    if ($.isEmptyObject(data.error)) {

                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success,
                        })

                    } else {

                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error,
                        })
                    }

                }
            })
        }
    </script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info(" {{ Session::get('message') }} ");
                    break;
                case 'success':
                    toastr.success(" {{ Session::get('message') }} ");
                    break;
                case 'warning':
                    toastr.warning(" {{ Session::get('message') }} ");
                    break;
                case 'error':
                    toastr.error(" {{ Session::get('message') }} ");
                    break;
            }
        @endif
    </script>
    <!-- toastr js end -->




</body>

</html>
