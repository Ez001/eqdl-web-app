/*
   Author of the script
   Name: Ezra Adamu
   Email: ezra00100@gmail.com
   Date created: 20/10/2023 
   Date modified: 01/11/2023
*/

$( document ).ready( () => {
   const setCourseTopics = ( data ) => {
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

const genQuestions = ( data ) => {
   data = JSON.parse( data );
   //console.log( data );

   if ( data )
   {
      if ( data.status )
      {
         $( `#print_questions_btn` ).removeClass( 'invisible' );
      }
      else
      {
         $( `#print_questions_btn` ).addClass( 'invisible' );
         $( '#alert_msg_qt' ).html( data.msg );
      }
      
      $( '#spinner' ).addClass( 'd-none' );
      $( '#gen_questions_btn' ).removeClass( 'disabled' );
   }
};

$( document ).on( 'click', '#gen_questions_btn', ( e ) => {
   $( '#alert_msg_qt' ).html( '' );
   $( `#print_questions_btn` ).addClass( 'invisible' );
   $( '#spinner' ).removeClass( 'd-none' );
   $( '#gen_questions_btn' ).addClass( 'disabled' );

   //create new array
   var cs_ids_arr = [];

   $( '.no_of_qt' ).map( ( i, el ) => {
      const id = el.dataset.id;
      const topic_ct = parseInt( el.value );

      topic_ct > 0 ? 
         cs_ids_arr.push( { 'id' : id, 'topic_ct' : topic_ct } )
      : '';
   });

   //make API call
   makeAjaxCall( '', 'POST', { 'gen_questions' : true, 'cs_ids_arr' : cs_ids_arr }, true ).
   then( ( data ) => 
      genQuestions( data )
   );
});