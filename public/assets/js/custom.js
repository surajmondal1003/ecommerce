function openForm(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
var baseUrl = "https://shopinway.com";
$('#login-form').submit(function (event) {
    event.preventDefault();
    var results = '';
    $('#login_error').html('');
    $.ajax({
        type: 'POST',
        url: baseUrl + '/login',
        data: { email: $("#email").val(), password: $("#password").val() },
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.status === false) {

                for (var i = 0; i < response.inputerror.length; i++) {
                    $('[name="' + response.inputerror[i] + '"]').parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="' + response.inputerror[i] + '"]').next().text(response.error_string[i]); //select span help-block class set text error string
                }

            } else {
                if (response.success === true) {
                    window.location.href = response.redirectto;
                }
                else {
                    $.each(response.error, function (key, value) {
                        // $('#login_error').show();
                        $('#login_error').append('<p style="color:red;">' + value + '</p>');
                    });

                }

            }
        }, error: function (xhr, status, error) {

        }
    });
});



$('#register-form').submit(function (event) {

    event.preventDefault();
    var results = '';
    $('#register_error').html('');
    $.ajax({
        type: 'POST',
        url: baseUrl + '/register',
        data: $('#register-form').serialize(),
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.status === false) {
                //      $.each(response.errors, function(key, value){
                //    // $('#login_error').show();
                //     $('#register_error').append('<p>'+value+'</p>');
                // });

                for (var i = 0; i < response.inputerror.length; i++) {
                    $('[name="' + response.inputerror[i] + '"]').parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="' + response.inputerror[i] + '"]').next().text(response.error_string[i]); //select span help-block class set text error string
                }


            } else {
                window.location.href = response.redirectto;
            }
        }, error: function (xhr, status, error) {
            $('#register_error').show();
            $('#register_error').append('<p>' + error + '</p>');
        }
    });
});



$('#addressSubmit').click(function (e) {

    e.preventDefault();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(this).text('Saving...'); //change button text
    $(this).attr('disabled', true); //set button disable


    var url = baseUrl + '/save-address';
    var redUrl = baseUrl + '/my-profile';
    // ajax adding data to database

    $.ajax({
        type: 'POST',
        url: url,
        data: $('#addressForm').serialize(),
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.status === false) {


                for (var i = 0; i < response.inputerror.length; i++) {
                    $('[name="' + response.inputerror[i] + '"]').parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="' + response.inputerror[i] + '"]').next().text(response.error_string[i]); //select span help-block class set text error string
                }

            } else {
                window.location.href = redUrl;
            }
        }, error: function (xhr, status, error) {

        }
    });
});

$('#resetPasswordSubmit').click(function (e) {

    e.preventDefault();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(this).text('Saving...'); //change button text
    $(this).attr('disabled', true); //set button disable


    var url = baseUrl + '/reset-password';
    var redUrl = baseUrl + '/login';
    // ajax adding data to database

    $.ajax({
        type: 'POST',
        url: url,
        data: $('#resetForm').serialize(),
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.status === false) {


                for (var i = 0; i < response.inputerror.length; i++) {
                    $('[name="' + response.inputerror[i] + '"]').parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="' + response.inputerror[i] + '"]').next().text(response.error_string[i]); //select span help-block class set text error string
                }

            } else {
                window.location.href = redUrl;
            }
        }, error: function (xhr, status, error) {

        }
    });
});



$('#updateAccountSubmit').click(function (e) {

    e.preventDefault();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(this).text('Saving...'); //change button text
    $(this).attr('disabled', true); //set button disable


    var url = baseUrl + '/update-account';
    var redUrl = baseUrl + '/my-profile';
    // ajax adding data to database

    $.ajax({
        type: 'POST',
        url: url,
        data: $('#updateAccountForm').serialize(),
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.status === false) {


                for (var i = 0; i < response.inputerror.length; i++) {
                    $('[name="' + response.inputerror[i] + '"]').parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="' + response.inputerror[i] + '"]').next().text(response.error_string[i]); //select span help-block class set text error string
                }

            } else {
                window.location.href = redUrl;
            }
        }, error: function (xhr, status, error) {

        }
    });
});


