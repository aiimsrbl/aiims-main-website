function updateDepartmentDetails(detailType,departmentId){

  var formData = new FormData(document.getElementById(detailType));

  formData.append('form',detailType);
  
  let url = base_url+"/admin/department/update-data/"+departmentId;
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
        Notiflix.Loading.hourglass('Please wait..');
      },
      success     : function(resp)
      { 
        if(resp.success === true){
            Notiflix.Notify.success(resp.msg);
        }
      },
      error : function(error)
      {  
        Notiflix.Loading.remove();

        let resp = JSON.parse(error.responseText);

        if(typeof resp.success !== 'undefined' && error.status === 400)
        {
          error_popup(resp.error);
        }
        else
        {
          error_popup();
        }
      },
      complete    : function(){
        Notiflix.Loading.remove();
      }
  });
}

function adminLogin()
{   
    let data = $('#adminLogin').serialize();
    Notiflix.Loading.hourglass('Please wait..');
    $.ajax({
        method: "POST",
        url: base_url+"/admin/login",
        dataType: "json",
        data:data,
        beforeSend  : function()
        {   
          $('.invalid-feedback').remove();
          $('form input').removeClass('is-invalid state-invalid');
          Notiflix.Loading.hourglass('Please wait..');
          btn_disable("#submit_btn");
        },
        error:function(error){
            let resp = JSON.parse(error.responseText);
            btn_enable("#submit_btn",'Login');

            if(typeof resp.success!='undefined' && resp.success == false){
                $.each(resp.data,function(input,msg){ 
                  $("#"+input).after(`<div class="invalid-feedback">`+msg+`</div>`);
                  $("#"+input).addClass("is-invalid state-invalid");
                });
                Notiflix.Notify.failure(resp.error);
            }
            else{
              error_popup();
            }
        },
        success:function(resp){
            if(resp.success === true){
                Notiflix.Notify.success(resp.msg);
                window.location.href=base_url+"/admin/dashboard";
            }
        },
        complete:function(resp){
            btn_enable("#submit_btn",'Login');
            Notiflix.Loading.remove();
        }
    });
}


function departmentActivityAjax(url){
  var formData = new FormData(document.getElementById("activity_form"));
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
          $('form input,form textarea').removeClass('is-invalid state-invalid');
          Notiflix.Loading.hourglass('Please wait..');
          btn_disable("#submit_btn");
        },
        success     : function(resp)
        { 
          if(resp.success === true){
             let id = resp.data.id;
              Notiflix.Notify.success(resp.msg);
              window.location.href=base_url+"/admin/department/activity/view/"+id;
          }
        },
        error : function(error)
        {  
          Notiflix.Loading.remove();
          btn_enable("#submit_btn",'submit');
          let resp = JSON.parse(error.responseText);
          if(typeof error.status !== 'undefined' && error.status === 422){
            $.each(resp.errors,function(input,msg){ 
              if(input == 'department'){
                $("select[name='"+input+"']").next().after(`<div class="invalid-feedback">`+msg[0]+`</div>`);
                $("select[name='"+input+"']").next().addClass("is-invalid");
              }
              else
              {
                $("input[name='"+input+"'],select[name='"+input+"'],textarea[name='"+input+"']").after(`<div class="invalid-feedback">`+msg[0]+`</div>`);
                $("input[name='"+input+"'],select[name='"+input+"'],textarea[name='"+input+"']").addClass("is-invalid");
              }
              
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
          btn_enable("#submit_btn",'submit');
        }
    });
}

function pageAjax(url){
  var formData = new FormData(document.getElementById("page_form"));
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
          $('form input,form textarea').removeClass('is-invalid state-invalid');
          Notiflix.Loading.hourglass('Please wait..');
          btn_disable("#submit_btn");
        },
        success     : function(resp)
        { 
          if(resp.success === true){
              Notiflix.Notify.success(resp.msg);
              window.location.href=base_url+"/admin/page/listing";
          }
        },
        error : function(error)
        {  
          Notiflix.Loading.remove();
          btn_enable("#submit_btn",'submit');
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
          btn_enable("#submit_btn",'submit');
        }
    });
}

