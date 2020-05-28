var getUrl = window.location;
var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[0];

var tablePList;
var tableBCList;
var tableBlogList;
// baseUrl='https://shopinway.com/';
baseUrl='http://192.168.0.5:8000/';
var tablestocklist;

$(document).ready(function(){
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    //Loading the pages from database and fill dropdown
    url=baseUrl+'admin/get-parent';
    if($('#inputParent').length){
        $.ajax({
            url : url,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
      
                if(data.status) //if success close modal and reload ajax table
                {
      
                  $('#inputParent').append(data.data);
                }
                
      
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error geting data');
               
            }
        });
    }
   
    if(('#tablepagelist').length){
        tablePList=$('#tablepagelist').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax":{
                     "url": baseUrl+"admin/get-page-list",
                     "dataType": "json",
                     "type": "POST",
                    
                   },
            "columns": [
                { "data": "page_name" },
                { "data": "page_url" },
                { "data": "parent_name" },
                { "data": "location" },
                { "data": "position" },
                { "data": "status" },
                { "data": "Action" },
            ]
    
        });
    }
    if(('#tableblogcagetorylist').length){
        tableBCList=$('#tableblogcagetorylist').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax":{
                     "url": baseUrl+"admin/get-blog-category-list",
                     "dataType": "json",
                     "type": "POST",
                    
                   },
            "columns": [
                { "data": "category_name" },
                { "data": "category_url" },
                { "data": "parent_name" },
                { "data": "status" },
                { "data": "Action" },
            ]
    
        });
    }
    if(('#tablebloglist').length){
        tableBlogList=$('#tablebloglist').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax":{
                     "url": baseUrl+"admin/get-blog-list",
                     "dataType": "json",
                     "type": "POST",
                    
                   },
            "columns": [
                { "data": "image" },
                { "data": "blog_title" },
                { "data": "blog_url" },
                { "data": "category" },
                { "data": "is_featured" },
                { "data": "is_active" },
                { "data": "Action" },
            ]
    
        });
    }
    if(('#tableproductcagetorylist').length){
        tableproductcagetorylist=$('#tableproductcagetorylist').DataTable({
            "processing": true,
            "serverSide": true,
            "order":[],
            "ajax":{
                     "url": baseUrl+"admin/get-product-category-list",
                     "dataType": "json",
                     "type": "POST",
                    
                   },
            "columns": [
                { "data": "category_parent" },
                { "data": "category_name" },
                { "data": "category_url" },
                { "data": "is_active" },
                { "data": "Action" },
            ],
            "lengthMenu": [[25, 50,100], [25, 50,100]]
    
        });
    }
    if(('#tableproductlist').length){
        tableproductlist=$('#tableproductlist').DataTable({
            "processing": true,
            "serverSide": true,
            "order":[],
            "ajax":{
                     "url": baseUrl+"admin/get-product-list",
                     "dataType": "json",
                     "type": "POST",
                    
                   },
                 
            "columns": [
                { "data": "product_name" },
                { "data": "sku" },
                { "data": "description" },
                { "data": "regular_price" },
                { "data": "discount_price" },
                { "data": "is_active" },
                { "data": "Action" },
            ],
            "lengthMenu": [[25, 50,100], [25, 50,100]]
    
        });
    }
    if(('#tableviewedproductlist').length){
        tableviewedproductlist=$('#tableviewedproductlist').DataTable({
            "processing": true,
            "serverSide": true,
            "order":[],
            "ajax":{
                     "url": baseUrl+"admin/get-product-viewed-count-list",
                     "dataType": "json",
                     "type": "POST",
                    
                   },
                 
            "columns": [
                { "data": "product_name" },
                { "data": "sku" },
                { "data": "description" },
                { "data": "regular_price" },
                { "data": "discount_price" },
                { "data": "count" },
                
            ],
            "lengthMenu": [[25, 50,100], [25, 50,100]]
    
        });
    }

    if(('#tablediscountlist').length){
        tablediscountlist=$('#tablediscountlist').DataTable({
            "processing": true,
            "serverSide": true,
            "order":[],
            "ajax":{
                     "url": baseUrl+"admin/get-discount-list",
                     "dataType": "json",
                     "type": "POST",
                    
                   },
            "columns": [
                { "data": "discount_percent" },
                { "data": "discount_plan" },
               
            ],
            "lengthMenu": [[25, 50,100], [25, 50,100]]
    
        });
    }
    if(('#tableattributelist').length){
        tableattributelist=$('#tableattributelist').DataTable({
            "processing": true,
            "serverSide": true,
            "order":[],
            "ajax":{
                     "url": baseUrl+"admin/get-attribute-list",
                     "dataType": "json",
                     "type": "POST",
                    
                   },
            "columns": [
                { "data": "attr_name" },
                { "data": "is_active" },
               
               
            ],
            "lengthMenu": [[25, 50,100], [25, 50,100]]
    
        });
    }


    if(('#shippinglist').length){
        shippinglist=$('#shippinglist').DataTable({
            "processing": true,
            "serverSide": true,
            "order":[],
            "ajax":{
                     "url": baseUrl+"admin/get-shipping-list",
                     "dataType": "json",
                     "type": "POST",
                    
                   },
            "columns": [
                { "data": "zone_name" },
                { "data": "shipping_name" },
                { "data": "pincode" },
                { "data": "Action" },
               
            ],
            "lengthMenu": [[25, 50,100], [25, 50,100]]
    
        });
    }


    if(('#tablestocklist').length){
        outofstock_qty=$('input[name="outofstock_qty"]:checked').val() ;

        tablestocklist=$('#tablestocklist').DataTable({
            "processing": true,
            "serverSide": true,
            "order":[],
            "ajax":{
                     "url": baseUrl+"admin/get-stock-list",
                     "dataType": "json",
                     "type": "POST",
                     "data": {"outofstock_qty":outofstock_qty},
                   },
            "columns": [
                { "data": "product_id" },
                { "data": "product_name" },
                { "data": "sku" },
                { "data": "description" },
                { "data": "regular_price" },
                { "data": "discount_price" },
                { "data": "existing_qty" },
                { "data": "new_qty" },
                
            ],
            "lengthMenu": [[25, 50,100], [25, 50,100]]
    
        });
    }

    if(('#tableorderlist').length){
        tableorderlist=$('#tableorderlist').DataTable({
            "processing": true,
            "serverSide": true,
            "order":[],
            "ajax":{
                     "url": baseUrl+"admin/get-order-list",
                     "dataType": "json",
                     "type": "POST",
                    
                   },
            "columns": [
                { "data": "order_id" },
                { "data": "order_no" },
                { "data": "type" },
                { "data": "name" },
                { "data": "membership_no" },
                { "data": "total" },
                { "data": "created_at" },
                { "data": "status" },
                { "data": "Action" },
              
                
            ],
           
            "lengthMenu": [[25, 50,100], [25, 50,100]]
    
        });
    }
    if(('#tablemembershiplist').length){
        tablemembershiplist=$('#tablemembershiplist').DataTable({
            "processing": true,
            "serverSide": true,
            "order":[],
            "ajax":{
                     "url": baseUrl+"admin/student-membership-list",
                     "dataType": "json",
                     "type": "POST",
                    
                   },
            "columns": [
                { "data": "session" },
                { "data": "membership_name" },
                { "data": "membership_cat_code" },
                
                { "data": "is_active" },
               
                { "data": "Action" },
              
                
            ],
            "lengthMenu": [[25, 50,100], [25, 50,100]]
    
        });
    }

    if(('#tablestudentMemberslist').length){
        tablestudentMemberslist=$('#tablestudentMemberslist').DataTable({
            "processing": true,
            "serverSide": true,
            "order":[],
            "ajax":{
                     "url": baseUrl+"admin/active-student-members-list",
                     "dataType": "json",
                     "type": "POST",
                    
                   },
            "columns": [
                { "data": "student_unique_no" },
                { "data": "student_name" },
                { "data": "session" },
                { "data": "membership_name" },
                { "data": "membership_plan" },
                { "data": "date_joined" },
                { "data": "is_active" },
               
                { "data": "Action" },
              
                
            ],
            "lengthMenu": [[25, 50,100], [25, 50,100]]
    
        });
    }


    if(('#userlist').length){
        userlist=$('#userlist').DataTable({
            "processing": true,
            "serverSide": true,
            "order":[],
            "ajax":{
                     "url": baseUrl+"admin/active-users-list",
                     "dataType": "json",
                     "type": "POST",
                     
                   },
            "columns": [
                { "data": "name" },
                { "data": "email" },
                { "data": "mobile" },
                { "data": "is_active" },
               
               
                { "data": "Action" },
              
                
            ],
            "lengthMenu": [[25, 50,100], [25, 50,100]]
    
        });
    }
    if(('#adminuserlist').length){
        adminuserlist=$('#adminuserlist').DataTable({
            "processing": true,
            "serverSide": true,
            "order":[],
            "ajax":{
                     "url": baseUrl+"admin/active-admin-users-list",
                     "dataType": "json",
                     "type": "POST",
                     
                   },
            "columns": [
                { "data": "name" },
                { "data": "email" },
               
                { "data": "is_active" },
               
               
                { "data": "Action" },
              
                
            ],
            "lengthMenu": [[25, 50,100], [25, 50,100]]
    
        });
    }


    if(('#useraddresslist').length){
        useraddresslist=$('#useraddresslist').DataTable({
            "processing": true,
            "serverSide": true,
            "order":[],
            "ajax":{
                     "url": baseUrl+"admin/edit-user-address-list-page",
                     "dataType": "json",
                     "type": "POST",
                     "data": {"user_id":$('input[name="user_id"]').val()},
                       
                   },
            "columns": [
                { "data": "address" },
                { "data": "landmark" },
                { "data": "city" },
                { "data": "country" },
                { "data": "pincode" },
                { "data": "phone_no" },
               
               
                { "data": "Action" },
              
                
            ],
            "lengthMenu": [[25, 50,100], [25, 50,100]]
    
        });
    }
  


    if($('#pageeditor').length){
        var editor_config={
            path_absolute:'/',
            selector: '#pageeditor',
            height: 300,
            plugins:[
                'advlist autolink link image lists charmap print preview',
                'searchreplace wordcount visualblocks visualchars code fullscreen', 
                'insertdatetime media save table contextmenu', 
                'paste textcolor colorpicker textpattern', 
            ],
            toolbars : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullet numlist outdent indent | link image media",
            relative_url : false,
            init_instance_callback : function(editor) {
                var data = document.getElementById('pageeditor').text;
                tinymce.get('pageeditor').setContent(data);
            },	
            verify_html : false,
            force_br_newlines : false,
      force_p_newlines : false,
      forced_root_block : '',
      valid_elements: "*[*]",
      file_browser_callback : function(field_name, url, type, win) {
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
  
        var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
        if (type == 'image') {
          cmsURL = cmsURL + "&type=Images";
        } else {
          cmsURL = cmsURL + "&type=Files";
        }
  
        tinyMCE.activeEditor.windowManager.open({
          file : cmsURL,
          title : 'Filemanager',
          width : x * 0.8,
          height : y * 0.8,
          resizable : "yes",
          close_previous : "no"
        });
      }
  
        };
        
        tinymce.init(editor_config);
    }
});