function getAddressDetail(address_id) {

    // event.preventDefault();
    $('#editaddress').show();


    var url = baseUrl + '/get-address-detail';
    $.ajax({
        type: 'POST',
        url: url,
        data: { 'address_id': address_id },
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.status === true) {

                $('input[name=edit_address_id]').val(response.addressDetail.address_id);
                $('input[name=inputEditAddress]').val(response.addressDetail.address);
                $('input[name=inputEditLandmark]').val(response.addressDetail.landmark);
                $('input[name=inputEditCity]').val(response.addressDetail.city);
                $('input[name=inputEditPincode]').val(response.addressDetail.pincode);
                $('select[name=inputEditCountry]').val(response.addressDetail.country);
                $('input[name=inputEditPhone]').val(response.addressDetail.phone_no);
            }
        }, error: function (xhr, status, error) {

        }
    });

}


function setDefaultAddress(address_id) {
    // event.preventDefault();
    var url = baseUrl + '/set-default-address';
    var redurl = baseUrl + '/my-profile';
    $.ajax({
        type: 'POST',
        url: url,
        data: { 'address_id': address_id },
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.status === true) {
                window.location.replace(redurl);

            }
        }, error: function (xhr, status, error) {

        }
    });
}



$('#updateAddressSubmit').click(function (e) {

    e.preventDefault();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(this).text('Saving...'); //change button text
    $(this).attr('disabled', true); //set button disable


    var url = baseUrl + '/update-address';
    var redUrl = baseUrl + '/my-profile';
    // ajax adding data to database

    $.ajax({
        type: 'POST',
        url: url,
        data: $('#editAddressForm').serialize(),
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.status === false) {


                for (var i = 0; i < response.inputerror.length; i++) {
                    $('[name="' + response.inputerror[i] + '"]').parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="' + response.inputerror[i] + '"]').next().text(response.error_string[i]); //select span help-block class set text error string
                }

            } else {
                window.location.href = redUrl;
            }
        }, error: function (xhr, status, error) {

        }
    });
});










$('#btnLogout').click(function (e) {
    e.preventDefault();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(this).text('Logging Out...'); //change button text
    $(this).attr('disabled', true); //set button disable


    var url = baseUrl + '/logout';
    var redUrl = baseUrl + '/login';
    // ajax adding data to database

    $.ajax({
        type: 'POST',
        url: url,
        data: { 'logout': true },
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.status === true) {
                window.location.replace(redUrl);
            }
        }, error: function (xhr, status, error) {

        }
    });

});

function addtoCart(product_url) {
    $('#loader_' + product_url).show();
    $('#toast').hide();
    $('.loading').show();
    var cartQty = 1;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var url = baseUrl + '/add-to-cart';
    var redUrl = baseUrl + '/cart-items';

    $.ajax({
        type: 'POST',
        url: url,
        data: { 'product_url': product_url, 'cartqty': cartQty },
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.status === true) {

                if (response.outofstock == '1') {
                    launch_toast('Item Out of Stock', 'black');
                    $('.loader4').hide();
                    $('.loading').hide();
                }
                else {

                    $('.cartCount').text(response.count);
                    $('.loader4').hide();
                    $('.loading').hide();

                    $('#goToCartDiv').html(' <a href="' + baseUrl + '/cart-items" class="buybtn hvr"> <span class="flsh"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>' +
                        'GO TO CART</a>');

                    window.location.replace(redUrl);
                    launch_toast('Added To Cart', 'green');
                }

            }
        }, error: function (xhr, status, error) {

        }
    });

}


function buynow(product_url) {
    $('#loader_' + product_url).show();
    $('#toast').hide();
    $('.loading').show();
    var cartQty = 1;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var url = baseUrl + '/buy-now';
    var redUrl = baseUrl + '/checkout';

    $.ajax({
        type: 'POST',
        url: url,
        data: { 'product_url': product_url, 'cartqty': cartQty },
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.status === false) {
                window.location.replace(baseUrl + '/' + response.goTo);

            }
            else {
                window.location.replace(redUrl);
            }
        }, error: function (xhr, status, error) {

        }
    });

}




function launch_toast_old(string, color) {
    var x = document.getElementById("toast")
    x.className = "show";
    x.innerHTML = string;
    x.style.background = color;
    setTimeout(function () { x.className = x.className.replace("show", ""); }, 5000);
}


