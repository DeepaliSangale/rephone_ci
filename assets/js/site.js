  $(document).ready(function (e) {



        $('.media-body').click(function (e) {

            var pin = $(this).find('span').text();
            $('.default_pincode').text(pin);
            $.ajax({



                url: base_url + 'web/change_default_pincode/' + pin,



            }).done(function (response) {



            })



        })



    })

  $(document).ready(function (e) {



      $('.media-body-mobile').change(function () {

     

        var pin = $('option:selected', this).text(); //to get selected text

        $.ajax({



                url: base_url + 'web/change_default_pincode/' + pin,



            }).done(function (response) {



            })

     });



    })


    $(document).ready(function(){

    window.scroll({
      top: 0, 
      behavior: 'smooth'});

    });

     // brand change

     $(document).ready(function(){

     $('#sel_brand').change(function(){

        var brand = $(this).val();

       // AJAX request

        $.ajax({

          url: base_url + 'web/get_brand_model/',

          method: 'post',

          data: {brand: brand},

          dataType: 'json',

          success: function(response){

  

            $('#sel_model').find('option').not(':first').remove();

            // Add options

            $.each(response,function(index,data){

               $('#sel_model').append('<option value="'+data['m_id']+'">'+data['m_name']+'</option>');

            });

          }

       });

     });



    });



   //search mobile model js  

    $(document).ready(function() {

      $( ".search_model" ).autocomplete({

          source: function(request, response) {

              $.ajax({

              url: base_url + "web/search_model",

              data: {

                      model : request.term

               },

              dataType: "json",

              success: function(data){
                if(!data.length){
                  var result = [
                      {
                          label: 'No matches found', 
                          value: response.term
                      }
                  ];
                  response(result);
              }
              else
                 var resp = $.map(data,function(obj){

                      return obj.m_name;

                      }); 

                 var resp2 = $.map(data,function(obj2){

                  return obj2.m_url;

             }); 

              response(resp);

              var urlr = resp2;

              }

          });

      },

      select: function(request, urlr){

          var resp_url = urlr.item.value;

          resp_url = resp_url.replace(/\s+/g, '-').toLowerCase();

          window.location = base_url + 'sell-mobile-phone-used/'+resp_url;

      },

      minLength: 1

   });

  });

  

  function showLoader(){

    $('.loader-btn').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Please Wait'); //change button 

    $('.loader-btn').attr('disabled',true); //set button disable 

       

  }



  function hideLoader(btn_name){

    $('.loader-btn').html(btn_name); //change button 

    $('.loader-btn').attr('disabled',false); //set button enabled 

       

  }

 

  

  function sweet_alert(type,message){

    Swal.fire({

      icon: type,

      text: message,

    })

  }

   

  

  $(function () {

    $.validator.setDefaults({

      submitHandler: function () {

      var form = $('#loginForm');

      var formData = new FormData(form[0]);

      if(($("input[name='terms_chk']:checked").length)<=0) {

          $('.terms_chk_error').html('You have to accept the terms and policy');

           return false;

       }

        showLoader();

        $.ajax({

              url: base_url + 'web/check_user_login',  

              type: 'POST',

              data: formData,

              cache: false,

              contentType: false,

              processData: false,

              dataType: 'json',

              success: function(res) {

                   if(res.status=="OK")

                   {  

                       hideLoader("VERIFY OTP");

                      $(".offcanvasRight-otp").offcanvas('show');

                      $(".offcanvasRight-login").offcanvas('hide');

                      $("#otpmob").html(res.otpmob); 

                      sweet_alert(res.type, res.message);

                   }  

                   else if(res.status=="ERR")

                   {

                      hideLoader("CONTINUE");

                      sweet_alert(res.type, res.message);

                   }

                   else if(res.status=="New")

                   {

                      sweet_alert(res.type, res.message);

                      hideLoader("CONTINUE");

                      $("#u_phone").val(res.u_phone);

                      $(".offcanvasRight-login").offcanvas('hide');

                      $(".offcanvasRight-reg").offcanvas('show');

                   }

              }

             

          });

          }//end submit handler

          });

          $('#loginForm').validate({

              rules: {

                user_phone: {

                  required: true,  

                }

                

              },

              messages: {

                user_phone: {

                  required: "Please enter 10 digit mobile number",

                }

              

              },

              errorElement: 'span',

              errorPlacement: function (error, element) {

                error.addClass('invalid-feedback');

                element.closest('.form-group').append(error);

              },

              highlight: function (element, errorClass, validClass) {

                $(element).addClass('is-invalid');

              },

              unhighlight: function (element, errorClass, validClass) {

                $(element).removeClass('is-invalid');

              }

            });

      });







      //Regisrtation js

      $(function () {
        $.validator.setDefaults({
          submitHandler: function () {
          var form = $('#regForm');
          var formData = new FormData(form[0]);

          showLoader();              

            $.ajax({

                  url: base_url + 'web/send_otp_registration',  

                  type: 'POST',

                  data: formData,

                  cache: false,

                  contentType: false,

                  processData: false,

                  dataType: 'json',

                  success: function(res) {

                       if(res.status=="OK")

                       {  

                          $(".offcanvasRight-reg").offcanvas('hide');

                          $(".offcanvasRight-otp").offcanvas('show');                        

                          $("#otpmob").html(res.otpmob); 

                          $("#up").val(res.otpmob);

                          $("#ue").val(res.user_email);

                          $("#un").val(res.user_name);

                          sweet_alert(res.type, res.message);

                          hideLoader("VERIFY OTP");

                         

                       }  

                       else if(res.status=="ERR")

                       {

                          hideLoader("CONTINUE");

                          sweet_alert(res.type, res.message);

                       }

                       

                  }

                 

              });

              }//end submit handler

              });

              $('#regForm').validate({

                  rules: {

                    user_phone: {

                      required: true,  

                    }

                    

                  },

                  messages: {

                    user_phone: {

                      required: "Please enter 10 digit mobile number",

                    },

                    user_name: {

                      required: "Please enter your name",

                    },

                    user_email: {

                      required: "Please enter your email id",

                    }

                  },

                  errorElement: 'span',

                  errorPlacement: function (error, element) {

                    error.addClass('invalid-feedback');

                    element.closest('.form-group').append(error);

                  },

                  highlight: function (element, errorClass, validClass) {

                    $(element).addClass('is-invalid');

                  },

                  unhighlight: function (element, errorClass, validClass) {

                    $(element).removeClass('is-invalid');

                  }

                });

          });