$(document.body).on('click','#pageSubmit',function(e){
    e.preventDefault();
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
    $(this).text('Saving...'); //change button text
    $(this).attr('disabled',true); //set button disable
  
  
    var url =baseUrl+ 'admin/save-page';
    var redUrl=baseUrl+'admin/page-list';
       // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#addPageForm').serialize(),
        dataType: "JSON",
        success: function(data)
        {
  
            if(data.status) //if success close modal and reload ajax table
            {
  
               //$('#customerForm')[0].reset()
               window.location.replace(redUrl);
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $(this).text('Save'); //change button text
            $(this).attr('disabled',false); //set button enable
  
  
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error sending data');
            $(this).text('Save'); //change button text
            $(this).attr('disabled',false); //set button enable
  
        }
    });
});


$(document.body).on('click','#pageEdit',function(e){
    e.preventDefault();
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
    $(this).text('Saving...'); //change button text
    $(this).attr('disabled',true); //set button disable
  
  
    var url =baseUrl+ 'admin/update-page';
    var redUrl=baseUrl+'admin/page-list';
       // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#editPageForm').serialize(),
        dataType: "JSON",
        success: function(data)
        {
  
            if(data.status) //if success close modal and reload ajax table
            {
  
               //$('#customerForm')[0].reset()
               window.location.replace(redUrl);
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $(this).text('Save'); //change button text
            $(this).attr('disabled',false); //set button enable
  
  
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error sending data');
            $(this).text('Save'); //change button text
            $(this).attr('disabled',false); //set button enable
  
        }
    });
});