function addMoreQty(product_url) {
    if (parseInt($('input[name="cartqty[' + product_url + ']"]').val()) < 4) {
        var new_val = parseInt($('input[name="cartqty[' + product_url + ']"]').val()) + 1;
        $('input[name="cartqty[' + product_url + ']"]').val(new_val);

        changeCartQty(product_url, new_val);
    }

}
function addlessQty(product_url) {
    if (parseInt($('input[name="cartqty[' + product_url + ']"]').val()) > 1) {
        var new_val = parseInt($('input[name="cartqty[' + product_url + ']"]').val()) - 1;
        $('input[name="cartqty[' + product_url + ']"]').val(new_val);

        changeCartQty(product_url, new_val);
    }
}

function changeCartQty(product_url, new_val) {

    if (new_val > 0 && new_val < 5) {
        $('.loading').show();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var url = baseUrl + '/add-to-cart';
        var redUrl = baseUrl + '/cart-items';

        $.ajax({
            type: 'POST',
            url: url,
            data: {
                'product_url': product_url,
                'cartqty': new_val
            },
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                if (response.status === true) {

                    if (response.outofstock == '1') {
                        window.location.reload();

                        $('.loader4').hide();
                        $('.loading').hide();
                        launch_toast('Item Out of Stock', 'black');



                    }
                    $('.cartCount').text(response.count);
                    $('#carttable').html(response.carttable);
                    $('#itemTable').html(response.itemTable);
                    $('.loading').hide();

                }

            }, error: function (xhr, status, error) {

            }
        });
    }

}

function removecartitem(product_url) {
    $('.loading').show();
    //alert(product_id);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var url = baseUrl + '/remove-cart-item';
    var redUrl = baseUrl + '/cart-items';

    $.ajax({
        type: 'POST',
        url: url,
        data: {
            'product_url': product_url,
        },
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.status === true) {
                //window.location.replace(redUrl);
                $('.cartCount').text(response.count);
                if (response.count == 0) {
                    $('#cartItemDiv').html(response.itemTable);
                    $('#nocartItemDiv').html('');
                }
                else {
                    $('#carttable').html(response.carttable);
                    $('#itemTable').html(response.itemTable);
                }
                if (response.isDeliverable == '0') {
                    $('#btnPlaceOrder').remove();
                    $('#undeliverableorder').html('Sorry! Product can not be delivered to your pincode');

                    if (response.isBlacklistPin == '0') {
                        for (var i = 0; i < response.blacklistPins.length; i++) {
                            $('#productDiv_' + response.blacklistPins[i]).html('<p><span class="rong-icn">' +
                                '<i class="fa fa-times" aria-hidden="true"></i>' +
                                '</span>Product can not be delivered to your pincode<p>'); //select parent twice to select div form-group class and add has-error class

                        }
                    }

                } else {
                    $('#placeorderdiv').html('<button class="buybtn" id="btnPlaceOrder">Place Order</button><p class="eror" id="undeliverableorder"></p>');

                    $('#undeliverableorder').html('');
                }

                $('.loading').hide();

            }
        }, error: function (xhr, status, error) {

        }
    });
}


$(document.body).on('click', '#pincodeSubmit', function (e) {
    $('.loading').show();
    e.preventDefault();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });



    var url = baseUrl + '/enter-pincode';
    var redUrl = baseUrl + '/cart-items';
    // ajax adding data to database

    $.ajax({
        type: 'POST',
        url: url,
        data: { 'inputPin': $('input[name="inputPin"]').val() },
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.status === true) {
                //window.location.replace(redUrl);
                $('.cartCount').text(response.count);
                $('#carttable').html(response.carttable);
                $('#itemTable').html(response.itemTable);
                if (response.isDeliverable == '0') {
                    $('#btnPlaceOrder').remove();
                    $('#undeliverableorder').html('Sorry! Product can not be delivered to your pincode');
                    if (response.isBlacklistPin == '0') {
                        for (var i = 0; i < response.blacklistPins.length; i++) {
                            $('#productDiv_' + response.blacklistPins[i]).html('<p><span class="rong-icn">' +
                                '<i class="fa fa-times" aria-hidden="true"></i>' +
                                '</span>Product can not be delivered to your pincode<p>'); //select parent twice to select div form-group class and add has-error class

                        }
                    }

                } else {
                    $('#placeorderdiv').html('<button class="buybtn" id="btnPlaceOrder">Place Order</button><p class="eror" id="undeliverableorder"></p>');

                    $('#undeliverableorder').html('');
                }


                $('#pincodeSubmit').hide();
                $('#checkPinDiv').html('<a href="javascript:void(0)" id="pincodeChangeBtn" class="buybtn chk"> Change</a>');
            }
            else {
                for (var i = 0; i < response.inputerror.length; i++) {
                    $('[name="' + response.inputerror[i] + '"]').addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="' + response.inputerror[i] + '"]').next().text(response.error_string[i]); //select span help-block class set text error string
                }
            }
            $('.loading').hide();
            // $('#pincodeSubmit').text('Check'); //change button text
            // $('#pincodeSubmit').attr('disabled', false); //set button enable
        }, error: function (xhr, status, error) {

        }
    });

});