// verify otp 



          $(function () {

            $.validator.setDefaults({

              submitHandler: function () {

              var form = $('#otpVerForm');

              var formData = new FormData(form[0]);

              showLoader(); 

                $.ajax({

                      url: base_url + 'web/verify_otp',  

                      type: 'POST',

                      data: formData,

                      cache: false,

                      contentType: false,

                      processData: false,

                      dataType: 'json',

                      success: function(res) {

                           if(res.status=="OK")

                           {  

                             sweet_alert(res.type, res.message);

                             $(".offcanvasRight-otp").offcanvas('hide'); 

                                hideLoader("VERIFY OTP");

                            // setTimeout(location.reload(), 5000);

                           }  

                           else if(res.status=="ERR")

                           {

                              hideLoader("VERIFY OTP");

                              sweet_alert(res.type, res.message);

                           }

                           

                      }

                     

                  });

                  }//end submit handler

                  });

                  $('#otpVerForm').validate({

                      rules: {

                        otp: {

                          required: true,  

                        }

                        

                      },

                      messages: {

                        otp: {

                          required: "Please enter otp",

                        }

                      },

                      errorElement: 'span',

                      errorPlacement: function (error, element) {

                        error.addClass('invalid-feedback');

                        element.closest('.form-group').append(error);

                      },

                      highlight: function (element, errorClass, validClass) {

                        $(element).addClass('is-invalid');

                      },

                      unhighlight: function (element, errorClass, validClass) {

                        $(element).removeClass('is-invalid');

                      }

                    });

              });



               

              function ResendOtp(){

                var form = $('#otpVerForm');

                var formData = new FormData(form[0]);

                $.ajax({

                    url: base_url + 'web/resend_otp',  

                    type: 'POST',

                    data: formData,

                    cache: false,

                    contentType: false,

                    processData: false,

                    dataType: 'json',

                    success: function(res) {

                         if(res.status=="OK")

                         {  

                          sweet_alert(res.type, res.message);

                           

                         }  

                         else if(res.status=="ERR")

                         {

                           

                          sweet_alert(res.type, res.message);

                         }

                         

                    }

                   

                });

            }





            $(function(){

              var hash = window.location.hash;

              hash && $('ul.nav a[href="' + hash + '"]').tab('show');

              

              $('.nav-item a').click(function (e) {

               $(this).tab('show');

               var scrollmem = $('body').scrollTop();

               window.location.hash = this.hash;

               $('html,body').scrollTop(scrollmem);

              });

              });



