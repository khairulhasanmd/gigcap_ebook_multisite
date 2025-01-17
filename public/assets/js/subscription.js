// (function(module, exports) {

    $("#findSubscription").submit(function (e) {
      e.preventDefault();
      var $findSubscription = $('#findSubscription');
      var $cancelSubscription = $('#cancelSubscription');
      var $inputs = $('#findSubscription :input');
      var $email = $('#emailError');
      var $last4 = $('#last4Error');
      var $subscriptionId = $('#subscription_id');
      var values = {};
      $inputs.each(function () {
        values[this.name] = $(this).val();
      });
      $.ajax({
        url: "/find-subscription",
        type: 'POST',
        data: values,
        dataType: "json"
      }).done(function (response) {
        if (response['status'] === 'error') {
          Swal.fire({
            title: 'Error!',
            html: response['errors'],
            icon: 'error',
            confirmButtonText: 'Ok'
          }); 
        } else if (response['status'] === 'success') {
          $email.text("");
          $last4.text("");
    
          if (response.data[0] && response.data[0] !== null) {
            $subscriptionId.val(response.data[0].id);
            $cancelSubscription.show();
            $findSubscription.hide();
            $('#findSubscription_div').hide();
            $('#cancelSubscription_div').show();
          };
        }
      }).fail(function (error) {
        if (error.responseJSON.errors.subscription_email) {
          $email.text(error.responseJSON.errors.subscription_email[0]);
        } else {
          $email.text("");
        }
    
        if (error.responseJSON.errors.subscription_last4) {
          //$('#error-box').css('display','none');
          Swal.fire({
            title: 'Ooops',
            text: error.responseJSON.errors.subscription_last4[0],
            icon: 'error',
            confirmButtonText: 'Ok'
          }); //$last4.text(error.responseJSON.errors.subscription_last4[0]);
        } else {
          $last4.text("");
        }
      });
    });
    $("#cancelSubscription").submit(function (e) {
      e.preventDefault();
      var $alertBox = $('#alertBox');
      var $alertMessage = $('#alertMessage');
      var $subscription = $('#subscription');
      var $subscriptionId = $('#subscription_id').val();
      //var $locale = $('#locale').val();
      var values = {
        "_token": $('#token').val(),
        'id': $subscriptionId
      };
      $.ajax({
        url: "/cancel-subscription",
        type: 'POST',
        data: values,
        dataType: "json"
      }).done(function (response) {
        // if ($locale == 'en') {
          if (response.status === 'success') {
            Swal.fire({
              //title: 'All Good!',
              text: response.data,
              icon: 'success',
              confirmButtonText: 'ok'
            });
          } else if (response.status === 'error') {
            Swal.fire({
              //title: 'Error!',
              html: response.errors,
              icon: 'error',
              confirmButtonText: 'Ok'
            });
          } else {
            console.log(response.errors);
          }
        $subscription.show();
      }).fail(function (error) {
        console.log(error);
      });
    });
    
    // /***/ })