$(document.body).on('click', '#pincodeChangeBtn', function () {

    $('#pincodeChangeBtn').hide();
    $('#checkPinDiv').html('<a href="javascript:void(0)" id="pincodeSubmit" class="buybtn chk">Check</a>');
    $('input[name="inputPin"]').val('');


});


function addToWishlist(product_url) {
    $('.loading').show();
    //alert(product_id);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var url = baseUrl + '/add-to-wishlist';
    var redUrl = baseUrl + '/cart-items';

    $.ajax({
        type: 'POST',
        url: url,
        data: {
            'product_url': product_url,
        },
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.status === true) {
                launch_toast('Item Added to Wishlist', 'green');
                $('.cartCount').text(response.count);
                if (response.count == 0) {
                    $('#cartItemDiv').html(response.itemTable);
                    $('#nocartItemDiv').html('');
                }
                else {
                    $('#carttable').html(response.carttable);
                    $('#itemTable').html(response.itemTable);
                }
                if (response.isDeliverable == '0') {
                    $('#btnPlaceOrder').remove();
                    $('#undeliverableorder').html('Sorry! Product can not be delivered to your pincode');
                    if (response.isBlacklistPin == '0') {
                        for (var i = 0; i < response.blacklistPins.length; i++) {
                            $('#productDiv_' + response.blacklistPins[i]).html('<p><span class="rong-icn">' +
                                '<i class="fa fa-times" aria-hidden="true"></i>' +
                                '</span>Product can not be delivered to your pincode<p>'); //select parent twice to select div form-group class and add has-error class

                        }
                    }

                } else {
                    $('#placeorderdiv').html('<button class="buybtn" id="btnPlaceOrder">Place Order</button><p class="eror" id="undeliverableorder"></p>');

                    $('#undeliverableorder').html('');
                }

                $('.loading').hide();
            }
        }, error: function (xhr, error) {

            if (xhr.status == '401') {
                $('.loading').hide();
                launch_toast('Please Log in to Continue', 'black');
            }
        }
    });
}


$('#wTab').click(function () {
    $('.loading').show();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var url = baseUrl + '/my-wishlist';
    var redUrl = baseUrl + '/cart-items';

    $.ajax({
        type: 'POST',
        url: url,
        data: {
        },
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.status === true) {

                //   $('.cartCount').text('Cart('+response.count+')');
                //   $('#carttable').html(response.carttable);
                $('#wishlistContent').html(response.wishlistContent);
                $('.loader4').hide();
                $('.loading').hide();

            }
        }, error: function (xhr, error) {

        }
    });

});



function movetoCart(product_url) {
    $('.loading').show();


    var cartQty = 1;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var url = baseUrl + '/move-to-cart';
    var redUrl = baseUrl + '/cart-items';

    $.ajax({
        type: 'POST',
        url: url,
        data: { 'product_url': product_url, 'cartqty': cartQty },
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.status === true) {

                $('.cartCount').text(response.count);
                $('.loading').hide();

                $('#wishlistContent').html(response.wishlistContent);
                launch_toast('Added To Cart', 'green');

            }
        }, error: function (xhr, status, error) {

        }
    });

}


$(document.body).on('click', '#btnPlaceOrder', function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var url = baseUrl + '/place-order';
    var redUrl = baseUrl + '/checkout';

    $.ajax({
        type: 'POST',
        url: url,
        data: {
        },
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.status === false) {
                window.location.replace(baseUrl + '/' + response.goTo);

            }
            else {
                window.location.replace(redUrl);
            }
        }, error: function (xhr, error) {

        }
    });

});