// user update profile



              $(function () {

                $.validator.setDefaults({

                  submitHandler: function () {

                  var form = $('#updateProfileForm');

                  var formData = new FormData(form[0]);

                  showLoader();

                    $.ajax({

                          url: base_url + 'dashboard/update_user_profile',  

                          type: 'POST',

                          data: formData,

                          cache: false,

                          contentType: false,

                          processData: false,

                          dataType: 'json',

                          success: function(res) {

                               if(res.status=="OK")

                               {  

                                 sweet_alert(res.type, res.message);

                                 hideLoader("UPDATE");

                               }  

                               else if(res.status=="ERR")

                               {

                                  sweet_alert(res.type, res.message);

                                  hideLoader("UPDATE");

                               }

                               

                          }

                         

                      });

                      }//end submit handler

                      });

                      $.validator.addMethod("altregno", function(value, element) {

                         return $('#user_phone').val() != $('#alt_no').val()

                      }, "Alternate and registered number should be different");

                      $('#updateProfileForm').validate({

                          rules: {

                            user_name: {

                              required: true, 

                            },

                            alt_no: {

                                 altregno: true,

                            },

                            user_phone: {

                                altregno: true,

                            }

                            

                          },

                          messages: {

                            user_name: {

                              required: "Please enter your name",

                            }

                          },

                          errorElement: 'span',

                          errorPlacement: function (error, element) {

                            error.addClass('invalid-feedback');

                            element.closest('.form-group').append(error);

                          },

                          highlight: function (element, errorClass, validClass) {

                            $(element).addClass('is-invalid');

                          },

                          unhighlight: function (element, errorClass, validClass) {

                            $(element).removeClass('is-invalid');

                          }

                        });

                  }); 

                  



  // add bank details

  function getBankbyifsc(){

    var bank_ifc_code = $("#bank_ifsc_code").val();

   

    $.ajax({

    url: base_url +'dashboard/get_bank_details',  

    type: 'POST',

    data:{bank_ifc_code:bank_ifc_code},

    dataType: 'json',

    success: function(returnData) {

         if(returnData.status=="OK")

         {

           $("#bank_name").val(returnData.bank_name);

       

         }

         else if(returnData.status=="ERR")

         {

           $("#bank_ifsc_code").val('');

           notify('error', returnData.message);

         }

    }

   

});

}



  $(function () {

    $.validator.setDefaults({

      submitHandler: function () {

      var form = $('#bankForm');

      var formData = new FormData(form[0]);

       if(($("input[name='terms_chk_b']:checked").length)<=0) {

        $('.terms_chk_b_error').html('You have to accept I hereby declare that the details are true.');

         return false;

      }

      showLoader();

    $.ajax({

          url: base_url + 'dashboard/save_bank_details',  

          type: 'POST',

          data: formData,

          cache: false,

          contentType: false,

          processData: false,

          dataType: 'json',

          beforeSend: function() {

              console.log(formData);

          },

          success: function(returnData) {

               if(returnData.status=="OK")

               {

                  sweet_alert(returnData.type, returnData.message);

                  location.reload();

             

               }

               else if(returnData.status=="ERR")

               {

                 sweet_alert(returnData.type, returnData.message);

                  hideLoader("Add Account");

              

               }

          }

         

      });

      }//end submit handler

      });

      $.validator.addMethod("acctnos", function(value, element) {

         return $('#ac_no').val() == $('#acct_no').val()

      }, "account no and confrim account number should be same");

      

      $('#bankForm').validate({

          rules: {

            

             bank_ifsc_code: {

              required: true,

             },

            

             acct_no:{

                 acctnos:true,

             }

          },

          messages: {

            bank_ifsc_code: {

              required: "Please enter IFSC code",

            },

            ac_no:{

               required: "Please enter account no",

           },

           acct_no:{

               required: "Please confrim account no",

           },

           benef_name:{

               required: "Please Enter benificiery name",

           },

           declare:{

               required: "Please accept TNC proceed",

           }

            

          },

          errorElement: 'span',

          errorPlacement: function (error, element) {

            error.addClass('invalid-feedback');

            element.closest('.form-group').append(error);

          },

          highlight: function (element, errorClass, validClass) {

            $(element).addClass('is-invalid');

          },

          unhighlight: function (element, errorClass, validClass) {

            $(element).removeClass('is-invalid');

          }

        });

      });





      function delete_bank_account(id)

                    {

                        Swal.fire({

                          title: 'Are you sure?',

                          text: "Are you sure delete this account?",

                          icon: 'warning',

                          showCancelButton: true,

                          confirmButtonColor: '#3085d6',

                          cancelButtonColor: '#d33',

                          confirmButtonText: 'Yes, delete it!'

                          }).then((result) => {

                          if (result.isConfirmed) {

                             $.ajax({

                                type: 'POST',

                                url : base_url + 'dashboard/delete_bank_account/'+ id,

                                data: "id=" + id,

                                dataType: 'json',

                                success: function(returnData) {

                                 if(returnData.status=="OK")

                                     {

                                        Swal.fire(

                                          'Deleted!',

                                           returnData.message,

                                          'success'

                                        )

                                        location.reload();

                                     }

                                     else if(returnData.status=="ERR")

                                     {

                                       Swal.fire(

                                          'Error!',

                                           returnData.message,

                                          'error'

                                        )

                                     }

                                }

                                

                            }); 

                              

                            }

                         })

                    }

                

  // add upi id



  $(function () {

    $.validator.setDefaults({

      submitHandler: function () {

      var form = $('#upiForm');

      var formData = new FormData(form[0]);

      showLoader();

        $.ajax({

              url: base_url + 'dashboard/save_upi_id',  

              type: 'POST',

              data: formData,

              cache: false,

              contentType: false,

              processData: false,

              dataType: 'json',

              success: function(res) {

                   if(res.status=="OK")

                   {  

                     sweet_alert(res.type, res.message);

                     hideLoader("Add UPI");

                     location.reload();

                   }  

                   else if(res.status=="ERR")

                   {

                      sweet_alert(res.type, res.message);

                      hideLoader("Add UPI");

                   }

                   

              }

             

          });

          }//end submit handler

          });

          $('#upiForm').validate({

              rules: {

                upi_id: {

                  required: true, 

                }

                

              },

              messages: {

                upi_id: {

                  required: "Please enter your UPI Id",

                }

              },

              errorElement: 'span',

              errorPlacement: function (error, element) {

                error.addClass('invalid-feedback');

                element.closest('.form-group').append(error);

              },

              highlight: function (element, errorClass, validClass) {

                $(element).addClass('is-invalid');

              },

              unhighlight: function (element, errorClass, validClass) {

                $(element).removeClass('is-invalid');

              }

            });

      }); 

      



      function delete_upi_id(id)

                    {

                        Swal.fire({

                          title: 'Are you sure?',

                          text: "Are you sure delete this upi?",

                          icon: 'warning',

                          showCancelButton: true,

                          confirmButtonColor: '#3085d6',

                          cancelButtonColor: '#d33',

                          confirmButtonText: 'Yes, delete it!'

                          }).then((result) => {

                          if (result.isConfirmed) {

                             $.ajax({

                                type: 'POST',

                                url : base_url + 'dashboard/delete_upi_id/'+ id,

                                data: "id=" + id,

                                dataType: 'json',

                                success: function(returnData) {

                                 if(returnData.status=="OK")

                                     {

                                        Swal.fire(

                                          'Deleted!',

                                           returnData.message,

                                          'success'

                                        )

                                        location.reload();

                                     }

                                     else if(returnData.status=="ERR")

                                     {

                                       Swal.fire(

                                          'Error!',

                                           returnData.message,

                                          'error'

                                        )

                                     }

                                }

                                

                            }); 

                              

                            }

                         })

                    }



