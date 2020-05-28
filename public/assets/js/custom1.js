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
var baseUrl="http://192.168.0.9:8000";
$('#login-form').submit(function (event){
    event.preventDefault();
  var results = '';  
  $('#login_error').html('');
    $.ajax({
      type: 'POST',
      url: baseUrl+'/login',
      data: {email: $("#email").val(), password:$("#password").val()},
      dataType: "json",
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function (response) {
            if(response.success === false){
             $.each(response.errors, function(key, value){
           // $('#login_error').show();
            $('#login_error').append('<p>'+value+'</p>');
        });
        } else {
            window.location.href = response.redirectto;
        }
      }, error: function (xhr, status, error) {
            $('#login_error').show();
            $('#login_error').append('<p>'+error+'</p>');
      }
  });
});