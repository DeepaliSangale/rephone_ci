                <form id="EditdAddForm">
                     <div class="form-group">
                        <div class="input-group mb-3">
                           <span class="input-group-text" id="basic-addon1"><i class="fi-rs-search mr-5"></i></span>
                           <input type="text" id="autocompleteEdit" class="form-control" placeholder="Search your location.." aria-label="Username" aria-describedby="basic-addon1">
                           <input type="hidden" id="mainAddress_edit" />
                           <input type="hidden" name="state_edit" id="state_edit" value="<?= @$ad_details->state ?>"/>
                           <input type="hidden" name="id" value="<?= @$ad_details->id ?>" />
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="input-group mb-3" onclick="getLocation();">
                           <span class="input-group-text" id="basic-addon1"><img src="<?= base_url() ?>assets/site_img/curr_loc.png" alt="location" height="25" width="25"></span>
                           <label class="curr_loc">Use my current location</label>
                           <span id="latngdemo_edit"></span>
                         </div>
                      </div>
                      <div class="form-group">
                        <label>Enter flat no / office / floor</label>
                        <input type="text" name="flat_office_floor_edit" class="form-control"  required="required" value="<?= $ad_details->flat_office_floor ?>">
                     </div> 
                     <div class="form-group">
                        <label>Landmark(optional)</label>
                        <input type="text" name="landmark_edit"  class="form-control" value="<?= @$ad_details->landmark ?>">
                     </div>                      
                     <div class="form-group">
                        <label>Pincode</label>
                        <input type="number" id="postalcode_edit" name="pincode_edit" class="form-control" required="required" value="<?= $ad_details->pincode ?>" onkeypress="if(this.value.length==6) return false;" onchange="get_pincode_bycity_edit();">
                     </div> 
                     <div class="form-group">
                        <label>City</label>
                        <input type="text" id="city_edit" name="city_edit" class="form-control" required="required" value="<?= $ad_details->city ?>" readonly>
                     </div> 
                     <div class="">
                        <label>Save As</label><br>
                        <div class="form-check form-check-inline">
                           <input class="form-check-input" type="radio" name="address_type_edit" id="inlineRadio1" value="Home" onclick="check_address_exist(this.value)" <?php if($ad_details->address_type=='Home'){ echo 'checked'; }else{echo ''; }?>>
                           <label class="form-check-label c-black font16" for="inlineRadio1">Home</label>
                         </div>
                         <div class="form-check form-check-inline">
                           <input class="form-check-input" type="radio" name="address_type_edit" id="inlineRadio2" value="Office" onclick="check_address_exist(this.value)" <?php if($ad_details->address_type=='Office'){ echo 'checked'; }else{echo ''; }?>>
                           <label class="form-check-label c-black font16" for="inlineRadio2">Office</label>
                         </div>
                         <div class="form-check form-check-inline">
                           <input class="form-check-input" type="radio" name="address_type_edit" id="inlineRadio3" value="Other" <?php if($ad_details->address_type=='Other'){ echo 'checked'; }else{echo ''; }?>>
                           <label class="form-check-label c-black font16" for="inlineRadio3">Other</label>
                         </div>
                     </div>
                     <div class="form-group mt-15">
                        <div class="d-grid gap-2">
                           <button type="submit" class="btn btn-primary loader-btn">Update Address</button>
                        </div>
                     </div>
                  </form>


                  <script>

                      // search places 

                  var options = {
                      componentRestrictions: {country: 'in'}
                  };              
                   var input = document.getElementById('autocompleteEdit');
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
                                        $("#mainAddress_edit").val(mainAddress);
                                        $("#locality").val(shortName);
                                        break;
                                    case 'postal_code':
                                        $('#postalcode_edit').val(longName);
                                        break;
                                    case 'administrative_area_level_2':
                                       $("#city_edit").val(longName);
                                        break;
                                    case 'administrative_area_level_1':                            
                                        $("#state_edit").val(longName);
                                        break;
        
                                }
                            }
                        }
                    });


                    //get current location
          var x=document.getElementById("latngdemo_edit");
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
                                      $('#postalcode_edit').val(results[0].address_components[i].short_name);
                                  }
                                  if (types[typeIdx] == 'administrative_area_level_2') {
                                      $("#city_edit").val(results[0].address_components[i].long_name);
                                  }
                                  if (types[typeIdx] == 'administrative_area_level_1') {
                                      $("#state_edit").val(results[0].address_components[i].long_name);
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

                             // Edit address
              $(function () {
                $.validator.setDefaults({
                  submitHandler: function () {
                  var form = $('#EditdAddForm');
                  var formData = new FormData(form[0]);
                  showLoader();
                    $.ajax({
                          url: base_url + 'dashboard/update_address_details',  
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
                                hideLoader("Update Address");
                                location.reload();
                              }  
                              else if(res.status=="ERR")
                              {
                                  sweet_alert(res.type, res.message);
                                  hideLoader("Update Address");
                              }
                              
                          }
                        
                      });
                      }//end submit handler
                      });
                      $('#EditdAddForm').validate({
                          rules: {
                            flat_office_floor_edit: {
                              required: true, 
                            }
                            
                          },
                          messages: {
                            flat_office_floor_edit: {
                              required: "Please enter complete address",
                            },
                            city_edit: {
                              required: "Please enter city name",
                            },
                            pincode_edit: {
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

                    // add bank details
  function get_pincode_bycity_edit(){
    var pincode = $("#postalcode_edit").val();
   
    $.ajax({
    url: base_url +'dashboard/get_pincode_details',  
    type: 'POST',
    data:{pincode:pincode},
    dataType: 'json',
    success: function(returnData) {
         if(returnData.status=="OK")
         {
           $("#city_edit").val(returnData.city);
           $("#state_edit").val(returnData.state);
       
         }
         else if(returnData.status=="ERR")
         {
           $("#postalcode_edit").val('');
           sweet_alert('error', returnData.message);
         }
    }
   
});
}

                      </script>