function newsAjax(url){
  var formData = new FormData(document.getElementById("news_form"));
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
          $('form input,form textarea').removeClass('is-invalid state-invalid');
          Notiflix.Loading.hourglass('Please wait..');
          btn_disable("#submit_btn");
        },
        success     : function(resp)
        { 
          if(resp.success === true){
              Notiflix.Notify.success(resp.msg);
              window.location.href=base_url+"/admin/news/listing";
          }
        },
        error : function(error)
        {  
          Notiflix.Loading.remove();
          btn_enable("#submit_btn",'submit');
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
          btn_enable("#submit_btn",'submit');
        }
    });
}

function nirfAjax(url){
  var formData = new FormData(document.getElementById("nirf_form"));
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
          $('form input,form textarea').removeClass('is-invalid state-invalid');
          Notiflix.Loading.hourglass('Please wait..');
          btn_disable("#submit_btn");
        },
        success     : function(resp)
        { 
          if(resp.success === true){
              Notiflix.Notify.success(resp.msg);
              window.location.href=base_url+"/admin/nirf/listing";
          }
        },
        error : function(error)
        {  
          Notiflix.Loading.remove();
          btn_enable("#submit_btn",'submit');
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
          btn_enable("#submit_btn",'submit');
        }
    });
}



function sliderAjax(url){
  var formData = new FormData(document.getElementById("slider_form"));
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
          $('form input,form textarea').removeClass('is-invalid state-invalid');
          Notiflix.Loading.hourglass('Please wait..');
          btn_disable("#submit_btn");
        },
        success     : function(resp)
        { 
          if(resp.success === true){
              Notiflix.Notify.success(resp.msg);
              window.location.href=base_url+"/admin/slider/listing";
          }
        },
        error : function(error)
        {  
          Notiflix.Loading.remove();
          btn_enable("#submit_btn",'submit');
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
          btn_enable("#submit_btn",'submit');
        }
    });
}


function resultAjax(url){
  var formData = new FormData(document.getElementById("result_form"));
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
          Notiflix.Loading.hourglass('Please wait..');
          btn_disable("#add_result");
        },
        success     : function(resp)
        { 
          if(resp.success === true){
              Notiflix.Notify.success(resp.msg);
              window.location.href=base_url+"/admin/result/listing";
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
          btn_enable("#add_result",'submit');
        }
    });
}

function tenderAjax(url){
  var formData = new FormData(document.getElementById("tendor_form"));
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
          Notiflix.Loading.hourglass('Please wait..');
          btn_disable("#add_tender");
        },
        success     : function(resp)
        { 
          if(resp.success === true){
              Notiflix.Notify.success(resp.msg);
              window.location.href=base_url+"/admin/tender/listing";
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

function corrigendumAjax(url){
  var formData = new FormData(document.getElementById("corrigendum_form"));
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
          Notiflix.Loading.hourglass('Please wait..');
          btn_disable("#add_tender");
        },
        success     : function(resp)
        { 
          if(resp.success === true){
              Notiflix.Notify.success(resp.msg);
              window.location.href=base_url+"/admin/tender/listing?tab=c";
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
          Notiflix.Loading.remove();
        },
        complete    : function(){
          Notiflix.Loading.remove();
          btn_enable("#add_tender",'submit');
        }
    });
}

function quotationAjax(url){
  var formData = new FormData(document.getElementById("quotation_form"));
  ajax_resp = $.ajax({
      'url'       : url,
      'data'      : formData,
      'type'      : 'post',
      dataType  : 'json',
      async: true,
      cache: false,
      contentType: false,
      processData: false,
      beforeSend  : function()
      {   
        $('.invalid-feedback').remove();
        $('form input').removeClass('is-invalid state-invalid');
        Notiflix.Loading.hourglass('Please wait..');
        btn_disable("#submit_btn");
      },
      success     : function(resp)
      { 
        if(resp.success === true){
            Notiflix.Notify.success(resp.msg);
            window.location.href=base_url+"/admin/quotation/listing";
        }
      },
      error : function(error)
      {  
        Notiflix.Loading.remove();
        btn_enable("#submit_btn",'submit');
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
        btn_enable("#submit_btn",'submit');
      }
  });
}

function officeOrderAjax(url){
  var formData = new FormData(document.getElementById("news_form"));
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
          $('form input,form textarea').removeClass('is-invalid state-invalid');
          Notiflix.Loading.hourglass('Please wait..');
          btn_disable("#submit_btn");
        },
        success     : function(resp)
        { 
          if(resp.success === true){
              Notiflix.Notify.success(resp.msg);
              window.location.href=base_url+"/admin/office-orders/listing";
          }
        },
        error : function(error)
        {  
          Notiflix.Loading.remove();
          btn_enable("#submit_btn",'submit');
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
          btn_enable("#submit_btn",'submit');
        }
    });
}

