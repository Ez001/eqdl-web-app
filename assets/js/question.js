/*
   Author of the script
   Name: Ezra Adamu
   Email: ezra00100@gmail.com
   Date created: 20/10/2023 
   Date modified: 25/10/2023
*/

$( document ).ready( () => {
   const setCourseTopics = ( data ) => {
      /* console.log( data );
      return; */
      data = JSON.parse( data );

      if ( data )
      {
         //alert( data.msg )
         $( '#alert_msg' ).html( data.msg );
         $( '#qt_topics_div' ).html( data.course_topics );
      }
   };
 
   $( '#course' ).change( ( e ) => {
      const cs_code = e.target.value;
      
      makeAjaxCall( '', 'POST', { 'get_course_topics' : true, 'cs_code' : cs_code }, true ).
      then( ( data ) => 
         setCourseTopics( data )
      );
   });
});

$( document ).on( 'click', '#gen_question_btn', ( e ) => {
   //create new array
   var cs_ids_arr = [];

   $( '.no_of_qt' ).map( ( i, el ) => {
      const id = el.dataset.id;
      const topic_ct = el.value;

      topic_ct ? 
         cs_ids_arr.push( { 'id' : id, 'topic_ct' : topic_ct } )
      : '';
   });

   //make API call
   makeAjaxCall( '', 'POST', { 'gen_questions' : true, 'cs_ids_arr' : cs_ids_arr }, true ).
   then( ( data ) => 
      console.log( data )
   );
});