$(document.body).on('click', '#btnFinalOrderPlace', function () {
    var address_id = $('input[name="inputAddress"]:checked').val();
    var inputPaymentmode = $('input[name="inputPaymentmode"]:checked').val();
    var inputWalletBalance=0;
   
    if($('input[name="inputWalletBalance"]:checked').val()){
         inputWalletBalance=$('input[name="inputWalletBalance"]:checked').val();
       
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(this).text('Proceeding...'); //change button text
    $(this).attr('disabled', true); //set button disable

    var url = baseUrl + '/payment-request';
    var redUrl = baseUrl + '/my-profile';
    // ajax adding data to database

    $.ajax({
        type: 'POST',
        url: url,
        data: {
            address_id: address_id,
            inputPaymentmode: inputPaymentmode,
            inputWalletBalance:inputWalletBalance
        },
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {

            if (response.status === false) {
                if (response.outofstock == '1') {
                    launch_toast('Item Out of Stock', 'black');
                    $('.loader4').hide();
                    $('.loading').hide();

                }
                else {
                    for (var i = 0; i < response.inputerror.length; i++) {
                        $('[name="' + response.inputerror[i] + '"]').parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                        $('[name="' + response.inputerror[i] + '"]').next().text(response.error_string[i]); //select span help-block class set text error string
                    }
                }

            } else {


                window.location.href = response.redurl;
            }

            $('#btnFinalOrderPlace').text('Proceed'); //change button text
            $('#btnFinalOrderPlace').attr('disabled', false); //set button disable
        }, error: function (xhr, status, error) {
            $('#btnFinalOrderPlace').text('Proceed'); //change button text
            $('#btnFinalOrderPlace').attr('disabled', false); //set button disable
        }
    });

});


$(document.body).on('click', '#inputWalletBalance', function () {
    $('#inputinstamojo').prop("checked", true);
});
$(document.body).on('click', '#inputcod', function () {
    $('#inputinstamojo').prop("checked", false);
    $('#inputWalletBalance').prop("checked", false);
});


$('#membershipTab').click(function () {
    $('.loading').show();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var url = baseUrl + '/membership-products';

    $.ajax({
        type: 'GET',
        url: url,
        data: {
        },
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.status === true) {
                $('#studentString').html(response.studentString);
                $('#productList').html(response.products);
                $('.loading').hide();
            }
        }, error: function (xhr, error) {

        }
    });

});


$('#addressdialogBtn').click(function (e) {
    $('.loading').show();
    e.preventDefault();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(this).text('Saving...'); //change button text
    $(this).attr('disabled', true); //set button disable


    var url = baseUrl + '/save-address';
    var redUrl = baseUrl + '/checkout';
    // ajax adding data to database

    $.ajax({
        type: 'POST',
        url: url,
        data: $('#addressdialog').serialize(),
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.status === false) {


                for (var i = 0; i < response.inputerror.length; i++) {
                    $('[name="' + response.inputerror[i] + '"]').parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="' + response.inputerror[i] + '"]').next().text(response.error_string[i]); //select span help-block class set text error string
                }

            } else {
                window.location.href = redUrl;
            }
            $('.loading').hide();
            $('#addressdialogBtn').text('Saving...'); //change button text
            $('#addressdialogBtn').attr('disabled', false); //set button disable
        }, error: function (xhr, status, error) {
            $('#addressdialogBtn').text('Saving...'); //change button text
            $('#addressdialogBtn').attr('disabled', false); //set button disable
        }
    });

});


$('#addressmemberdialogBtn').click(function (e) {
    $('.loading').show();
    e.preventDefault();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(this).text('Saving...'); //change button text
    $(this).attr('disabled', true); //set button disable


    var url = baseUrl + '/save-address';
    var redUrl = baseUrl + '/my-profile';
    // ajax adding data to database

    $.ajax({
        type: 'POST',
        url: url,
        data: $('#addressmemberdialogform').serialize(),
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.status === false) {


                for (var i = 0; i < response.inputerror.length; i++) {
                    $('[name="' + response.inputerror[i] + '"]').parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="' + response.inputerror[i] + '"]').next().text(response.error_string[i]); //select span help-block class set text error string
                }

            } else {
                window.location.reload();
            }
            $('.loading').hide();
            $('#addressdialogBtn').text('Saving...'); //change button text
            $('#addressdialogBtn').attr('disabled', false); //set button disable
        }, error: function (xhr, status, error) {
            $('#addressdialogBtn').text('Saving...'); //change button text
            $('#addressdialogBtn').attr('disabled', false); //set button disable
        }
    });

});



