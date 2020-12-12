$(document).ready(function () {
   console.log('ready');
   $('a.check').click(function () {
      var postdata = {};
      postdata.id = $(this).data('id');
      $.ajax({
         type: 'POST',
         url: '/task/ajax.php',
         data: postdata,
         success: function(res) {
            console.log(res);
            // if (res == 'success') {
            //    $('.contact-form form').fadeOut('fast', function() {
            //       $('.contact-form').append('<p>Спасибо, ваше сообщение отправлено</p>');
            //    });
            // }
         }
      });
   });
});