$(document.body).on('click','#editblogcategorysubmit',function(e){
    e.preventDefault();
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
    $(this).text('Saving...'); //change button text
    $(this).attr('disabled',true); //set button disable
  
  
    var url =baseUrl+ 'admin/update-blog-category';
    var redUrl=baseUrl+'admin/blog-categories';
       // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#editblogcategoryForm').serialize(),
        dataType: "JSON",
        success: function(data)
        {
  
            if(data.status) //if success close modal and reload ajax table
            {
  
               //$('#customerForm')[0].reset()
               window.location.replace(redUrl);
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $(this).text('Save'); //change button text
            $(this).attr('disabled',false); //set button enable
  
  
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error sending data');
            $(this).text('Save'); //change button text
            $(this).attr('disabled',false); //set button enable
  
        }
    });
});


$(document.body).on('click','#addBlogPost',function(e){
    e.preventDefault();
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
    $(this).text('Saving...'); //change button text
    $(this).attr('disabled',true); //set button disable
    tinymce.triggerSave();
  
    var url =baseUrl+ 'admin/save-blog-post';
    var redUrl=baseUrl+'admin/blog-categories';
       // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#addBlogForm').serialize(),
        dataType: "JSON",
        success: function(data)
        {
  
            if(data.status) //if success close modal and reload ajax table
            {
  
               //$('#customerForm')[0].reset()
               window.location.replace(redUrl);
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
               
            }
            
  
  
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error sending data');
            $(this).text('Save'); //change button text
            $(this).attr('disabled',false); //set button enable
  
        }
    });
    $(this).text('Save'); //change button text
    $(this).attr('disabled',false); //set button enable
});


$(document.body).on('click','#editBlogPost',function(e){
    e.preventDefault();
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
    $(this).text('Saving...'); //change button text
    $(this).attr('disabled',true); //set button disable
    tinymce.triggerSave();
  
    var url =baseUrl+ 'admin/update-blog-post';
    var redUrl=baseUrl+'admin/blog-posts';
       // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#editBlogForm').serialize(),
        dataType: "JSON",
        success: function(data)
        {
  
            if(data.status) //if success close modal and reload ajax table
            {
  
               //$('#customerForm')[0].reset()
               window.location.replace(redUrl);
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
               
            }
            
  
  
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error sending data');
            $(this).text('Save'); //change button text
            $(this).attr('disabled',false); //set button enable
  
        }
    });
    $(this).text('Save'); //change button text
    $(this).attr('disabled',false); //set button enable
});


function reloadPageTable(){
    tablePList.ajax.reload(null,false);
}

function change_page(id){
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
    
    var url =baseUrl+ 'admin/change-page-status';
       // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: {'id':id},
        dataType: "JSON",
        success: function(data)
        {
  
            if(data.status) //if success close modal and reload ajax table
            {
                reloadPageTable();
                
              
            }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error sending data'); 
        }
    });
}
function change_blog_category(id){
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
    
    var url =baseUrl+ 'admin/change-blog-category-status';
       // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: {'id':id},
        dataType: "JSON",
        success: function(data)
        {
  
            if(data.status) //if success close modal and reload ajax table
            {
                reloadBlogCategoryTable();
                
              
            }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error sending data'); 
        }
    });
}
function change_blog(id){
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
    
    var url =baseUrl+ 'admin/change-blog-status';
       // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: {'id':id},
        dataType: "JSON",
        success: function(data)
        {
  
            if(data.status) //if success close modal and reload ajax table
            {
                reloadBlogTable();
                
              
            }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error sending data'); 
        }
    });
}

function featured(id){
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
    
    var url =baseUrl+ 'admin/change-blog-feature';
       // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: {'id':id},
        dataType: "JSON",
        success: function(data)
        {
  
            if(data.status) //if success close modal and reload ajax table
            {
                reloadBlogTable();
                
              
            }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error sending data'); 
        }
    });
}

function reloadBlogCategoryTable(){
    tableBCList.ajax.reload(null,false);
}
function reloadBlogTable(){
    tableBlogList.ajax.reload(null,false);
}


$(document.body).on('click','#metaUpdate',function(e){
    e.preventDefault();
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
    $(this).text('Saving...'); //change button text
    $(this).attr('disabled',true); //set button disable
  
  
    var url =baseUrl+ 'admin/update-page-meta';
    var redUrl=baseUrl+'admin/page-list';
       // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#updatePageMetaForm').serialize(),
        dataType: "JSON",
        success: function(data)
        {
  
            if(data.status) //if success close modal and reload ajax table
            {
               window.location.replace(redUrl);
            }
            
            $(this).text('Save'); //change button text
            $(this).attr('disabled',false); //set button enable
  
  
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error sending data');
            $(this).text('Save'); //change button text
            $(this).attr('disabled',false); //set button enable
  
        }
    });
});
$(document.body).on('click','#categorymetaUpdate',function(e){
    e.preventDefault();
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
    $(this).text('Saving...'); //change button text
    $(this).attr('disabled',true); //set button disable
  
  
    var url =baseUrl+ 'admin/update-category-meta';
    var redUrl=baseUrl+'admin/get-product-categories';
       // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#updateCategoryMetaForm').serialize(),
        dataType: "JSON",
        success: function(data)
        {
  
            if(data.status) //if success close modal and reload ajax table
            {
               window.location.replace(redUrl);
            }
            
            $(this).text('Save'); //change button text
            $(this).attr('disabled',false); //set button enable
  
  
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error sending data');
            $(this).text('Save'); //change button text
            $(this).attr('disabled',false); //set button enable
  
        }
    });
});