// search places 



                  var options = {

                      componentRestrictions: {country: 'in'}

                  };              

                   var input = document.getElementById('autocomplete');

                   var autocomplete = new google.maps.places.Autocomplete(input, options);

                   // var autocomplete = new google.maps.places.Autocomplete(document.getElementById('autocomplete'));

                   

                    autocomplete.setFields(['place_id', 'name', 'address_components', 'geometry']);

                    autocomplete.addListener('place_changed', function () {

                        const place = autocomplete.getPlace();

                        const components = place.address_components;

                        if (typeof components !== 'undefined') {

                            for (component of components) {

        

                                const type = component.types[0];

                                const longName = component.long_name;

                                const shortName = component.short_name;

                                switch (type) {

                                    case 'street_number':

                                        streenumber = longName

                                        break;

                                    case 'route':

                                        mainAddress = streenumber + " " + shortName;

                                        break;

                                    case 'sublocality_level_2':

                                        mainAddress = mainAddress + " " + shortName;

                                        break;

                                    case 'sublocality_level_1':

                                        mainAddress = mainAddress + " " + shortName;

                                        break;

                                    case 'locality':

                                        $("#mainAddress").val(mainAddress);

                                        $("#locality").val(shortName);

                                        break;

                                    case 'postal_code':

                                        $('#postalcode').val(longName);

                                        break;

                                    case 'administrative_area_level_2':

                                       $("#city").val(longName);

                                        break;

                                    case 'administrative_area_level_1':                            

                                        $("#state").val(longName);

                                        break;

        

                                }

                            }

                        }

                    });





          //get current location

          var x=document.getElementById("latngdemo");

          function getLocation(){

              if (navigator.geolocation){

                  navigator.geolocation.getCurrentPosition(showPosition,showError);

              }

              else{

                  x.innerHTML="Geolocation is not supported by this browser.";

              }

          }



          function showPosition(position){

              lat=position.coords.latitude;

              lon=position.coords.longitude;

              displayLocation(lat,lon);

          }



          function showError(error){

              switch(error.code){

                  case error.PERMISSION_DENIED:

                      x.innerHTML="User denied the request for Geolocation."

                  break;

                  case error.POSITION_UNAVAILABLE:

                      x.innerHTML="Location information is unavailable."

                  break;

                  case error.TIMEOUT:

                      x.innerHTML="The request to get user location timed out."

                  break;

                  case error.UNKNOWN_ERROR:

                      x.innerHTML="An unknown error occurred."

                  break;

              }

          }



          function displayLocation(latitude,longitude){

              var geocoder;

              geocoder = new google.maps.Geocoder();

              var latlng = new google.maps.LatLng(latitude, longitude);



              geocoder.geocode(

                  {'latLng': latlng}, 

                  function(results, status) {

                    if (status == google.maps.GeocoderStatus.OK) {

                      if (results[0]) {

                          for (var i = 0; i < results[0].address_components.length; i++) {

                              var types = results[0].address_components[i].types;

              

                              for (var typeIdx = 0; typeIdx < types.length; typeIdx++) {

                                  if (types[typeIdx] == 'postal_code') {

                                    // console.log(results[0].address_components[i].short_name);

                                      $('#postalcode').val(results[0].address_components[i].short_name);

                                  }

                                  if (types[typeIdx] == 'administrative_area_level_2') {

                                      $("#city").val(results[0].address_components[i].long_name);

                                  }

                                  if (types[typeIdx] == 'administrative_area_level_1') {

                                      $("#state").val(results[0].address_components[i].long_name);

                                  }

                              }

                          }

                      } else {

                          console.log("No results found");

                      }

                  }

                }

              );

          }







