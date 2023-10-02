var BaseRecord={

   search: null,

   showSearch() {
      let ajaxSetting = {
         method: 'get',
         url: '/home',
         data: {
            search: this.search,
            more: 1,
         },
         success: function(data) {
            console.log(data.table);

            $('.row.products_row').html(data.table);
         },
         error: function(data) {
            console.log(data.responseText);
         },
      };

      $.ajax(ajaxSetting);
   },   

};