$(document.body).on('click','#productmetaUpdate',function(e){
    e.preventDefault();
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
    $(this).text('Saving...'); //change button text
    $(this).attr('disabled',true); //set button disable
  
  
    var url =baseUrl+ 'admin/update-product-meta';
    var redUrl=baseUrl+'admin/get-products';
       // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#updateProductMetaForm').serialize(),
        dataType: "JSON",
        success: function(data)
        {
  
            if(data.status) //if success close modal and reload ajax table
            {
               window.location.replace(redUrl);
            }
            
            $(this).text('Save'); //change button text
            $(this).attr('disabled',false); //set button enable
  
  
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error sending data');
            $(this).text('Save'); //change button text
            $(this).attr('disabled',false); //set button enable
  
        }
    });
});

$(document.body).on('click','#blogcategorysubmit',function(e){
    e.preventDefault();
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
    $(this).text('Saving...'); //change button text
    $(this).attr('disabled',true); //set button disable
  
  
    var url =baseUrl+ 'admin/save-blog-category';
    var redUrl=baseUrl+'admin/blog-categories';
       // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#addblogcategoryForm').serialize(),
        dataType: "JSON",
        success: function(data)
        {
  
            if(data.status) //if success close modal and reload ajax table
            {
  
               //$('#customerForm')[0].reset()
               window.location.replace(redUrl);
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $(this).text('Save'); //change button text
            $(this).attr('disabled',false); //set button enable
  
  
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error sending data');
            $(this).text('Save'); //change button text
            $(this).attr('disabled',false); //set button enable
  
        }
    });
});


$(document.body).on('click','#editpagebanner',function(e){
    e.preventDefault();
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
    $(this).text('Saving...'); //change button text
    $(this).attr('disabled',true); //set button disable
    tinymce.triggerSave();
  
    var url =baseUrl+ 'admin/update-banner';
    var redUrl=baseUrl+'admin/page-list';
       // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#editBannerForm').serialize(),
        dataType: "JSON",
        success: function(data)
        {
  
            if(data.status) //if success close modal and reload ajax table
            {
  
               //$('#customerForm')[0].reset()
               window.location.replace(redUrl);
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
               
            }
            
  
  
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error sending data');
            $(this).text('Save'); //change button text
            $(this).attr('disabled',false); //set button enable
  
        }
    });
    $(this).text('Save'); //change button text
    $(this).attr('disabled',false); //set button enable
});


// $('.cForm').focusin(function(){
//     $(this).removeClass('has-error');
//     $(this).next().text('');
// });

$(document.body).on('focusin','.cForm',function(){
    $(this).removeClass('has-error');
    $(this).next().text('');

});


$(document.body).on('click','#prodcategorysubmit',function(e){
    e.preventDefault();
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
    $(this).text('Saving...'); //change button text
    $(this).attr('disabled',true); //set button disable
  
  
    var url =baseUrl+ 'admin/save-product-category';
    var redUrl=baseUrl+'admin/get-product-categories';
       // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#addproductcategoryForm').serialize(),
        dataType: "JSON",
        success: function(data)
        {
  
            if(data.status) //if success close modal and reload ajax table
            {
  
               //$('#customerForm')[0].reset()
               window.location.replace(redUrl);
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#prodcategorysubmit').text('Save'); //change button text
            $('#prodcategorysubmit').attr('disabled',false); //set button enable
  
  
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error sending data');
            $('#prodcategorysubmit').text('Save'); //change button text
            $('#prodcategorysubmit').attr('disabled',false); //set button enable
  
        }
    });
});


function change_productType(id){
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
    
    var url =baseUrl+ 'admin/change-product-type-status';
       // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: {'id':id},
        dataType: "JSON",
        success: function(data)
        {
            if(data.message) //if success close modal and reload ajax table
            {
                tableproductcagetorylist.ajax.reload(null,false);
            }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error sending data'); 
        }
    });
}


$(document.body).on('click','#editprodcategorysubmit',function(e){
    e.preventDefault();
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
    $(this).text('Saving...'); //change button text
    $(this).attr('disabled',true); //set button disable
  
  
    var url =baseUrl+ 'admin/update-prod-category';
    var redUrl=baseUrl+'admin/get-product-categories';
       // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#editprodcategoryForm').serialize(),
        dataType: "JSON",
        success: function(data)
        {
  
            if(data.status) //if success close modal and reload ajax table
            {
  
               //$('#customerForm')[0].reset()
               window.location.replace(redUrl);
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#editprodcategorysubmit').text('Save'); //change button text
            $('#editprodcategorysubmit').attr('disabled',false); //set button enable
  
  
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error sending data');
            $('#editprodcategorysubmit').text('Save'); //change button text
            $('#editprodcategorysubmit').attr('disabled',false); //set button enable
  
        }
    });
});


$(document.body).on('click','#prodsubmit',function(e){
    e.preventDefault();
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
    $(this).text('Saving...'); //change button text
    $(this).attr('disabled',true); //set button disable
  
  
    var url =baseUrl+ 'admin/save-product';
    var redUrl=baseUrl+'admin/get-products';
       // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#addproductForm').serialize(),
        dataType: "JSON",
        success: function(data)
        {
  
            if(data.status) //if success close modal and reload ajax table
            {
  
               //$('#customerForm')[0].reset()
               window.location.replace(redUrl);
            }
            else
            {
                $('#generalerror').html('<p style="color:red;">Error exits. Please check every tabs and rectify it.</p>');
                if(data.valid==false){
                    
                    $('#categoryerror').html('<p style="color:red;">'+data.validString.inputCategory+'</p>');
                    $('#featureimagerror').html('<p style="color:red;">'+data.validString.featuredImg+'</p>');
                }
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#prodsubmit').text('Save'); //change button text
            $('#prodsubmit').attr('disabled',false); //set button enable
  
  
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error sending data');
            $('#prodsubmit').text('Save'); //change button text
            $('#prodsubmit').attr('disabled',false); //set button enable
  
        }
    });
});