// add address

$(function () {

  $.validator.setDefaults({

    submitHandler: function () {

    var form = $('#SvdAddForm');

    var formData = new FormData(form[0]);

    showLoader();

      $.ajax({

            url: base_url + 'dashboard/save_address',  

            type: 'POST',

            data: formData,

            cache: false,

            contentType: false,

            processData: false,

            dataType: 'json',

            success: function(res) {

                 if(res.status=="OK")

                 {  

                   sweet_alert(res.type, res.message);

                   hideLoader("Add UPI");

                   location.reload();

                 }  

                 else if(res.status=="ERR")

                 {

                    sweet_alert(res.type, res.message);

                    hideLoader("Add UPI");

                 }

                 

            }

           

        });

        }//end submit handler

        });

        $('#SvdAddForm').validate({

            rules: {

              flat_office_floor: {

                required: true, 

              }

              

            },

            messages: {

              flat_office_floor: {

                required: "Please enter complete address",

              },

              city: {

                required: "Please enter city name",

              },

              pincode: {

                required: "Please enter postal code",

              }

            },

            errorElement: 'span',

            errorPlacement: function (error, element) {

              error.addClass('invalid-feedback');

              element.closest('.form-group').append(error);

            },

            highlight: function (element, errorClass, validClass) {

              $(element).addClass('is-invalid');

            },

            unhighlight: function (element, errorClass, validClass) {

              $(element).removeClass('is-invalid');

            }

          });

    }); 





    function check_address_exist(address_type){

      $.ajax({

        url: base_url + 'dashboard/check_address_exist/'+address_type,  

        type: 'POST',

        data: '',

        cache: false,

        contentType: false,

        processData: false,

        dataType: 'json',

        success: function(res) {

             if(res.status=="OK")

             {  

              $(this).prop("checked", true);

             }  

             else if(res.status=="ERR")

             {

                $(this).prop('checked',false);

                $("input:checked").removeAttr("checked");

                $("#inlineRadio3").prop('checked',true);

                sweet_alert(res.type, res.message);

              

                

             }

             

        }

       

    });

    }





    // add bank details

  function get_pincode_bycity(){

    var pincode = $("#postalcode").val();

    $.ajax({
      url: base_url +'dashboard/check_pincode', 
      type: 'POST',
      data:{pincode:pincode},
      dataType: 'json',
      success: function(returnData) {
           if(returnData.status=="OK")
           {

            $.ajax({
              url: base_url +'dashboard/get_pincode_details', 
              type: 'POST',
              data:{pincode:pincode},
              dataType: 'json',
              success: function(returnData) {
                   if(returnData.status=="OK")
                   {
                     $("#city").val(returnData.city);
                     $("#state").val(returnData.state);      
          
                   }
                   else if(returnData.status=="ERR")
                   {
                     $("#postalcode").val('');
                     sweet_alert('error', returnData.message);
          
                   }
              }  
            });
           
  
           }
           else if(returnData.status=="ERR")
           {
             $("#postalcode").val('');
             sweet_alert('error', returnData.message);
  
           }
      }  
    });

   

}







