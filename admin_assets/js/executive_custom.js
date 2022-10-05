let base_url = document.getElementById("myBase").href;
let page = document.getElementById("page").getAttribute('dt');

function go_back() {
    history.go(-1);
}
$(document).ready(function () {
 
     
    $('[name=set_on_home]').change(function () {
        var element = $(this);
        var status = (!$(this).is(':checked')) ? 0 : 1;
        var id = $(this).parents(".main_block").attr('main_id');
        var action = $(this).attr('action');
        console.log(id);
        $.ajax({
            type: 'POST',
            url: base_url + 'Executive/' + action + '/' + id + '/' + status,
//            data: formData
        }).done(function (response) {
            var res = $.parseJSON(response);
            console.log(res);
            if (res.success == '1') {
                notify(res.type, res.message);
            } else {
                notify(res.type, res.message);
            }
        }).fail(function () {
            alert("error");
        })
    })

    $('.bootstrap-select').removeClass('approval');
    var last_val = 0;
    $('.approval').focus(function (e) {
        last_val = $(".approval option:selected");
    });
    $('.approval').change(function (e) {
        var id = $(this);
        var status = $(this).val();
        var table = $(this).attr('table');
        var column = $(this).attr('column');
        var approval = $(this).attr('approval-type');
        swal({
            title: "Are you sure?",
            text: "You want to change the status!",
            icon: "warning",
            buttons: [
                'cancel',
                'Yes'
            ],
            dangerMode: true,
        }).then(function (isConfirm) {
            if (isConfirm) {
                if (approval == 0) {
                    var val = [];
                    $(".main_block").find(':checkbox:checked').each(function (i) {
                        val[i] = $(this).val();
                    });
                    id = val.toString();
                } else {
                    id = id.parents(".main_block").attr('main_id');

                }
                if (id != '') {
                    $.ajax({
                        type: 'POST',
                        url: base_url + "Executive/change_approval_status/",
                        data: {id: id, status: status, table: table, column: column},
//            data: formData
                    }).done(function (response) {
                        var res = $.parseJSON(response);
                        if (res.success == '1') {
                            notify(res.type, res.message);
                            if (approval == 0) {
                                $(".main_block").find(':checkbox:checked').each(function (i) {
                                    val[i] = $(this).val();
                                    $(this).parents('.main_block').find(".approval option[value=" + status + ']').prop("selected", true);
                                });
                            }
                        } else {
                            notify(res.type, res.message);
                        }
                        location.reload();
                    });
                } else {
                    swal('Nothing Selected', "", "error");
                    last_val.prop("selected", true);
                }
            } else {
                last_val.prop("selected", true);
                swal("Cancelled", "", "error");
            }
        })
    });

    $('.term-reason').click(function (e) {
        $('.t-reason').html($(this).attr('reason'));
        $('.t-date').html($(this).attr('date'));
        $('#terminate_reason').modal('show');
    })

    $('.commoon_active').on('click', function (e) {
        var element = $(this);
        var status = $(this).attr('active');
        var id = $(this).parents(".main_block").attr('main_id');
        var action = $(this).attr('action');
        console.log(id);
        $.ajax({
            type: 'POST',
            url: base_url + 'Executive/' + action + '/' + id + '/' + status,
//            data: formData
        }).done(function (response) {
            var res = $.parseJSON(response);
            console.log(res);
            if (res.success == '1') {
                notify(res.type, res.message);
                if (status == '0') {
                    element.attr('active', '1');
                    element.html('Deactive');
                    element.addClass('bg-danger').removeClass('bg-success');
                } else {
                    element.attr('active', '0');
                    element.html('Active');
                    element.addClass('bg-success').removeClass('bg-danger');

                }
            } else {
                notify(res.type, res.message);
            }
        }).fail(function () {
            alert("error");
        })
    });



    

    $('.delete').on('click', function () {
        var element = $(this);
        var id = $(this).parents(".main_block").attr('main_id');
        var action = $(this).attr('action');
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
                url: base_url + 'Executive/' + action + '/' + id,
                dataType: 'json',
                success: function(res) {
                    if (res.success == '1') {
                        notify(res.type, res.message);
                        element.parents(".main_block").css('display', 'none');
                    } else {
                        notify(res.type, res.message);
                    }
                }
                
            }); 
              
            }
         })
    });

    $('.edit').click(function () {
        var id = $(this).parents(".main_block").attr('main_id');
        var name = $(this).parents(".main_block").find('.text_name').html();
        if (page == 'Subcategory') {
            var cat_id = $(this).parents(".main_block").find('.cat_name').attr('cat_id');
            $('[name=sc_category_id]').val(cat_id);
            $('.js-example-basic-single').trigger('change');
            $('.select2-selection__rendered').html($(".js-example-basic-single option:selected").text());
        }
        if (page == 'Package') {
            $('.package_amount').val($(this).parents(".main_block").find('.package_amount').html());
        }
        $('#defaultModalLabel').html('Edit ' + page);
        $('.id').val(id);
        $('.text_name1').val(name);
    });

    $('.add').click(function () {
        $('#defaultModalLabel').html('Add ' + page);
        $('.id').val('');
        $('.text_name1').val('');
        if (page == 'Package') {
            $('.package_amount').val(0);
        }
        var checkboxes = document.getElementsByClassName('primary');
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].type == 'checkbox') {
                checkboxes[i].checked = false;
            }
        }
    });

    $("#forms").submit(function (e) {
        e.preventDefault();
        //to send ckeditor data at 1st attempt of post
//        for (instance in CKEDITOR.instances) {
//            CKEDITOR.instances[instance].updateElement();
//        }
        var _form = $(this);
        var formId = $(this).attr('id');
        var action = $(this).attr('action');
        $(".process_loader").show();
//        var formData = new FormData(document.getElementById(formId));
        var formData = new FormData(this);
        console.log(formData);
//        var formData = $(this).serialize();
//        formData.append( file);

        $.ajax({
            type: 'POST',
            url: action,
            contentType: false,
            processData: false,
            data: formData
        }).done(function (response) {
            var res = $.parseJSON(response);
            console.log(res);
            if (res.success == '1') {
                notify(res.type, res.message);
                location.reload();
            } else {
                notify(res.type, res.message);
            }
        })

    });

    $('.signout').click(function () {
        swal.fire({
            title: "Are you sure?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                window.location.href = base_url + 'Executive/signOut';
            } else {
                swal("Sorry", "Your cancelled it :)", "error");
            }
        }
        );
    });
    $('.signout2').click(function () {
        swal({
            title: "Are you sure?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                window.location.href = base_url + 'user/signOut';
            } else {
                swal("Sorry", "Your cancelled it :)", "error");
            }
        }
        );
    });



});