function membershipproductsorder(prod_url) {
    $('.loading').show();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var url = baseUrl + '/membership-order-products';
    var redurl = baseUrl + '/thank-you-order';

    $.ajax({
        type: 'POST',
        url: url,
        data: {
            prod_url: prod_url
        },
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.status === true) {
                $('.loading').hide();
                if(response.in_stock=='0'){
                    launch_toast('Item Out of Stock', 'black');
                }else{
                    window.location.replace(redurl);
                }
                

            }
        }, error: function (xhr, error) {

        }
    });

}



$(document.body).on('click', '#inputCheckPincodebtn', function (e) {

    $('.loading').show();
    e.preventDefault();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(this).text('Checking...'); //change button text
    $(this).attr('disabled', true); //set button disable


    var url = baseUrl + '/check-pincode-for-availability';

    // ajax adding data to database

    $.ajax({
        type: 'POST',
        url: url,
        data: $('#pincodeForm').serialize(),
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.status === false) {


                for (var i = 0; i < response.inputerror.length; i++) {
                    $('[name="' + response.inputerror[i] + '"]').parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="' + response.inputerror[i] + '"]').next().text(response.error_string[i]); //select span help-block class set text error string
                }

            }
            else {

                $('#inputCheckPincodebtn').hide();
                $('#checkAvailPinDiv').html('<button id="pincodeAvailChangeBtn" class="buybtn"> Change</button>');


                if (response.isDeliverable == '1' && response.isBlacklistPin == '1') {
                    $('#pincodeStatusMsg').html('<p><span class="tik-icn"><i class="fa fa-check" aria-hidden="true"></i></span>Usually delivered within ' + response.delivery_period + ' days | <b>' + response.deliveryCharge + '</b></p>');
                    if (response.available_cod == 'yes')
                        $('#pincodeStatusMsg').append('<p><span class="tik-icn"><i class="fa fa-check" aria-hidden="true"></i></span>COD also available</p>');
                    else
                        $('#pincodeStatusMsg').append('<p><span class="rong-icn"><i class="fa fa-times" aria-hidden="true"></i></span>COD not available</p>');

                }
                else {
                    $('#pincodeStatusMsg').html('<p><span class="rong-icn"><i class="fa fa-times" aria-hidden="true"></i></span>Sorry! Product can not be delivered to your pincode. Pls try another Pincode.</p>');
                }

            }



            $('.loading').hide();
            $('#inputCheckPincodebtn').text('Check'); //change button text
            $('#inputCheckPincodebtn').attr('disabled', false); //set button disable
        }, error: function (xhr, status, error) {
            $('#inputCheckPincodebtn').text('Check'); //change button text
            $('#inputCheckPincodebtn').attr('disabled', false); //set button disable
        }
    });
});


$(document.body).on('click', '#pincodeAvailChangeBtn', function () {

    $('#pincodeAvailChangeBtn').hide();
    $('#checkAvailPinDiv').html('<button class="buybtn" id="inputCheckPincodebtn">Check</button>');
    $('input[name="inputPin"]').val('');


});



function load_membershipForm(membership_cat_code) {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var url = baseUrl + '/check-login-membership';
    var redUrl = baseUrl + '/join-membership/' + membership_cat_code;

    $.ajax({
        type: 'POST',
        url: url,
        data: {
            membership_cat_code: membership_cat_code
        },
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.status === false) {
                window.location.replace(baseUrl + '/' + response.goTo);

            }
            else {
                window.location.replace(redUrl);
            }
        }, error: function (xhr, error) {

        }
    });

}

function loadDeliverBtn(address_id) {
    $('.deliver-btn').remove();
    $('#addressDeliverDiv_' + address_id).html('<button type="button" class="buybtn deliver-btn" value="' + address_id + '" onclick="checkorderPincode(' + address_id + ')">Deliver Here</button>');

}