$(document.body).on('click','#discountsubmit',function(e){
    e.preventDefault();
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
    $(this).text('Saving...'); //change button text
    $(this).attr('disabled',true); //set button disable
  
  
    var url =baseUrl+ 'admin/save-discount';
    var redUrl=baseUrl+'admin/get-discount';
       // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#addDiscountForm').serialize(),
        dataType: "JSON",
        success: function(data)
        {
  
            if(data.status) //if success close modal and reload ajax table
            {
  
               //$('#customerForm')[0].reset()
               window.location.replace(redUrl);
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#discountsubmit').text('Save'); //change button text
            $('#discountsubmit').attr('disabled',false); //set button enable
  
  
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error sending data');
            $('#discountsubmit').text('Save'); //change button text
            $('#discountsubmit').attr('disabled',false); //set button enable
  
        }
    });
});



$(document.body).on('click','#prodAttributesubmit',function(e){
    e.preventDefault();
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
    $(this).text('Saving...'); //change button text
    $(this).attr('disabled',true); //set button disable
  
  
    var url =baseUrl+ 'admin/save-attribute';
    var redUrl=baseUrl+'admin/get-attribute';
       // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#addproductAttributeForm').serialize(),
        dataType: "JSON",
        success: function(data)
        {
  
            if(data.status) //if success close modal and reload ajax table
            {
  
               //$('#customerForm')[0].reset()
               window.location.replace(redUrl);
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#prodAttributesubmit').text('Save'); //change button text
            $('#prodAttributesubmit').attr('disabled',false); //set button enable
  
  
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error sending data');
            $('#prodAttributesubmit').text('Save'); //change button text
            $('#prodAttributesubmit').attr('disabled',false); //set button enable
  
        }
    });
});



$(document.body).on('click','#shippingZoneSubmit',function(e){
    e.preventDefault();
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
    $(this).text('Saving...'); //change button text
    $(this).attr('disabled',true); //set button disable
  
  
    var url =baseUrl+ 'admin/save-shipping-zone';
    var redUrl=baseUrl+'admin/get-shipping';
       // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#shippingZoneForm').serialize(),
        dataType: "JSON",
        success: function(data)
        {
  
            if(data.status) //if success close modal and reload ajax table
            {
  
               //$('#customerForm')[0].reset()
               window.location.replace(redUrl);
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#shippingZoneSubmit').text('Save'); //change button text
            $('#shippingZoneSubmit').attr('disabled',false); //set button enable
  
  
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error sending data');
            $('#shippingZoneSubmit').text('Save'); //change button text
            $('#shippingZoneSubmit').attr('disabled',false); //set button enable
  
        }
    });
});


$(document.body).on('click','#updateshippingZoneSubmit',function(e){
    e.preventDefault();
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
    $(this).text('Saving...'); //change button text
    $(this).attr('disabled',true); //set button disable
  
  
    var url =baseUrl+ 'admin/update-shipping-zone';
    var redUrl=baseUrl+'admin/get-shipping';
       // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#updateshippingZoneForm').serialize(),
        dataType: "JSON",
        success: function(data)
        {
  
            if(data.status) //if success close modal and reload ajax table
            {
  
               //$('#customerForm')[0].reset()
               window.location.replace(redUrl);
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#updateshippingZoneSubmit').text('Save'); //change button text
            $('#updateshippingZoneSubmit').attr('disabled',false); //set button enable
  
  
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error sending data');
            $('#updateshippingZoneSubmit').text('Save'); //change button text
            $('#updateshippingZoneSubmit').attr('disabled',false); //set button enable
  
        }
    });
});



$(document.body).on('click','#stockSubmit',function(e){
    e.preventDefault();
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
    $(this).text('Saving...'); //change button text
    $(this).attr('disabled',true); //set button disable
  
  
    var url =baseUrl+ 'admin/save-stock';
    var redUrl=baseUrl+'admin/get-stock';
       // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#stockForm').serialize(),
        dataType: "JSON",
        success: function(data)
        {
  
            if(data.status) //if success close modal and reload ajax table
            {
  
               //$('#customerForm')[0].reset()
               window.location.replace(redUrl);
            }
            else
            {
                if(data.valid==false){
                    $('#error').html('<p class="form-error" style="color:red;">Please select Atleast one Item</p>');
                }
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }

            }
            $('#stockSubmit').text('Save'); //change button text
            $('#stockSubmit').attr('disabled',false); //set button enable
  
  
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error sending data');
            $('#stockSubmit').text('Save'); //change button text
            $('#stockSubmit').attr('disabled',false); //set button enable
  
        }
    });
});


