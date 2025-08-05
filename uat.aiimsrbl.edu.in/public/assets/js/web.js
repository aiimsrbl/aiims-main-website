function show_loader(){
  Notiflix.Loading.hourglass('Please wait..');
}

function adminResetPasswordOTPEmail(){
  var formData = new FormData(document.getElementById("reset_password"));

    let url = base_url+"/reset-password";

    ajax_resp = $.ajax({
        'url'       : url,
        'data'      : formData,
        'type'      : 'post',
        'dataType'  : 'json',
        async: true,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend  : function()
        {   
          $('.invalid-feedback').remove();
          $('form input').removeClass('is-invalid state-invalid');
          $('form textarea').removeClass('is-invalid state-invalid');
          Notiflix.Loading.hourglass('Please wait..');
          btn_disable("#submit_btn");
        },
        success     : function(resp)
        { 
          Notiflix.Loading.remove();
          btn_enable("#submit_btn",'Next');

          if(resp.success === true){
              success_popup(resp.msg);
              $('#email_new').val(resp.data.email);
              $('#reset_password').addClass('d-none');
              $('#reset_password_frm').removeClass('d-none');
          }
        },
        error : function(error)
        {  
          Notiflix.Loading.remove();
          btn_enable("#submit_btn",'Next');

          //let resp = error.responseJSON;
          let resp = JSON.parse(error.responseText);

          if(typeof error.status !== 'undefined' && error.status === 400){
            $.each(resp.data,function(input,msg){ 
              $("#"+input).after(`<div class="invalid-feedback">`+msg+`</div>`);
              $("#"+input).addClass("is-invalid state-invalid");
            });
          }
          else if(typeof resp.success !== 'undefined' && error.status === 400){
            error_popup(resp.error);
          }
          else{
            error_popup();
          }
        },
        complete    : function(){
          Notiflix.Loading.remove();
          btn_enable("#submit_btn",'Next');
        }
    });
}

function adminPasswordChange()
{
  var formData = new FormData(document.getElementById("reset_password_frm"));

  let url = base_url+"/change-password";
    ajax_resp = $.ajax({
        'url'       : url,
        'data'      : formData,
        'type'      : 'post',
        'dataType'  : 'json',
        async: true,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend  : function()
        {   
          $('.invalid-feedback').remove();
          $('form input').removeClass('is-invalid state-invalid');
          $('form textarea').removeClass('is-invalid state-invalid');
          Notiflix.Loading.hourglass('Please wait..');
          btn_disable("#submit_btn");
        },
        success     : function(resp)
        { 
          Notiflix.Loading.remove();
          btn_enable("#submit_btn",'Next');

          if(resp.success === true){
              success_popup(resp.msg);
              $('#reset_password_frm')[0].reset();

              setTimeout(function(){
                window.location.href=base_url+"/dashboard-login";
              },3000)
          }
        },
        error : function(error)
        {  
          Notiflix.Loading.remove();
          btn_enable("#submit_btn",'Next');

          //let resp = error.responseJSON;
          let resp = JSON.parse(error.responseText);

          if(typeof error.status !== 'undefined' && error.status === 400){
            $.each(resp.data,function(input,msg){ 
              $("#"+input).after(`<div class="invalid-feedback">`+msg+`</div>`);
              $("#"+input).addClass("is-invalid state-invalid");
            });

            if(resp.success == false){
              Notiflix.Notify.failure(resp.error);
            }

          }
          else if(typeof resp.success !== 'undefined' && error.status === 400){
            error_popup(resp.error);
          }
          else{
            error_popup();
          }
        },
        complete    : function(){
          Notiflix.Loading.remove();
          btn_enable("#submit_btn",'Next');
        }
    });
}

function hide_loader(){
  Notiflix.Loading.remove();
}

