$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})

class ForCartPage extends baseClass {

   removeone(id) {
      let self = this;
      let ajaxSetting = {
         method: 'post',
         url: '/removeone',
         data: {
            id: id,
         },
         success: function(data) {
            $('.cart_items_list').html(data.table);

            self.cartUserCount();
         },
         error: function(data) {
            console.log(data.responseText);
         },
      };

      $.ajax(ajaxSetting);
   }

};

var BaseRecord = new ForCartPage();