function PACAjax(url){
  var formData = new FormData(document.getElementById("quotation_form"));
  ajax_resp = $.ajax({
      'url'       : url,
      'data'      : formData,
      'type'      : 'post',
      dataType  : 'json',
      async: true,
      cache: false,
      contentType: false,
      processData: false,
      beforeSend  : function()
      {   
        $('.invalid-feedback').remove();
        $('form input').removeClass('is-invalid state-invalid');
        Notiflix.Loading.hourglass('Please wait..');
        btn_disable("#submit_btn");
      },
      success     : function(resp)
      { 
        if(resp.success === true){
            Notiflix.Notify.success(resp.msg);
            window.location.href=base_url+"/admin/pac/listing";
        }
      },
      error : function(error)
      {  
        Notiflix.Loading.remove();
        btn_enable("#submit_btn",'submit');
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
        btn_enable("#submit_btn",'submit');
      }
  });
}

function departmentFacultyAjax(url){
  var formData = new FormData(document.getElementById("faculty_form"));
  ajax_resp = $.ajax({
      'url'       : url,
      'data'      : formData,
      'type'      : 'post',
      dataType  : 'json',
      async: true,
      cache: false,
      contentType: false,
      processData: false,
      beforeSend  : function()
      {   
        $('.invalid-feedback').remove();
        $('form input').removeClass('is-invalid state-invalid');
        Notiflix.Loading.hourglass('Please wait..');
        btn_disable("#submit_btn");
      },
      success     : function(resp)
      { 
        if(resp.success === true){
            Notiflix.Notify.success(resp.msg);
            window.location.href=base_url+"/admin/department/faculty/listing";
        }
      },
      error : function(error)
      {  
        Notiflix.Loading.remove();
        btn_enable("#submit_btn",'submit');
        let resp = JSON.parse(error.responseText);
        if(typeof error.status !== 'undefined' && error.status === 422){
          $.each(resp.errors,function(input,msg){ 
            $("#"+input).after(`<div class="invalid-feedback">`+msg[0]+`</div>`);
            $("#"+input).addClass("is-invalid state-invalid");
          });
          Notiflix.Notify.failure('Please fill correct data');
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
        btn_enable("#submit_btn",'submit');
      }
  });
} 

function spotLightAjax(url){
  var formData = new FormData(document.getElementById("spotlight_form"));
  ajax_resp = $.ajax({
      'url'       : url,
      'data'      : formData,
      'type'      : 'post',
      dataType  : 'json',
      async: true,
      cache: false,
      contentType: false,
      processData: false,
      beforeSend  : function()
      {   
        $('.invalid-feedback').remove();
        $('form input').removeClass('is-invalid state-invalid');
        Notiflix.Loading.hourglass('Please wait..');
        btn_disable("#submit_btn");
      },
      success     : function(resp)
      { 
        if(resp.success === true){
            Notiflix.Notify.success(resp.msg);
            window.location.href=base_url+"/admin/spotlight/listing";
        }
      },
      error : function(error)
      {  
        Notiflix.Loading.remove();
        btn_enable("#submit_btn",'submit');
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
        btn_enable("#submit_btn",'submit');
      }
  });
}

function annualReportAjax(url){
  var formData = new FormData(document.getElementById("annual_report_form"));
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
          $('form input,form textarea').removeClass('is-invalid state-invalid');
          Notiflix.Loading.hourglass('Please wait..');
          btn_disable("#submit_btn");
        },
        success     : function(resp)
        { 
          if(resp.success === true){
              Notiflix.Notify.success(resp.msg);
              window.location.href=base_url+"/admin/annual-report/listing";
          }
        },
        error : function(error)
        {  
          Notiflix.Loading.remove();
          btn_enable("#submit_btn",'submit');
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
          btn_enable("#submit_btn",'submit');
        }
    });
}