function deleteImage(image_id){

    event.preventDefault();
  
     $.ajax({
       type: 'POST',
       url: baseUrl+'admin/delete-product-image',
       data: {image_id: image_id},
       dataType: "json",
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       },
       success: function (response) {
             if(response.status === true){
        
                 alert('Image deleted successfully');
                 console.log($('#deleteImg_'+image_id).closest("tr"));
                 $('#deleteImg_'+image_id).closest("tr").remove();
 
         } else {
             alert('Something went wrong');
 
             
         }
       }, error: function (xhr, status, error) {
            
       }
   });
 }


 $(document.body).on('click','#updateprodsubmit',function(e){
    e.preventDefault();
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
    $(this).text('Saving...'); //change button text
    $(this).attr('disabled',true); //set button disable
  
  
    var url =baseUrl+ 'admin/update-product';
    var redUrl=baseUrl+'admin/get-products';
       // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#editproductForm').serialize(),
        dataType: "JSON",
        success: function(data)
        {
  
            if(data.status) //if success close modal and reload ajax table
            {
  
               //$('#customerForm')[0].reset()
               window.location.replace(redUrl);
            }
            else
            {
                 
                $('#generalerror').html('<p style="color:red;">Error exits. Please check every tabs and rectify it.</p>');
                if(data.valid==false){
                    
                    $('#categoryerror').html('<p style="color:red;">'+data.validString.inputCategory+'</p>');
                    $('#featureimagerror').html('<p style="color:red;">'+data.validString.featuredImg+'</p>');
                }
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#updateprodsubmit').text('Save'); //change button text
            $('#updateprodsubmit').attr('disabled',false); //set button enable
  
  
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error sending data');
            $('#updateprodsubmit').text('Save'); //change button text
            $('#updateprodsubmit').attr('disabled',false); //set button enable
  
        }
    });
});

 $(document.body).on('click','#membershipformsubmit',function(e){
    e.preventDefault();
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
    $(this).text('Saving...'); //change button text
    $(this).attr('disabled',true); //set button disable
  
  
    var url =baseUrl+ 'admin/student-membership-save';
    var redUrl=baseUrl+'admin/student-membership';
       // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#addmembershipForm').serialize(),
        dataType: "JSON",
        success: function(data)
        {
  
            if(data.status) //if success close modal and reload ajax table
            {
  
               //$('#customerForm')[0].reset()
               window.location.replace(redUrl);
            }
            else
            {
                 
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#membershipformsubmit').text('Save'); //change button text
            $('#membershipformsubmit').attr('disabled',false); //set button enable
  
  
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error sending data');
            $('#membershipformsubmit').text('Save'); //change button text
            $('#membershipformsubmit').attr('disabled',false); //set button enable
  
        }
    });
});




 $(document.body).on('click','#updatemembershipformsubmit',function(e){
    e.preventDefault();
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
    $(this).text('Saving...'); //change button text
    $(this).attr('disabled',true); //set button disable
  
  
    var url =baseUrl+ 'admin/student-membership-update';
    var redUrl=baseUrl+'admin/student-membership';
       // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#editmembershipForm').serialize(),
        dataType: "JSON",
        success: function(data)
        {
  
            if(data.status) //if success close modal and reload ajax table
            {
  
               //$('#customerForm')[0].reset()
               window.location.replace(redUrl);
            }
            else
            {
                 
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#updatemembershipformsubmit').text('Save'); //change button text
            $('#updatemembershipformsubmit').attr('disabled',false); //set button enable
  
  
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error sending data');
            $('#updatemembershipformsubmit').text('Save'); //change button text
            $('#updatemembershipformsubmit').attr('disabled',false); //set button enable
  
        }
    });
});



function change_Membership(id){
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
    
    var url =baseUrl+ 'admin/change-membership-status';
       // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: {'id':id},
        dataType: "JSON",
        success: function(data)
        {
            if(data.message) //if success close modal and reload ajax table
            {
                tablemembershiplist.ajax.reload(null,false);
            }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error sending data'); 
        }
    });
}



function change_Studentmembership_status(id){
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
    
    var url =baseUrl+ 'admin/change-student-membership-status';
       // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: {'id':id},
        dataType: "JSON",
        success: function(data)
        {
            if(data.message) //if success close modal and reload ajax table
            {
                tablestudentMemberslist.ajax.reload(null,false);
            }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error sending data'); 
        }
    });
}



$(document.body).on('click','#updateStudentMembershipSubmit',function(e){
    e.preventDefault();
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
    $(this).text('Saving...'); //change button text
    $(this).attr('disabled',true); //set button disable
  
  
    var url =baseUrl+ 'admin/update-student-membership-detail';
    var redUrl=baseUrl+'admin/active-student-members-page';
       // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#updatestudentmembershipForm').serialize(),
        dataType: "JSON",
        success: function(data)
        {
  
            if(data.status) //if success close modal and reload ajax table
            {
  
               //$('#customerForm')[0].reset()
               window.location.replace(redUrl);
            }
            else
            {
                 
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#updateStudentMembershipSubmit').text('Save'); //change button text
            $('#updateStudentMembershipSubmit').attr('disabled',false); //set button enable
  
  
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error sending data');
            $('#updateStudentMembershipSubmit').text('Save'); //change button text
            $('#updateStudentMembershipSubmit').attr('disabled',false); //set button enable
  
        }
    });
});


$(document.body).on('click','#updateOrderSubmit',function(e){
    e.preventDefault();
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
    $(this).text('Saving...'); //change button text
    $(this).attr('disabled',true); //set button disable
  
  
    var url =baseUrl+ 'admin/update-order-status';
    var redUrl=baseUrl+'admin/orders';
       // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#orderDetailForm').serialize(),
        dataType: "JSON",
        success: function(data)
        {
  
            if(data.status==true) 
            {
               window.location.replace(redUrl);
            }
            else
            {
                 
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#updateOrderSubmit').text('Save'); //change button text
            $('#updateOrderSubmit').attr('disabled',false); //set button enable
  
  
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error sending data');
            $('#updateOrderSubmit').text('Save'); //change button text
            $('#updateOrderSubmit').attr('disabled',false); //set button enable
  
        }
    });
});

function change_User(id){
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
    
    var url =baseUrl+ 'admin/change-users-status';
       // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: {'id':id},
        dataType: "JSON",
        success: function(data)
        {
            if(data.message) //if success close modal and reload ajax table
            {
                userlist.ajax.reload(null,false);
            }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error sending data'); 
        }
    });
}
function change_AdminUser(id){
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
    
    var url =baseUrl+ 'admin/change-admin-users-status';
       // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: {'id':id},
        dataType: "JSON",
        success: function(data)
        {
            if(data.message) //if success close modal and reload ajax table
            {
                adminuserlist.ajax.reload(null,false);
            }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error sending data'); 
        }
    });
}


