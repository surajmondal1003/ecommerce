<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::post('login', 'Auth\LoginController@login_manual');
Route::post('reset-password', 'Auth\ResetPasswordController@reset_from_loggedin');
Route::get('account-activation/{key}', 'Auth\RegisterController@activation');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');




Route::get('admin', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin', 'Admin\LoginController@login');
Route::get('admin/dashboard', 'AdminController@index');
Route::post('admin-password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin-password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin-password/reset', 'Admin\ResetPasswordController@reset');
Route::get('admin-password/reset/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::get('admin/page-list', 'AdminPageController@index');
Route::get('admin/add-new-page', 'AdminPageController@newPage');
Route::get('admin/get-parent', 'AdminPageController@pages_dropdown');
Route::post('admin/save-page', 'AdminPageController@savePage');
Route::post('admin/get-page-list', 'AdminPageController@get_pages');
Route::get('admin/edit-page/{id}', 'AdminPageController@editPage');
Route::post('admin/update-page/', 'AdminPageController@updatePage');
Route::get('admin/edit-content/{id}', 'AdminPageController@editContent');
Route::post('admin/update-content', 'AdminPageController@updateContent');
Route::post('admin/change-page-status', 'AdminPageController@change_page_status');
Route::get('admin/edit-page-meta/{id}', 'AdminPageController@editPageMeta');
Route::post('admin/update-page-meta', 'AdminPageController@updatePageMeta');
Route::get('admin/blog-categories', 'AdminBlogController@blogCategories');
Route::post('admin/get-blog-category-list', 'AdminBlogController@get_blog_categories');
Route::get('admin/add-blog-category', 'AdminBlogController@addblogCategory');
Route::post('admin/save-blog-category', 'AdminBlogController@saveBlogCategory');
Route::post('admin/change-blog-category-status', 'AdminBlogController@changeBlogCategoryStatus');
Route::get('admin/edit-blog-category/{id}', 'AdminBlogController@editblogCategory');
Route::post('admin/update-blog-category', 'AdminBlogController@updateBlogCategory');
Route::get('admin/add-blog-post', 'AdminBlogController@addblog');
Route::post('admin/save-blog-post', 'AdminBlogController@saveBlogPost');
Route::post('admin/get-blog-list','AdminBlogController@getBlogPosts');
Route::get('admin/blog-posts','AdminBlogController@bloglist');
Route::post('admin/change-blog-status','AdminBlogController@changeBlogPostStatus');
Route::post('admin/change-blog-feature','AdminBlogController@changeBlogPostFeature');
Route::get('admin/edit-blog/{id}','AdminBlogController@editblog');
Route::post('admin/update-blog-post','AdminBlogController@updateBlogPost');
Route::get('admin/edit-banner/{id}', 'AdminPageController@editBanner');
Route::post('admin/update-banner', 'AdminPageController@updateBanner');

Route::group(['middleware' => ['web','auth:admin']], function () {
    Route::get('/laravel-filemanager', '\UniSharp\LaravelFilemanager\Controllers\LfmController@show'); Route::post('/laravel-filemanager/upload', '\UniSharp\LaravelFilemanager\Controllers\UploadController@upload');
});


Route::get('storage/{filename}', function ($filename)
{
    $path = storage_path('public/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});


Route::get('/career','FrontController@getCareer');
Route::get('/ipforum','FrontController@getIpforum');
Route::get('/contact-us','FrontController@getContact');
Route::post('/save-subscription','FormController@save_subscription');
Route::post('/check-subscription','FormController@_chkvalidateSubscription');
Route::post('/save-contact','FormController@save_contact');
Route::post('/save-message','FormController@save_message');
Route::post('/save-contributor','FormController@save_contributor');
Route::get('/blog','FrontController@getBlogs');
Route::get('/blog/{blog_url}','FrontController@getBlog_Detail');
//Customer Profille
Route::get('/my-profile', 'Customercontroller@myprofile');
// Route::get('/{url}','FrontController@getPage');



//Product categories

Route::get('admin/get-product-categories', 'CategoryController@productCategories');
Route::get('admin/add-product-category', 'CategoryController@addproductCategory');
Route::post('admin/get-product-category-list', 'CategoryController@get_productCategories');
Route::post('admin/save-product-category', 'CategoryController@saveCategory');
Route::post('admin/change-product-type-status', 'CategoryController@change_productType_status');
Route::get('admin/edit-product-category/{category_id}', 'CategoryController@editProductTypecategory');
Route::post('admin/update-prod-category', 'CategoryController@updateProdcategory');
Route::get('admin/edit-category-meta/{id}', 'CategoryController@editCategoryMeta');
Route::post('admin/update-category-meta', 'CategoryController@updateCategoryMeta');


//Product
Route::get('admin/add-product', 'ProductController@addproduct');
Route::post('admin/save-product', 'ProductController@saveProduct');
Route::get('admin/get-products', 'ProductController@products');
Route::post('admin/get-product-list', 'ProductController@get_products_list');
Route::get('admin/get-product-details/{product_id}', 'ProductController@editProduct');
Route::post('admin/delete-product-image','ProductController@deleteProductImage');
Route::post('admin/update-product', 'ProductController@updateProduct');
Route::get('admin/edit-product-meta/{id}', 'ProductController@editProductMeta');
Route::post('admin/update-product-meta', 'ProductController@updateProductMeta');
Route::get('admin/view-count-products', 'ProductController@view_count_products');
Route::post('admin/get-product-viewed-count-list', 'ProductController@get_products_view_count_list');
Route::post('admin/clear-viewed-product', 'ProductController@clear_viewed_products');

//Product Discount
Route::get('admin/get-discount', 'DiscountController@discount');
Route::post('admin/get-discount-list', 'DiscountController@get_Discount');
Route::get('admin/add-discount', 'DiscountController@adddiscount');
Route::post('admin/save-discount', 'DiscountController@saveDiscount');


//Product attributes
Route::get('admin/get-attribute', 'AttributeController@productAttributes');
Route::post('admin/get-attribute-list', 'AttributeController@get_attributes');
Route::get('admin/add-attribute', 'AttributeController@addproductAttribute');
Route::post('admin/save-attribute', 'AttributeController@saveAttribute');


//Product Shipping
Route::get('admin/add-shipping-zone', 'ShippingController@addShippingZone');
Route::post('admin/save-shipping-zone', 'ShippingController@saveShippingZone');
Route::get('admin/get-shipping', 'ShippingController@shipping');
Route::post('admin/get-shipping-list', 'ShippingController@get_shipping_list');
Route::get('admin/edit-shipping-zone/{zone_id}', 'ShippingController@editShipping');
Route::post('admin/update-shipping-zone', 'ShippingController@updateShipping');



//Admin Orders
Route::get('admin/orders', 'AdminOrederController@orders');
Route::post('admin/get-order-list', 'AdminOrederController@get_order_list');
Route::get('admin/get-order-details/{order_id}', 'AdminOrederController@orderDetailPage');
Route::post('admin/update-order-status', 'AdminOrederController@change_Order_status');
Route::get('admin/print-order-details/{order_id}', 'AdminOrederController@print_orderdetail');
Route::post('admin/print-shipping-details', 'AdminOrederController@printShippingDetail');

//Admin Student membership
Route::get('admin/add-student-membership', 'AdminMembershipController@addstudentMembership');
Route::post('admin/student-membership-save', 'AdminMembershipController@saveMemberShipPlan');
Route::get('admin/student-membership', 'AdminMembershipController@studentMembership');
Route::post('admin/student-membership-list', 'AdminMembershipController@get_MemberShipList');
Route::post('admin/change-membership-status', 'AdminMembershipController@change_membership_status');
Route::get('admin/edit-membership-detail/{membership_id}', 'AdminMembershipController@editmemberShip');
Route::post('admin/student-membership-update', 'AdminMembershipController@updateMembership');



//Admin Customers
Route::get('admin/active-users', 'AdminUserController@users');
Route::post('admin/active-users-list', 'AdminUserController@get_user_list');
Route::post('admin/change-users-status', 'AdminUserController@change_User_status');
Route::get('admin/edit-user-detail/{user_id}', 'AdminUserController@userDetailPage');
Route::post('admin/update-user', 'AdminUserController@userUpdate');
Route::get('admin/add-user', 'AdminUserController@addUserPage');
Route::post('admin/save-user', 'AdminUserController@userSave');
Route::match(['GET', 'POST'],'admin/edit-user-address-list-page', 'AdminUserController@userAddressPage');
Route::get('admin/edit-user-address-list', 'AdminUserController@users_address');
Route::get('admin/edit-user-address-list-detail/{address_id}', 'AdminUserController@users_address_detail');
Route::post('admin/update-user-address-list-detail', 'AdminUserController@useraddressUpdate');
Route::get('admin/add-user-address', 'AdminUserController@useraddressAdd');
Route::post('admin/save-user-address', 'AdminUserController@useraddressSave');



//Admin Subadmin Users
Route::get('admin/active-admin-users', 'AdminSubadminUserController@adminusers');
Route::post('admin/active-admin-users-list', 'AdminSubadminUserController@get_adminuser_list');
Route::post('admin/change-admin-users-status', 'AdminSubadminUserController@change_adminUser_status');
Route::get('admin/edit-admin-user-detail/{user_id}', 'AdminSubadminUserController@adminuserDetailPage');
Route::post('admin/update-admin-user', 'AdminSubadminUserController@adminuserUpdate');
Route::get('admin/add-admin-user', 'AdminSubadminUserController@addadminUserPage');
Route::post('admin/save-admin-user', 'AdminSubadminUserController@adminuserSave');
Route::get('admin/add-admin-permission', 'AdminSubadminUserController@addPermissions');
Route::post('admin/get-admin-permissions', 'AdminSubadminUserController@getPermissions');
Route::post('admin/save-admin-permissions', 'AdminSubadminUserController@savePermissions');



//Admin Student membership
Route::get('admin/active-student-members-page', 'AdminMembershipController@getStudentmemberspage');
Route::post('admin/active-student-members-list', 'AdminMembershipController@get_StudentMemberShipList');
Route::post('admin/change-student-membership-status', 'AdminMembershipController@change_Studentmembership_status');
Route::get('admin/edit-student-membership-detail/{member_id}', 'AdminMembershipController@editStudentmemberShip');
Route::post('admin/update-student-membership-detail', 'AdminMembershipController@UpdateStudentmemberShip');
Route::get('admin/add-student-member', 'AdminMembershipController@addStudentmember');
Route::post('admin/get-student-address', 'AdminMembershipController@getAddress');
Route::post('admin/get-membership-categories', 'AdminMembershipController@getCategories');
Route::post('admin/get-plan-price','AdminMembershipController@getPlanPrice');
Route::post('admin/get-semester','AdminMembershipController@getSemester');
Route::post('admin/save-student-member','AdminMembershipController@saveStudentmembership');


//Customer
Route::post('/save-address', 'Customercontroller@saveCustomerAddress');
Route::post('/update-account', 'Customercontroller@updateCustomerAccount');
Route::post('/get-address-detail', 'Customercontroller@getAddressDetail');
Route::post('/update-address', 'Customercontroller@updateAddressDetail');
Route::post('/my-wishlist', 'Customercontroller@userWishList');
Route::post('/set-default-address', 'Customercontroller@setDefaultAddress');
Route::post('/my-orders', 'OrderController@myOrders');
Route::post('/my-wallet', 'Customercontroller@myWallet');


//Stock
Route::get('admin/get-stock', 'StockController@get_stock');
Route::post('admin/get-stock-list', 'StockController@get_stock_list');
Route::post('admin/save-stock', 'StockController@saveStock');
Route::get('admin/get-parent/{id}', 'ProductController@getParents');

//Order Product
Route::post('/check-pincode-for-availability', 'FrontController@availablePincodeCheck');
Route::post('/add-to-cart', 'FrontController@addToCart');
Route::post('/add-more-cart', 'FrontController@addMoreCart');
Route::post('/buy-now', 'FrontController@buyNow');
Route::get('/cart-items', 'FrontController@showCart');
Route::post('/remove-cart-item', 'FrontController@removeCartItem');
Route::post('/enter-pincode', 'FrontController@checkPincode');
Route::post('/place-order', 'FrontController@placeOrder');
Route::get('/checkout', 'OrderController@checkOutPage');
Route::post('/payment-request', 'OrderController@paymentrequest');
Route::get('/final-order-place', 'OrderController@finalOrderPlace');
Route::post('/check-order-pincode', 'OrderController@checkOrderPincode');
Route::get('/thank-you-order', 'OrderController@thankyou');
Route::post('/cancel-order', 'OrderController@cancelorder');
Route::post('/return-order', 'OrderController@returnorder');


//Wishlist
Route::post('/add-to-wishlist', 'Customercontroller@addToWishList');
Route::post('/move-to-cart', 'Customercontroller@moveToCart');

//Membership
Route::get('/studentmembership','FrontController@getMembershipPage');
Route::post('/check-login-membership','FrontController@checkLoginMembership');
Route::get('/join-membership/{membership_cat_code}','Customercontroller@getMembershipForm');
Route::get('/join-student-membership-save','Customercontroller@saveMembership');
Route::get('/membership-products','Customercontroller@membershipProducts');
Route::post('/get-plan-price','Customercontroller@getPlanPrice');
Route::post('/get-semester','Customercontroller@getSemester');
Route::post('/membership-order-products','Customercontroller@orderMembershipProducts');
Route::post('/membership-payment-request','Customercontroller@membershipPaymentRequest');


//Reports
Route::get('/admin/order-report-page','AdminOrederController@orderReportPage');
Route::post('/admin/order-report-list','AdminOrederController@orderReportList');





//Latest arrivals
Route::post('/product-search','FrontController@productSearch');
Route::post('/load-more-products','FrontController@loadMoreProducts');
Route::get('/{caturl}/{url}','FrontController@getProductDetailsPage');
Route::match(['GET', 'POST'],'/{url}','FrontController@getProductListPage');




