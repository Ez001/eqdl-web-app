/*
   Author of the script
   Name: Ezra Adamu
   Email: ezra00100@gmail.com
   Date created: 23/10/2023 
   Date modified: 23/10/2023
*/

const makeAjaxCall = async ( url, method, data, ret = false ) => {
   let res;

   try
   {
      res = await $.ajax({
         url: url, 
         method: method, 
         data: data,
      });

      //alert( res );
      if ( ret )
      {
         return res;
      }
   }
   catch ( err )
   {
      console.error( err );
   }
};

$( document ).ready( () => {

});