$(document.body).on('click','#editusersubmit',function(e){
    e.preventDefault();
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
    $(this).text('Saving...'); //change button text
    $(this).attr('disabled',true); //set button disable
  
  
    var url =baseUrl+ 'admin/update-user';
    var redUrl=baseUrl+'admin/active-users';
       // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#edituserForm').serialize(),
        dataType: "JSON",
        success: function(data)
        {
  
            if(data.status==true) 
            {
               window.location.replace(redUrl);
            }
            else
            {
                 
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#editusersubmit').text('Save'); //change button text
            $('#editusersubmit').attr('disabled',false); //set button enable
  
  
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error sending data');
            $('#editusersubmit').text('Save'); //change button text
            $('#editusersubmit').attr('disabled',false); //set button enable
  
        }
    });
});



$(document.body).on('click','#editadminusersubmit',function(e){
    e.preventDefault();
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
    $(this).text('Saving...'); //change button text
    $(this).attr('disabled',true); //set button disable
  
  
    var url =baseUrl+ 'admin/update-admin-user';
    var redUrl=baseUrl+'admin/active-admin-users';
       // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#editadminuserForm').serialize(),
        dataType: "JSON",
        success: function(data)
        {
  
            if(data.status==true) 
            {
               window.location.replace(redUrl);
            }
            else
            {
                 
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#editadminusersubmit').text('Save'); //change button text
            $('#editadminusersubmit').attr('disabled',false); //set button enable
  
  
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error sending data');
            $('#editadminusersubmit').text('Save'); //change button text
            $('#editadminusersubmit').attr('disabled',false); //set button enable
  
        }
    });
});




$(document.body).on('click','#usersubmit',function(e){
    e.preventDefault();
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
    $(this).text('Saving...'); //change button text
    $(this).attr('disabled',true); //set button disable
  
  
    var url =baseUrl+ 'admin/save-user';
    var redUrl=baseUrl+'admin/active-users';
       // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#userForm').serialize(),
        dataType: "JSON",
        success: function(data)
        {
  
            if(data.status==true) 
            {
               window.location.replace(redUrl);
            }
            else
            {
                 
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#usersubmit').text('Save'); //change button text
            $('#usersubmit').attr('disabled',false); //set button enable
  
  
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error sending data');
            $('#usersubmit').text('Save'); //change button text
            $('#usersubmit').attr('disabled',false); //set button enable
  
        }
    });
});


$(document.body).on('click','#edituserAddresssubmit',function(e){
    e.preventDefault();
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
    $(this).text('Saving...'); //change button text
    $(this).attr('disabled',true); //set button disable
  
  
    var url =baseUrl+ 'admin/update-user-address-list-detail';
    var redUrl=baseUrl+'admin/active-users';
       // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#edituserAddressForm').serialize(),
        dataType: "JSON",
        success: function(data)
        {
  
            if(data.status==true) 
            {
               window.history.back();
            }
            else
            {
                 
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#edituserAddresssubmit').text('Save'); //change button text
            $('#edituserAddresssubmit').attr('disabled',false); //set button enable
  
  
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error sending data');
            $('#edituserAddresssubmit').text('Save'); //change button text
            $('#edituserAddresssubmit').attr('disabled',false); //set button enable
  
        }
    });
});


$(document.body).on('click','#adduserAddresssubmit',function(e){
    e.preventDefault();
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
    $(this).text('Saving...'); //change button text
    $(this).attr('disabled',true); //set button disable
  
  
    var url =baseUrl+ 'admin/save-user-address';
    var redUrl=baseUrl+'admin/active-users';
       // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#adduserAddressForm').serialize(),
        dataType: "JSON",
        success: function(data)
        {
  
            if(data.status) //if success close modal and reload ajax table
            {
  
               //$('#customerForm')[0].reset()
            //    window.location.replace(redUrl);
            window.history.back();
            }
            else
            {
                 
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#adduserAddresssubmit').text('Save'); //change button text
            $('#adduserAddresssubmit').attr('disabled',false); //set button enable
  
  
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error sending data');
            $('#adduserAddresssubmit').text('Save'); //change button text
            $('#adduserAddresssubmit').attr('disabled',false); //set button enable
  
        }
    });
});






$(document.body).on('click','#addStudentMembershipsubmit',function(e){
    e.preventDefault();
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
    $(this).text('Saving...'); //change button text
    $(this).attr('disabled',true); //set button disable
  
  
    var url =baseUrl+ 'admin/save-student-member';
    var redUrl=baseUrl+'admin/active-student-members-page';
       // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#addstudentMemberForm').serialize(),
        dataType: "JSON",
        success: function(data)
        {
  
            if(data.status==true) 
            {
               window.location.replace(redUrl);
            }
            else
            {
                 
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#addStudentMembershipsubmit').text('Save'); //change button text
            $('#addStudentMembershipsubmit').attr('disabled',false); //set button enable
  
  
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error sending data');
            $('#addStudentMembershipsubmit').text('Save'); //change button text
            $('#addStudentMembershipsubmit').attr('disabled',false); //set button enable
  
        }
    });
});




function getuserAddress(user_id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
      
      var url =baseUrl+ 'admin/get-student-address';
         // ajax adding data to database
      $.ajax({
          url : url,
          type: "POST",
          data: {'user_id':user_id},
          dataType: "JSON",
          success: function(data)
          {
              if(data.status==true) //if success close modal and reload ajax table
              {
                 $('#addressDiv').html(data.addressDiv);
              }
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
              alert('Error sending data'); 
          }
      });
}


function changePlan(inputPlan) {
    $('.loading').show();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var url = baseUrl + 'admin/get-plan-price';

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
                $('input[name="inputSPrice"]').val(response.priceDecimal);



            }
        }, error: function (xhr, error) {

        }
    });

}