function delete_address(id)

                    {

                        Swal.fire({

                          title: 'Are you sure?',

                          text: "Are you sure delete this address?",

                          icon: 'warning',

                          showCancelButton: true,

                          confirmButtonColor: '#3085d6',

                          cancelButtonColor: '#d33',

                          confirmButtonText: 'Yes, delete it!'

                          }).then((result) => {

                          if (result.isConfirmed) {

                             $.ajax({

                                type: 'POST',

                                url : base_url + 'dashboard/delete_address/'+ id,

                                data: "id=" + id,

                                dataType: 'json',

                                success: function(returnData) {

                                 if(returnData.status=="OK")

                                     {

                                        Swal.fire(

                                          'Deleted!',

                                           returnData.message,

                                          'success'

                                        )

                                        location.reload();

                                     }

                                     else if(returnData.status=="ERR")

                                     {

                                       Swal.fire(

                                          'Error!',

                                           returnData.message,

                                          'error'

                                        )

                                     }

                                }

                                

                            }); 

                              

                            }

                         })

                    }





                    function edit_details_address(id,key)

                    {

                        $.ajax({

                            url: base_url+'dashboard/edit_details_address',

                            type: 'post',

                            dataType: 'html',

                            data: {id:id},

                            success:function(response){

                                $('#offcanvas-body').html(response);

                                $(".offcanvasRight-editAddress").offcanvas('show');

                            }

                        });

                    }



  

     function CancelResaon(){

         $(".offcanvasRight-ocancel").offcanvas('show');

     }

     function feedback(){

      $(".offcanvasRight-feedback").offcanvas('show');

  }

   function CancelOrder(id){

                  if($('input[name="reason_cancel"]:checked').length === 0) {

                    Swal.fire({

                          position: 'top',

                          icon: 'error',

                          title: '<h4>Please select a reason</h4>',

                          showConfirmButton: false,

                          timer: 1500

                          })

                      return false;

                    }

                

                  Swal.fire({

                      title: '<h4>Do you want to cancel this order?</h4>',

                      showCancelButton: true,

                      confirmButtonText: 'Yes',

                      cancelButtonText: `No`,

                    }).then((result) => {

                      /* Read more about isConfirmed, isDenied below */

                      if (result.isConfirmed) {

                        var c_reason = $("input[type=radio][name=reason_cancel]:checked").val();

                        var comment = $("#comment").val();

                        $.ajax({

                          type: 'POST',

                          url : base_url + 'dashboard/cancel_order/'+ id,

                          data: 'id='+ id  + '&comment='+ comment + '&reason='+ c_reason,

                          dataType: 'json',

                          success: function(returnData) {

                           if(returnData.status=="OK")

                               {

                                  Swal.fire({

                                    position: 'top',

                                    icon: 'success',

                                    allowOutsideClick: false,

                                    allowEscapeKey: false,

                                    title:returnData.message,

                                    showConfirmButton: false,

                                    timer: 1600

                               });



                              location.reload();



                               }

                               else if(returnData.status=="ERR")

                               {

                                 Swal.fire(

                                    'Error!',

                                     returnData.message,

                                    'error'

                                  )

                               }

                          }

                      }); 



                      }



                    })



   }





   //search mobile model js  

   $(document).ready(function() {

    $( ".search_model_city" ).autocomplete({

        source: function(request, response) {

            $.ajax({

            url: base_url + "web/search_model_city",

            data: {

                    city : request.city

             },

            dataType: "json",

            success: function(data){

               var resp = $.map(data,function(obj){

                    return obj.city_name;

                    }); 

               var resp2 = $.map(data,function(obj2){

                return obj2.city_id;

           }); 

            response(resp);

            var urlr = resp2;

            }

        });

    },

    select: function(request, urlr){

        var resp_url = urlr.item.value;

        resp_url = resp_url.replace(/\s+/g, '-').toLowerCase();

        window.location = base_url + 'web/store/'+resp_url;

    },

    minLength: 1

 });

});