function checkorderPincode(address_id) {

    $('.loading').show();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var url = baseUrl + '/check-order-pincode';

    $.ajax({
        type: 'POST',
        url: url,
        data: {
            'address_id': address_id
        },
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.status === true) {

                var content = '<div class="step11" id="showdeliverAddress"><h2>1. Delivery Address</h2><div class="md-radio md-radio-inline">' +
                    '<div class="box-new "><div>' + $('#addressText_' + address_id).html() + '</div><button type="button" class="buybtn changeaddress" id="changeDeliverAddress">Change</button></div>';
                $('#addressStep1').after(content);
                $('#addressStep1').hide();
                $('#carttable').html(response.carttable);
                $('#itemTable').html(response.itemTable);


                if (response.isDeliverable == '1' && response.outofstock == '0') {
                    $('#placeorderdiv').html('<button class="buybtn" id="btnFinalOrderPlace">PROCEED</button><p class="eror" id="undeliverableorder"></p>');
                    // $('#btnPlaceOrder').attr('disabled',false);
                    $('#undeliverableorder').html('');

                    if (response.available_cod == 'no') {
                        $('input[name="inputPaymentmode"]').attr('disabled', true);
                        $('#availableCodDiv').html('Cash on Delivery (COD) Not Available');
                        $('#availableCodDiv').css('color', '#f00');
                    } else {
                        $('input[name="inputPaymentmode"]').attr('disabled', false);
                        $('#availableCodDiv').html('Cash on Delivery (COD)');
                        $('#availableCodDiv').css('color', '#000');
                    }
                }
                else {
                    $('#btnFinalOrderPlace').remove();
                    $('#undeliverableorder').html('Sorry! Product can not be delivered to your pincode');

                    if (response.isBlacklistPin == '0') {
                        for (var i = 0; i < response.blacklistPins.length; i++) {
                            $('#productDiv_' + response.blacklistPins[i]).html('<span class="rong-icn">' +
                                '<i class="fa fa-times" aria-hidden="true"></i>' +
                                '</span><p>Product can not be delivered to your pincode<p>'); //select parent twice to select div form-group class and add has-error class

                        }
                    }


                }
                $('.loading').hide();
            }
        }, error: function (xhr, error) {

        }
    });

}




$(document.body).on('click', 'input[name="inputPaymentmode"]', function () {
    var paymentmode = $('input[name="inputPaymentmode"]:checked').val();

    if (paymentmode == 'instamojo') {
        $('#btnFinalOrderPlace').text('PROCEED');
    }
    if (paymentmode == 'cod') {
        $('#btnFinalOrderPlace').text('CONFIRM ORDER');
    }

});

$(document.body).on('click', '#changeDeliverAddress', function () {
    $('#showdeliverAddress').remove();
    $('#addressStep1').show();
    $('#btnFinalOrderPlace').remove();

});





function loadMembershipDeliverBtn(address_id) {
    $('.deliver-btn').remove();
    $('#addressDeliverDiv_' + address_id).html('<button type="button" class="buybtn deliver-btn" value="' + address_id + '" onclick="checkMembershiporderPincode(' + address_id + ')">Deliver Here</button>');

}



function checkMembershiporderPincode(address_id) {

    $('.loading').show();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var url = baseUrl + '/check-order-pincode';

    $.ajax({
        type: 'POST',
        url: url,
        data: {
            'address_id': address_id
        },
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.status === true) {

                var content = '<div class="step11" id="showdeliverAddress"><h2>Delivery Address</h2><div class="md-radio md-radio-inline">' +
                    '<div class="box-new "><div>' + $('#addressText_' + address_id).html() +
                    '</div><button type="button" class="buybtn changeaddress" id="changeMembershipDeliverAddress">Change</button></div>';

                $('#addressStep1').after(content);

                $('#addressStep1').hide();


                if (response.isDeliverable == '0') {

                    $('#membershipSubmitbtn').remove();
                    $('#undeliverableorder').html('Sorry! Product can not be delivered to your pincode');

                } else {
                    $('#placeorderdiv').html('<div class="form-group sub"><a href="javascript:void(0)" class="buy-now-btn" id="membershipSubmitbtn">Submit & Pay</a><p class="eror" id="undeliverableorder"></p></div>');

                    $('#undeliverableorder').html('');
                }
                $('.loading').hide();
            }
        }, error: function (xhr, error) {

        }
    });

}




$(document.body).on('click', '#changeMembershipDeliverAddress', function () {
    $('#showdeliverAddress').remove();
    $('#addressStep1').show();
    $('#membershipSubmitbtn').remove();

});