function getSemester(category_id) {
    $('.loading').show();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var url = baseUrl + 'admin/get-semester';

    $.ajax({
        type: 'POST',
        url: url,
        data: {
            'category_id': category_id
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


function getCategories(membership_id) {
    

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var url = baseUrl + 'admin/get-membership-categories';

    $.ajax({
        type: 'POST',
        url: url,
        data: {
            'membership_id': membership_id
        },
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.status === true) {
               
                $('#categoryDiv').html(response.categoryDiv);
                



            }
        }, error: function (xhr, error) {

        }
    });

}

var orderreportlist;
$(document.body).on('click','#orderSearch',function(){

    if(orderreportlist){
        orderreportlist.destroy();
    }
   
        orderreportlist=$('#orderreportlist').DataTable({
            "processing": true,
            "serverSide": true,
            "order":[],
            "ajax":{
                    "url": baseUrl+"admin/order-report-list",
                    "dataType": "json",
                    "type": "POST",
                    "data": {
                        "inputStartDate":$('input[name="inputStartDate"]').val(),
                        "inputEndDate":$('input[name="inputEndDate"]').val(),
                        "inputGroupBy":$('select[name="inputGroupBy"]').val(),
                        "inputOrderStatus":$('select[name="inputOrderStatus"]').val(),
                    },
                    
                },
            "columns": [
                { "data": "day_range" },
                { "data": "ordercount" },
                
                // { "data": "prodcount" },
                { "data": "net_total" },
                
            
                
            ],
            "lengthMenu": [[25, 50,100], [25, 50,100]]

        });
    

});


$(document.body).on('click','#clearViewedProduct',function(e){
    e.preventDefault();
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
    $(this).text('Saving...'); //change button text
    $(this).attr('disabled',true); //set button disable
  
  
    var url =baseUrl+ 'admin/clear-viewed-product';
    var redUrl=baseUrl+'admin/view-count-products';
       // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#addstudentMemberForm').serialize(),
        dataType: "JSON",
        success: function(data)
        {
  
            if(data.status==true) 
            {
               window.location.replace(redUrl);
            }
            else
            { 
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#clearViewedProduct').text('Save'); //change button text
            $('#clearViewedProduct').attr('disabled',false); //set button enable
  
  
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error sending data');
            $('#clearViewedProduct').text('Save'); //change button text
            $('#clearViewedProduct').attr('disabled',false); //set button enable
  
        }
    });
});




$('#checkoutofstock').click(function(){
    if(('#tablestocklist').length){
        tablestocklist.destroy();
        outofstock_qty=$('input[name="outofstock_qty"]:checked').val() ;

        tablestocklist=$('#tablestocklist').DataTable({
            "processing": true,
            "serverSide": true,
            "order":[],
            "ajax":{
                     "url": baseUrl+"admin/get-stock-list",
                     "dataType": "json",
                     "type": "POST",
                     "data": {"outofstock_qty":outofstock_qty},
                   },
            "columns": [
                { "data": "product_id" },
                { "data": "product_name" },
                { "data": "sku" },
                { "data": "description" },
                { "data": "regular_price" },
                { "data": "discount_price" },
                { "data": "existing_qty" },
                { "data": "new_qty" },
                
            ],
            "lengthMenu": [[25, 50,100], [25, 50,100]]
    
        });
    }
});


function reloadorderlist(inputOrderStatus){
    
        if(('#tableorderlist').length){
            tableorderlist.destroy();
            tableorderlist=$('#tableorderlist').DataTable({
                "processing": true,
                "serverSide": true,
                "order":[],
                "ajax":{
                         "url": baseUrl+"admin/get-order-list",
                         "dataType": "json",
                         "type": "POST",
                         "data": {
                       
                            "inputOrderStatus":inputOrderStatus,
                        },
                        
                       },
                "columns": [
                    { "data": "order_id" },
                    { "data": "order_no" },
                    { "data": "type" },
                    { "data": "name" },
                    { "data": "membership_no" },
                    { "data": "total" },
                    { "data": "created_at" },
                    { "data": "status" },
                    { "data": "Action" },
                  
                    
                ],
               
                "lengthMenu": [[25, 50,100], [25, 50,100]]
        
            });
        }
    
}



$(document.body).on('click','#adminusersubmit',function(e){
    e.preventDefault();
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
    $(this).text('Saving...'); //change button text
    $(this).attr('disabled',true); //set button disable
  
  
    var url =baseUrl+ 'admin/save-admin-user';
    var redUrl=baseUrl+'admin/active-admin-users';
       // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#adminuserForm').serialize(),
        dataType: "JSON",
        success: function(data)
        {
  
            if(data.status==true) 
            {
               window.location.replace(redUrl);
            }
            else
            {
                 
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#adminusersubmit').text('Save'); //change button text
            $('#adminusersubmit').attr('disabled',false); //set button enable
  
  
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error sending data');
            $('#adminusersubmit').text('Save'); //change button text
            $('#adminusersubmit').attr('disabled',false); //set button enable
  
        }
    });
});


function getPermissions(admin_id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var url = baseUrl + 'admin/get-admin-permissions';

    $.ajax({
        type: 'POST',
        url: url,
        data: {
            'admin_id': admin_id
        },
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.status === true) {
               
                $('#permissionsDiv').html(response.permissionsDiv);
              
            }
        }, error: function (xhr, error) {

        }
    });
}


$(document.body).on('click','#addSubadminPermissionSubmit',function(e){
    e.preventDefault();
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
    $(this).text('Saving...'); //change button text
    $(this).attr('disabled',true); //set button disable
  
  
    var url =baseUrl+ 'admin/save-admin-permissions';
    var redUrl=baseUrl+'admin/add-admin-permission';
       // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#subadminpermissionForm').serialize(),
        dataType: "JSON",
        success: function(data)
        {
  
            if(data.status==true) 
            {
               window.location.replace(redUrl);
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#addSubadminPermissionSubmit').text('Save'); //change button text
            $('#addSubadminPermissionSubmit').attr('disabled',false); //set button enable
  
  
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error sending data');
            $('#addSubadminPermissionSubmit').text('Save'); //change button text
            $('#addSubadminPermissionSubmit').attr('disabled',false); //set button enable
  
        }
    });
});


setTimeout(function() {
    $('#generalerror').fadeOut('fast');
}, 10000);