function goodWindow(){

  document.getElementById("goodWindow").style="display:block";

  document.getElementById("exceWindow").style="display:none";

  document.getElementById("okWindow").style="display:none";

  document.getElementById("badWindow").style="display:none";

  document.getElementById("terrWindow").style="display:none";

  $("input[name='qsn_feedback[]']:checkbox").prop('checked',false);

}



function excWindow(){

  document.getElementById("goodWindow").style="display:none";

  document.getElementById("exceWindow").style="display:block";

  document.getElementById("okWindow").style="display:none";

  document.getElementById("badWindow").style="display:none";

  document.getElementById("terrWindow").style="display:none";

  $("input[name='qsn_feedback[]']:checkbox").prop('checked',false);

}



function okWindow(){

  document.getElementById("goodWindow").style="display:none";

  document.getElementById("exceWindow").style="display:none";

  document.getElementById("okWindow").style="display:block";

  document.getElementById("badWindow").style="display:none";

  document.getElementById("terrWindow").style="display:none";

  $("input[name='qsn_feedback[]']:checkbox").prop('checked',false);

}



function badWindow(){

  document.getElementById("goodWindow").style="display:none";

  document.getElementById("exceWindow").style="display:none";

  document.getElementById("okWindow").style="display:none";

  document.getElementById("badWindow").style="display:block";

  document.getElementById("terrWindow").style="display:none";

  $("input[name='qsn_feedback[]']:checkbox").prop('checked',false);

}



