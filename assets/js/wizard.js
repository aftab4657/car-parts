(function($) {
  var form = $("#example-form");
  form.children("div").steps({
    headerTag: "h3",
    bodyTag: "section",
    transitionEffect: "slideLeft",
    onFinished: function(event, currentIndex) {
      alert("Submitted!");
    }
  });
  var validationForm = $("#example-validation-form");
  validationForm.val({
    errorPlacement: function errorPlacement(error, element) {
      element.before(error);
    },
    rules: {
      confirm: {
        equalTo: "#password"
      }
    }
  });
  validationForm.children("div").steps({
    headerTag: "h3",
    bodyTag: "section",
    transitionEffect: "slideLeft",
    onStepChanging: function(event, currentIndex, newIndex) {
      validationForm.val({
        ignore: [":disabled", ":hidden"]
      })
      return validationForm.val();
    },
    onFinishing: function(event, currentIndex) {
      validationForm.val({
        ignore: [':disabled']
      })
      return validationForm.val();
    },
    onFinished: function(event, currentIndex) {
      alert("Submitted!");
    }
  });
  var verticalForm = $("#example-vertical-wizard");
  verticalForm.children("div").steps({
    headerTag: "h3",
    bodyTag: "section",
    transitionEffect: "slideLeft",
    stepsOrientation: "vertical",
    onFinished: function(event, currentIndex) {
      // var seller = $('#username').val();
      // var category = $('#category').val();
      // var urls = $('#urls').val();
      // var status = ""
      // if($("#draft").prop("checked") == true){
      //   status = "draft";
      // }
      // else if($("#draft").prop("checked") == false){
      //   status = "pending";
      // }
      // var draft = $('#draft').val();
      // alert(seller);
      // alert(category);
      // alert(urls);
      // alert(status);
    //   $.ajax({
    //     url: 'SaveUrlDB',
    //     type: 'POST',
    //     data: {seller: seller, category: category, urls: urls, status: status},
    //   error: function(xhr, status, error) {
    //     console.log(xhr.status);
    //   },
    //   success: function(data) {
    //     alert(data);  
    //   }
    // });







  var Form = document.getElementById("example-vertical-wizard");
  $.ajax({
   url:"SaveUrlDB",
   method:"POST",
   data:new FormData(verticalForm),
   dataType:'json',
   contentType:false,
   cache:false,
   processData:false,
   success:function(data)
   {
      console.log(data);
   }
  });





















    }
  });
})(jQuery);