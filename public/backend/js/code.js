
    $(function(){
      $(document).on('click','#delete', function(e){
        e.preventDefault();
        var link = $(this).attr("href");
     
            Swal.fire({
            title: 'Are you sure?',
            text: "Delete this Data ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = link
              Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
              )
            }
          })
        });
    });


  //  // Order Pending To Confirmed
  //   $(function(){
  //       $(document).on('click','#confirmed', function(e){
  //         e.preventDefault();
  //         var link = $(this).attr("href");
       
  //             Swal.fire({
  //             title: 'Are you sure to Confirm?',
  //             text: "Your choice is irreversible !",
  //             icon: 'warning',
  //             showCancelButton: true,
  //             confirmButtonColor: '#3085d6',
  //             cancelButtonColor: '#d33',
  //             confirmButtonText: 'Yes, confirm it !'
  //           }).then((result) => {
  //             if (result.isConfirmed) {
  //               window.location.href = link
  //               Swal.fire(
  //                 'Confirm !',
  //                 'Your choice has been confirmed.',
  //                 'success'
  //               )
  //             }
  //           })
  //         });
  //   });
      
     // Order Confirmed To Processing
     $(function(){
      $(document).on('click','#processing', function(e){
        e.preventDefault();
        var link = $(this).attr("href");
     
            Swal.fire({
            title: 'Are you sure to Confirm?',
            text: "Your choice is irreversible !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, confirm it !'
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = link
              Swal.fire(
                'Confirm !',
                'The Order is processing.',
                'success'
              )
            }
          })
        });
     });
    
// // Order  Processing To Picked
// $(function(){
//   $(document).on('click','#picked', function(e){
//     e.preventDefault();
//     var link = $(this).attr("href");
 
//         Swal.fire({
//         title: 'Are you sure to Confirm?',
//         text: "Your choice is irreversible !",
//         icon: 'warning',
//         showCancelButton: true,
//         confirmButtonColor: '#3085d6',
//         cancelButtonColor: '#d33',
//         confirmButtonText: 'Yes, confirm it !'
//       }).then((result) => {
//         if (result.isConfirmed) {
//           window.location.href = link
//           Swal.fire(
//             'Confirm !',
//             'The Order is picked.',
//             'success'
//           )
//         }
//       })
//     });
// });

// Order  Picked To Shipped
$(function(){
  $(document).on('click','#shipped', function(e){
    e.preventDefault();
    var link = $(this).attr("href");
 
        Swal.fire({
        title: 'Are you sure to Confirm?',
        text: "Your choice is irreversible !",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, confirm it !'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = link
          Swal.fire(
            'Confirm !',
            'The Order is shipped.',
            'success'
          )
        }
      })
    });
});

// Order Shipped To Delivered 

  $(function () {
    $(document).on('click', '#delivered', function (e) {
      e.preventDefault();
      var link = $(this).attr("href");
      Swal.fire({
          
        title: 'Are you sure to Confirm?',
        text: "Your choice is irreversible !",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, confirm it !'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = link
          Swal.fire(
            'Confirm !',
            'The Order is canceled.',
            'success'
          )
        }
      })
    });
  });



// Order  Delivered To Cancel

  $(function () {
    $(document).on('click', '#cancel', function (e) {
      e.preventDefault();
      var link = $(this).attr("href");
      Swal.fire({
          
        title: 'Are you sure to Confirm?',
        text: "Your choice is irreversible !",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, confirm it !'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = link
          Swal.fire(
            'Confirm !',
            'The Order is canceled.',
            'success'
          )
        }
      })
    });
  });







      
    
