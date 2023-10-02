$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})

class ForAllPage extends baseClass {

   mailer(message, contact) {
      let ajaxSetting = {
         method: 'post',
         url: '/mailer',
         data: {
            message: message,
            contact: contact,
         },
         success: function(data) {
            console.log(data);

            let dataJson = JSON.parse(data);

            if (dataJson.mail) {
               swal({
                 title: "Сongratulations!",
                 text: "Your message has been sending successfully!",
                 icon: "success",
               });               
            } else {
               swal({
                 title: "Oops!",
                 text: "There is any mistake!",
                 icon: "error",
               });                
            }
         },
         error: function(data) {
            console.log(data.responseText);
         },
      };

      $.ajax(ajaxSetting);
   } 

};

var BaseRecordForAllPages = new ForAllPage();