function eventAjax(url){
  var formData = new FormData(document.getElementById("event_form"));
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
          $('form input,form textarea').removeClass('is-invalid state-invalid');
          Notiflix.Loading.hourglass('Please wait..');
          btn_disable("#submit_btn");
        },
        success     : function(resp)
        { 
          if(resp.success === true){
              Notiflix.Notify.success(resp.msg);
              window.location.href=base_url+"/admin/event/listing";
          }
        },
        error : function(error)
        {  
          Notiflix.Loading.remove();
          btn_enable("#submit_btn",'submit');
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
          btn_enable("#submit_btn",'submit');
        }
    });
}
function workshopAjax(url) {
    var formData = new FormData(document.getElementById("workshop_form"));
    ajax_resp = $.ajax({
        url: url,
        data: formData,
        type: "post",
        dataType: "json",
        async: true,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function () {
            $(".invalid-feedback").remove();
            $("form input,form textarea").removeClass(
                "is-invalid state-invalid"
            );
            Notiflix.Loading.hourglass("Please wait..");
            btn_disable("#submit_btn");
        },
        success: function (resp) {
            if (resp.success === true) {
                Notiflix.Notify.success(resp.msg);
                window.location.href =
                    base_url + "/admin/event/workshop/listing";
            }
        },
        error: function (error) {
            Notiflix.Loading.remove();
            btn_enable("#submit_btn", "submit");
            let resp = JSON.parse(error.responseText);
            if (typeof error.status !== "undefined" && error.status === 422) {
                $.each(resp.errors, function (input, msg) {
                    $("#" + input).after(
                        `<div class="invalid-feedback">` + msg[0] + `</div>`
                    );
                    $("#" + input).addClass("is-invalid state-invalid");
                });
                Notiflix.Notify.failure(
                    "Please make sure all fields are filled in correctly"
                );
            } else if (
                typeof resp.success !== "undefined" &&
                error.status === 400
            ) {
                error_popup(resp.error);
            } else {
                error_popup();
            }
        },
        complete: function () {
            Notiflix.Loading.remove();
            btn_enable("#submit_btn", "submit");
        },
    });
}

function eventGalleryAjax(url){
  var formData = new FormData(document.getElementById("event_form"));
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
          $('form input,form textarea').removeClass('is-invalid state-invalid');
          Notiflix.Loading.hourglass('Please wait..');
          btn_disable("#submit_btn");
        },
        success     : function(resp)
        { 
          if(resp.success === true){
              Notiflix.Notify.success(resp.msg);
              window.location.href=base_url+"/admin/event/gallery/view/"+resp.data.event_id;
          }
        },
        error : function(error)
        {  
          Notiflix.Loading.remove();
          btn_enable("#submit_btn",'submit');
          let resp = JSON.parse(error.responseText);
          if(typeof error.status !== 'undefined' && error.status === 422){
            $.each(resp.errors,function(input,msg){ 
              if(input == 'event'){
                $("select[name='"+input+"']").next().after(`<div class="invalid-feedback">`+msg[0]+`</div>`);
                $("select[name='"+input+"']").next().addClass("is-invalid");
              }
              else
              {
                $("input[name='"+input+"'],select[name='"+input+"'],textarea[name='"+input+"']").after(`<div class="invalid-feedback">`+msg[0]+`</div>`);
                $("input[name='"+input+"'],select[name='"+input+"'],textarea[name='"+input+"']").addClass("is-invalid");
              }
            
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
          btn_enable("#submit_btn",'submit');
        }
    });
}

function recruitmentAjax(url){
  var formData = new FormData(document.getElementById("recruitment_form"));
  ajax_resp = $.ajax({
      'url'       : url,
      'data'      : formData,
      'type'      : 'post',
      dataType  : 'json',
      async: true,
      cache: false,
      contentType: false,
      processData: false,
      beforeSend  : function()
      {   
        $('.invalid-feedback').remove();
        $('form input').removeClass('is-invalid state-invalid');
        Notiflix.Loading.hourglass('Please wait..');
        btn_disable("#submit_btn");
      },
      success     : function(resp)
      { 
        if(resp.success === true){
            Notiflix.Notify.success(resp.msg);
            window.location.href=base_url+"/admin/recruitment/listing";
        }
      },
      error : function(error)
      {  
        Notiflix.Loading.remove();
        btn_enable("#submit_btn",'submit');
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
        btn_enable("#submit_btn",'submit');
      }
  });
}

