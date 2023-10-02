class baseClass {  

   cartUserCount(){
      var ajaxSetting={
         method: 'get',
         url: '/cartUserCount',
         success: function(data){
            console.log(data);

            $('.wrapper span').text(data);
         },
         error: function(data){
            console.log(data.responseText);

         },         
      };
      $.ajax(ajaxSetting);   
   }   

};