function storeInquiry(){
    
    var formData = new FormData(document.getElementById("contactus_form"));

    let url = base_url+"/contacts";

    ajax_resp = $.ajax({
        'url'       : url,
        'data'      : formData,
        'type'      : 'post',
        'dataType'  : 'json',
        async: true,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend  : function()
        {   
          $('.invalid-feedback').remove();
          $('form input').removeClass('is-invalid state-invalid');
          $('form textarea').removeClass('is-invalid state-invalid');
          Notiflix.Loading.hourglass('Please wait..');
          btn_disable("#add_tender");
        },
        success     : function(resp)
        { 
          if(resp.success === true){
              Notiflix.Notify.success(resp.msg);
              $('#contactus_form')[0].reset();
          }
        },
        error : function(error)
        {  
          //let resp = error.responseJSON;
          let resp = JSON.parse(error.responseText);
          if(typeof error.status !== 'undefined' && error.status === 422){
            $.each(resp.errors,function(input,msg){ 
              $("#"+input).after(`<div class="invalid-feedback">`+msg[0]+`</div>`);
              $("#"+input).addClass("is-invalid state-invalid");
            });
          }
          else if(typeof resp.success !== 'undefined' && error.status === 400){
            error_popup(resp.error);
          }
          else{
            error_popup();
          }
        },
        complete    : function(){
          Notiflix.Loading.remove();
          btn_enable("#add_tender",'submit');
        }
    });
}
  
function load_ajax_table_data(url,render_section_class)
{
  if(url == 'javascript:void(0);')
  {
    return false;
  }

  show_loader();

  $.ajax({
      url : url 
    }).done(function (data)
    {
      $('.'+render_section_class).html(data); 
      hide_loader();
      window.history.pushState(false,false,url); 
    }).fail(function()
    {
      hide_loader();
      Notiflix.Notify.failure('Data could not be loaded');
    });

    
}

$(document).ready(function(){
    //Employee listing 
    if($('.web-employee .pagination li a').length > 0)
    {
      $('body').on('click','.web-employee .pagination li a',function(e){
          e.preventDefault();
          load_ajax_table_data($(this).attr('href'),'ajax-table-data');
      });
    }

    //Telephone Directory Listing 
    if($('.web-telephone-directory .pagination li a').length > 0)
    {
      $('body').on('click','.web-telephone-directory .pagination li a',function(e){
          e.preventDefault();
          load_ajax_table_data($(this).attr('href'),'ajax-table-data');
      });
    }

     //Tender Listing 
     if($('.web-current-tenders .pagination li a').length > 0)
     {
       $('body').on('click','.web-current-tenders .pagination li a',function(e){
           e.preventDefault();
           load_ajax_table_data($(this).attr('href'),'ajax-table-data');
       });
     }

     // Quotation Listing
     if($('.web-quotations .pagination li a').length > 0)
     {
       $('body').on('click','.web-quotations .pagination li a',function(e){
           e.preventDefault();
           load_ajax_table_data($(this).attr('href'),'ajax-table-data');
       });
     }

     // PACs Listing
     if($('.web-pac .pagination li a').length > 0)
     {
       $('body').on('click','.web-pac .pagination li a',function(e){
           e.preventDefault();
           load_ajax_table_data($(this).attr('href'),'ajax-table-data');
       });
     }

     // News Listing
     if($('.web-news .pagination li a').length > 0)
     {
       $('body').on('click','.web-news .pagination li a',function(e){
           e.preventDefault();
           load_ajax_table_data($(this).attr('href'),'ajax-table-data');
       });
     }

     // Office order listing
     if($('.web-office-order .pagination li a').length > 0)
     {
       $('body').on('click','.web-office-order .pagination li a',function(e){
           e.preventDefault();
           load_ajax_table_data($(this).attr('href'),'ajax-table-data');
       });
     }

     // Department Faculty listing
     if($('.department-faculty .pagination li a').length > 0)
     {
       $('body').on('click','.department-faculty .pagination li a',function(e){
           e.preventDefault();
           load_ajax_table_data($(this).attr('href'),'ajax-table-data-faculty');
       });
     }

     // Staff listing
     if($('.department-staff .pagination li a').length > 0)
     {
       $('body').on('click','.department-staff .pagination li a',function(e){
           e.preventDefault();
           load_ajax_table_data($(this).attr('href'),'ajax-table-data-staff');
       });
     }
     
});