function recruitmentOtherInfoAjax(url){
  var formData = new FormData(document.getElementById("recruitment_form"));
  ajax_resp = $.ajax({
      'url'       : url,
      'data'      : formData,
      'type'      : 'post',
      dataType  : 'json',
      async: true,
      cache: false,
      contentType: false,
      processData: false,
      beforeSend  : function()
      {   
        $('.invalid-feedback').remove();
        $('form input').removeClass('is-invalid state-invalid');
        Notiflix.Loading.hourglass('Please wait..');
        btn_disable("#submit_btn");
      },
      success     : function(resp)
      { 
        if(resp.success === true){
            Notiflix.Notify.success(resp.msg);
            window.location.href=base_url+"/admin/recruitment/other-info/listing";
        }
      },
      error : function(error)
      {  
        Notiflix.Loading.remove();
        btn_enable("#submit_btn",'submit');
        let resp = JSON.parse(error.responseText);
        if(typeof error.status !== 'undefined' && error.status === 422){
          $.each(resp.errors,function(input,msg){ 
            if(input == 'recruitment'){
              $("select[name='"+input+"']").next().after(`<div class="invalid-feedback">`+msg[0]+`</div>`);
              $("select[name='"+input+"']").next().addClass("is-invalid");
            }
            else{
              $("#"+input).after(`<div class="invalid-feedback">`+msg[0]+`</div>`);
              $("#"+input).addClass("is-invalid state-invalid");
            }
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
        btn_enable("#submit_btn",'submit');
      }
  });
}

function editRecruitmentOtherInfo(editId){
  let url = base_url+"/admin/recruitment/other-info/edit/"+editId;
  recruitmentOtherInfoAjax(url);
}

function addRecruitmentOtherInfo(){
  let url = base_url+"/admin/recruitment/other-info/add";
  recruitmentOtherInfoAjax(url);
}

function addRecruitment(){
  let url = base_url+"/admin/recruitment/add";
  recruitmentAjax(url);
}

function editRecruitment(editId){
  let url = base_url+"/admin/recruitment/edit/"+editId;
  recruitmentAjax(url);
}

function editEventGallery(editId){
  let url = base_url+"/admin/event/gallery/edit/"+editId;
  eventGalleryAjax(url);
}

function addEventGallery(){
  let url = base_url+"/admin/event/gallery/add";
  eventGalleryAjax(url);
}

function addEvent(){
  let url = base_url+"/admin/event/add";
  eventAjax(url);
}

function editEvent(editId){
  let url = base_url+"/admin/event/edit/"+editId;
  eventAjax(url);
}
function addWorkshop() {
    let url = base_url + "/admin/event/workshop/add";
    workshopAjax(url);
}

function editWorkshop(editId) {
    let url = base_url + "/admin/event/workshop/edit/" + editId;
    workshopAjax(url);
}
function addSpotLight(){
  let url = base_url+"/admin/spotlight/add";
  spotLightAjax(url);
}

function editSpotLight(editId){
  let url = base_url+"/admin/spotlight/edit/"+editId;
  spotLightAjax(url);
}

function addPAC(){
  let url = base_url+"/admin/pac/add";
  PACAjax(url);
}

function updatePAC(editId){
  let url = base_url+"/admin/pac/edit/"+editId;
  PACAjax(url);
}
function addPage()
{
  let url = base_url+"/admin/page/add";
  pageAjax(url);
}
function editPage(pageId){
  let url = base_url+"/admin/page/edit/"+pageId;
  pageAjax(url);
}
function addNews()
{
  let url = base_url+"/admin/news/add";
  newsAjax(url);
}

function editNews(newId){
  let url = base_url+"/admin/news/edit/"+newId;
  newsAjax(url);
}
function addNirf()
{
  let url = base_url+"/admin/nirf/add";
  nirfAjax(url);
}

function editNirf(nirfId){
  let url = base_url+"/admin/nirf/edit/"+nirfId;
  nirfAjax(url);
}
function addSlider()
{
  let url = base_url+"/admin/slider/add";
  sliderAjax(url);
}

function editSlider(sliderId){
  let url = base_url+"/admin/slider/edit/"+sliderId;
  sliderAjax(url);
}
function addOffceOrder(){
  let url = base_url+"/admin/office-orders/add";
  officeOrderAjax(url);
}

function editOfficeOrder(editId){
  let url = base_url+"/admin/office-orders/edit/"+editId;
  officeOrderAjax(url);
}

function addNewTender()
{
  let url = base_url+"/admin/tender/add";
  tenderAjax(url);
}

function addNewResult()
{
  let url = base_url+"/admin/result/add";
  resultAjax(url);
}
function updateTender(tenderId)
{
  let url = base_url+"/admin/tender/edit/"+tenderId;
  tenderAjax(url);
}
function updateResult(resultId)
{
  let url = base_url+"/admin/result/edit/"+resultId;
  resultAjax(url);
}

function addNewCorrigendum(tenderId){
  let url = base_url+"/admin/corrigendum/add/"+tenderId;
  corrigendumAjax(url);
}

function editCorrigendum(corrigendumId){
  let url = base_url+"/admin/corrigendum/edit/"+corrigendumId;
  corrigendumAjax(url);
}

function updateQuotation(quotationId){
  let url = base_url+"/admin/quotation/edit/"+quotationId;
  quotationAjax(url);
}

function addQuotation(){
  let url = base_url+"/admin/quotation/add";
  quotationAjax(url);
}


function addDepartmentFaculty(){
  let url = base_url+"/admin/department/faculty/add";
  departmentFacultyAjax(url);
}

function updateDepartmentFaculty(editId){
  let url = base_url+"/admin/department/faculty/edit/"+editId;
  departmentFacultyAjax(url);
}

function departmentActivityImageChagne(el){
  var existingVal = $('#edit_elid').val().trim();

  var id = el.data('elid');

  if(existingVal.length > 0){
    existingVal = existingVal+","+id;
  }else{
    existingVal = id;
  }

  $('#edit_elid').val(existingVal);

  console.log(existingVal);
}

function addDepartmentActivity(){
  let url = base_url+"/admin/department/activity/add";
  departmentActivityAjax(url);
}

function editDepartmentActivity(editId){
  let url = base_url+"/admin/department/activity/edit/"+editId;
  initializeActivityElement();
  departmentActivityAjax(url);
}

function addAnnualReport(){
  let url = base_url+"/admin/annual-report/add";
  annualReportAjax(url);
}

function editAnnualReport(editId){
  let url = base_url+"/admin/annual-report/edit/"+editId;
  annualReportAjax(url);
}

function error_popup(msg = SERVER_ERR_MSG , reload = false,redirect_url = false,new_tab = false)
{
  Notiflix.Report.failure('Failure',msg,false,function(){
    if(reload == true)
    {
      location.reload();
    }

    if(redirect_url && new_tab == false)
    {
      window.location.href = redirect_url;
    }

    if(redirect_url && new_tab == true)
    {
      window.open(redirect_url, '_blank');
    }

  });
}

function success_popup(msg = null,reload = false,redirect_url = false,new_tab = false)
{
  Notiflix.Report.success('Success',msg,false,function(){
    if(reload == true)
    {
      location.reload();
    }

    if(redirect_url && new_tab == false)
    {
      window.location.href = redirect_url;
    }

    if(redirect_url && new_tab == true)
    {
      window.open(redirect_url, '_blank');
    }
  });
}

function confirm_popup(url = null,confirm_msg = 'Are you sure want to delete ?')
{
  Notiflix.Confirm.show('Delete', confirm_msg, false, false,
    function()
    {
    Notiflix.Loading.hourglass('Please wait..');
      window.location.href=url;
    },
  );
}

function get_token()
{
  return $('input[name=_token]').val();
}

function btn_disable(btn_id_class)
{   
    $(btn_id_class).html('<i class="fa fa-circle-o-notch fa-spin"></i> Please wait..');
    $(btn_id_class).attr('disabled','disabled');
}

function btn_enable(btn_id_class,txt)
{   
    $(btn_id_class).removeAttr('disabled','disabled');
    $(btn_id_class).text(txt);
}

function redirect_url(obj, url, show_loder_only = false)
{
    if(show_loder_only == true)
    {   
        current_html = obj.html();
        obj.html('<i class="fa fa-circle-o-notch fa-spin"></i>&nbsp'+current_html);
    }
    
    if(show_loder_only == false)
    {
        obj.html('<i class="fa fa-circle-o-notch fa-spin"></i>&nbspPlease wait..');
    }

    obj.attr('disabled', 'disabled');
    window.location.href = url;
    
}

function initializeActivityElement(){
  $('.activity-file').each(function(key,val){
    $(this).attr('name','image_'+key);
  });

  $('.activity-input').each(function(key,val){
    $(this).attr('name','title_'+key);
    $(this).next('input').val($(this).val());
  });

  $('.activity-label').each(function(key,val){
    $(this).html('Activity '+parseInt(key+1));
  });
}

function initializeEventElement(){
  $('.event-image').each(function(key,val){
    $(this).attr('name','image_'+key);
  });

  $('.event-input').each(function(key,val){
    $(this).attr('name','title_'+key);
    $(this).next('input').val($(this).val());
  });

  $('.event-label').each(function(key,val){
    $(this).html('Image '+parseInt(key+1));
  });
}

function activityAddMore(el)
{
  var html = `<div class="mb-3 activity-sec">
                    <div class="row">
                      <div class="col-md-3">
                        <label class="form-label activity-label"></label>
											  <input type="hidden" name="temp[]">
                      </div>
                      <div class="col-md-9">
                        <div class="row">
                          <div class="col-md-3 col-lg-4 col-sm-12">
                            <input type="file" class="activity-file"/>
                          </div>	
                          <div class="col-md-4 col-sm-12">
                            <input type="text" placeholder="Enter Title"  class="form-control activity-input">
                          </div>
                          <div class="col-md-2 col-sm-12 add-more-sec">
                            <button type="button" onClick="activityAddMore($(this))" class="btn btn-success btn-sm">Add More +</button>
                          </div>
                          <div class="col-md-2 col-sm-12 remove-sec">
                            <button type="button" onClick="activityRemove($(this))" class="btn btn-danger btn-sm">Remove X</button>
                          </div>			
                        </div>
                      </div>
                    </div>
                  </div>`;
    $('.activity-wrapper').append(html);
    el.remove();
    
    initializeActivityElement();
}

function activityRemove(el){
  el.parents('.activity-sec').remove();

  var add_more_btn = `
                      
                        <button type="button" onClick="activityAddMore($(this))" class="btn btn-success btn-sm">Add More +</button>
                      
                    `;
  $('.activity-wrapper').find('.activity-sec:last').find('.add-more-sec').html(add_more_btn);
  
  initializeActivityElement();

}

function eventAddMore(el)
{
  var html = `<div class="mb-3 event-sec">
                    <div class="row">
                      <div class="col-md-3">
                        <label class="form-label event-label">Event 2</label>
											  <input type="hidden" name="temp[]">
                      </div>
                      <div class="col-md-9">
                        <div class="row">
                          <div class="col-md-3 col-lg-4 col-sm-12">
                            <input type="file" class="event-image"/>
                          </div>	
                          <div class="col-md-4 col-sm-12">
                            <input type="text" placeholder="Enter Title"  class="form-control event-input">
                          </div>
                          <div class="col-md-2 col-sm-12 add-more-sec">
                            <button type="button" onClick="eventAddMore($(this))" class="btn btn-success btn-sm">Add More +</button>
                          </div>
                          <div class="col-md-2 col-sm-12 remove-sec">
                            <button type="button" onClick="eventRemove($(this))" class="btn btn-danger btn-sm">Remove X</button>
                          </div>			
                        </div>
                      </div>
                    </div>
                  </div>`;
    $('.event-wrapper').append(html);
    el.remove();
    initializeEventElement();
}

function deleteEventGalleryImage(imgId){
  
  let url = base_url+"/admin/event/gallery/delete/"+imgId;
  
  $.get(url,{},function(resp){
    console.log(resp);
  });

}


function eventRemove(el){

  
  if(typeof el.data('gallery-id') != 'undefined'){
    deleteEventGalleryImage(el.data('gallery-id'));
  }

  el.parents('.event-sec').remove();

  var add_more_btn = `
                      
                        <button type="button" onClick="eventAddMore($(this))" class="btn btn-success btn-sm">Add More +</button>
                      
                    `;
  $('.event-wrapper').find('.event-sec:last').find('.add-more-sec').html(add_more_btn);
  initializeEventElement();
}


$(document).ready(function(){
  $('form').submit(function(){
    btn_disable("#submit_btn");
    Notiflix.Loading.hourglass('Please wait..');
  });

  if($('#link_type').length > 0)
  {
    $('#link_type').change(function(){
      let link_type =  $(this).val();
      
      $('.spot-file-sec,.spot-url-sec').addClass('d-none');

      if(link_type === 'file'){
          $('.spot-file-sec').removeClass('d-none');
      }
      
      if(link_type === 'url'){
        $('.spot-url-sec').removeClass('d-none');
      }
    });
  }
});