//validation 
var forms = document.getElementById('forms');
var elements = document.getElementsByClassName("inputs");
var btnSubmit = document.getElementById("btnSubmit");

var myFunction = function () {
    var isValid = forms.checkValidity();
    if (isValid == false) {
        forms.classList.add('show-errors');
        var elements = forms.elements;
        for (var i = 0; i < elements.length; i++) {
            var el = elements[i];
            if (el.nextElementSibling != null) {
                if (el.tagName == 'INPUT' || el.tagName == 'TEXTAREA') {
                    if (el.nextElementSibling.tagName == 'SPAN') {
//                       el.style.borderColor = "red";
                        if (el.classList.contains('phone')) {
                            el.nextElementSibling.innerHTML = "Invalid phone number";
                        } else {
                            el.nextElementSibling.innerHTML = el.validationMessage;
                        }
                    }
                }
            }
        }
    } else {
        forms.classList.remove('show-errors');
        forms.classList.add('remove-errors');
    }
};
for (var i = 0; i < elements.length; i++) {
    elements[i].addEventListener('keyup', myFunction, true);
    elements[i].addEventListener('change', myFunction, true);
}

if (btnSubmit != null) {
    btnSubmit.addEventListener('click', myFunction, true);
}


window.notify = function (type, message) {
    Command: toastr[type](message);
}

toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
};


 // pin change
 $(document).ready(function(){
    $('#ch_pincode').change(function(){
       var pincode = $(this).val();
      // AJAX request
       $.ajax({
         url: base_url + 'Executive/get_exiutive_bypincode/',
         method: 'post',
         data: {pincode: pincode},
         dataType: 'json',
         success: function(response){
 
           $('#get_execu').find('option').not(':first').remove();
           // Add options
           $.each(response,function(index,data){
              $('#get_execu').append('<option value="'+data['staff_id']+'">'+data['staff_fullname']+'</option>');
           });
         }
      });
    });

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