function terriWindow(){

  document.getElementById("goodWindow").style="display:none";

  document.getElementById("exceWindow").style="display:none";

  document.getElementById("okWindow").style="display:none";

  document.getElementById("badWindow").style="display:none";

  document.getElementById("terrWindow").style="display:block";

  $("input[name='qsn_feedback[]']:checkbox").prop('checked',false);

}







function add_feedback(){

    var form = $('#feedbackForm');

    var formData = new FormData(form[0]);

  

      $.ajax({

            url: base_url + 'dashboard/save_feedback',  

            type: 'POST',

            data: formData,

            cache: false,

            contentType: false,

            processData: false,

            dataType: 'json',

            success: function(res) {

                 if(res.status=="OK")

                 {  

                   sweet_alert(res.type, res.message);

                   location.reload();

                 }  

                 else if(res.status=="ERR")

                 {

                    sweet_alert(res.type, res.message);

                    

                 }

                 

            }

           

        });

        

      }
      

$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
    var form = $('#reqEnqForm');
    var formData = new FormData(form[0]);
    showLoader();
      $.ajax({
  
            url: base_url + 'web/device_det_from',  
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(res) {
                 if(res.status=="OK")
  
                 {  
  
                  document.getElementById("device_info").style="display:none";
                  document.getElementById("contact_info").style="display:flex";
                  $('#enqhead').html('Contact Details');
  
                 }               
                 if (form.valid() == true){
       
                      $.ajax({
                          url: base_url + 'web/save_req_price',
                          type: 'POST',
                          data: formData,
                          cache: false,
                          contentType: false,
                          processData: false,
                          dataType: 'json',
                          success: function(res) {
                              if(res.status=="OK")
                              {  
                              sweet_alert(res.type, res.message);   
                              location.reload();              
  
                              }  
                              else if(res.status=="ERR")
                              {
                                  sweet_alert(res.type, res.message);                  
  
                              }                 
  
                          }          
  
                      });
    
                  }
  
            }
  
           
  
        });
  
        }//end submit handler
  
        });
  
        $('#reqEnqForm').validate({
  
          rules: {
              model: {
                required: true, 
              }             
  
            },
            messages: {
              model: {
                required: "Model Name is required",
              },
  
              brand: {
                required: "Brand is required",
              },
  
              internal_storage: {
                required: "Internal Storage capacity is required",
              },
              ram: {
                required: "RAM is required",
              },
              condition: {
                required: "Physical condition is required",
              },
              warranty: {
                required: "Warranty is required",
              },
              accessories: {
                required: "Accessories is required",
              },
              name: {
                required: "Enter your name",
              },
              email: {
                required: "Enter your email",
              },
              mobile_number: {
                required: "Enter your mobile number",
              },
              address: {
                required: "Enter your address",
              },
              pincode: {
                required: "Enter your pincode",
              },
              city: {
                required: "Enter your city name",
              }
  
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
              error.addClass('invalid-feedback');
              element.closest('.form-group').append(error);
  
            },
  
            highlight: function (element, errorClass, validClass) {
              $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
              $(element).removeClass('is-invalid');
            }
  
          });
  
    }); 
  
       
        $('#previous').click(function(){
          $('#enqhead').html('Device Details');
          document.getElementById("device_info").style="display:flex";
          document.getElementById("contact_info").style="display:none";
         
        });
  
     