$(document.body).on('click', '#membershipSubmitbtn', function (e) {


    $('.loading').show();
    e.preventDefault();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#membershipSubmitbtn').text('Saving...'); //change button text
    $('#membershipSubmitbtn').attr('disabled', true); //set button disable

    var url = baseUrl + '/membership-payment-request';
    var redUrl = baseUrl + '/my-profile';
    // ajax adding data to database

    $.ajax({
        type: 'POST',
        url: url,
        data: $('#savememberform').serialize(),
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.status === false) {
                for (var i = 0; i < response.inputerror.length; i++) {
                    $('[name="' + response.inputerror[i] + '"]').parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="' + response.inputerror[i] + '"]').next().text(response.error_string[i]); //select span help-block class set text error string
                }
            } else {
                window.location.href = response.redurl;
            }
            $('.loading').hide();
            $('#membershipSubmitbtn').text('Submit & Pay'); //change button text
            $('#membershipSubmitbtn').attr('disabled', false); //set button enable
        }, error: function (xhr, status, error) {

        }
    });
});



function changePlan(inputPlan) {
    $('.loading').show();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var url = baseUrl + '/get-plan-price';

    $.ajax({
        type: 'POST',
        url: url,
        data: {
            'inputPlan': inputPlan
        },
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.status === true) {
                $('.loading').hide();
                $('#planPrice').html(response.planprice);



            }
        }, error: function (xhr, error) {

        }
    });

}


function getSemester(category_id,membership_id) {
    $('.loading').show();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var url = baseUrl + '/get-semester';

    $.ajax({
        type: 'POST',
        url: url,
        data: {
            'category_id': category_id,
            'membership_id':membership_id
        },
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.status === true) {
                $('.loading').hide();
                $('#semesterDiv').html(response.semesterDiv);
                $('#streamDiv').html(response.streamDiv);



            }
        }, error: function (xhr, error) {

        }
    });

}


$('#orderTab').click(function() {
    $('.loading').show();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var url = baseUrl + '/my-orders';

    $.ajax({
        type: 'POST',
        url: url,
        data: {
        },
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.status === true) {
                $('.loading').hide();
                $('#orderDiv').html(response.orderDiv);
               
            }
        }, error: function (xhr, error) {

        }
    });

});



function cancelOrder(order_id) {
   
    $('.loading').show();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var url = baseUrl + '/cancel-order';
    var redurl = baseUrl + '/my-profile';

    $.ajax({
        type: 'POST',
        url: url,
        data: {
            'inputOrderStatus':'cancelled',
            'order_id':order_id
        },
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.status === true) {
                $('.loading').hide();
               window.location.replace(redurl);
               
            }
        }, error: function (xhr, error) {

        }
    });

}


function returnOrder(order_id) {
   
    $('.loading').show();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var url = baseUrl + '/return-order';
    var redurl = baseUrl + '/my-profile';

    $.ajax({
        type: 'POST',
        url: url,
        data: {
            'inputOrderStatus':'returnpending',
            'order_id':order_id,
            'return_reason':'Other, please supply details'
        },
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.status === true) {
                $('.loading').hide();
               window.location.replace(redurl);
               
            }
        }, error: function (xhr, error) {

        }
    });

}


$('#walletTab').click(function() {
    $('.loading').show();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var url = baseUrl + '/my-wallet';
    $.ajax({
        type: 'POST',
        url: url,
        data: {
        },
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.status === true) {
                $('.loading').hide();
                $('#walletbalance').html('Your Wallet Balance : Rs. '+response.wallet_value);
            }
        }, error: function (xhr, error) {
        }
    });
});



function launch_toast(string, color) {

    // Get the snackbar DIV
    var x = document.getElementById("snackbar")

    // Add the "show" class to DIV
    x.className = "show";
    x.innerHTML = string;
    x.style.background = color;
    // After 3 seconds, remove the show class from DIV
    setTimeout(function () { x.className = x.className.replace("show", ""); }, 3000);
}



$(document.body).on('click', '#contactSubmit', function (e) {
    e.preventDefault();
    $('#contactSubmit').attr("disabled", true);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: baseUrl + '/save-contact',
        data: $('#contactForm').serialize(),
        dataType: "Json",
        type: "POST",
        success: function (data) {
            if (data.status === true) {
                $('#contactForm')[0].reset();
               window.location.replace(baseUrl+'/contact-us');
            }
            else {
                for (var i = 0; i < data.inputerror.length; i++) {
                    $('[name="' + data.inputerror[i] + '"]').parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
        },
        error: function (jqXHR, txtMsg, errorThrown) {
            alert("Error sending data");
        }
    });
    $('#contactSubmit').attr("disabled", false);
});



$(document.body).on('focus', '.cForm', function () {
    $(this).parent().removeClass('has-error');
    $(this).next().text('');
});