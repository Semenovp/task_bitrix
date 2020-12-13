$(document).ready(function () {
   var today = new Date();
   var dd = String(today.getDate()).padStart(2, '0');
   var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
   var yyyy = today.getFullYear();
   // Текущие время
   var curDate = mm + '.' + dd + '.' + yyyy + ' ' + today.getHours() + ':' + today.getMinutes() +':' + today.getSeconds();

   $("body").on("click", "a.check", function () {
      var postdata = {};
      postdata.id = $(this).data('id');
      postdata.action = 'check';
      $.ajax({
         type: 'POST',
         url: '/task/ajax.php',
         data: postdata,
         success: function(res) {
            console.log(res);
            if (res == 'success') {
               var element = $('.task-body').find('tr[data-id="' + postdata.id +'"]');
               element.find('.check').removeClass('check').addClass('uncheck');
               element.find('.status .badge').removeClass('badge-primary').addClass('badge-success').text('Завершено');
            }
         }
      });
   } );
   $("body").on("click", "a.uncheck", function () {
      var postdata = {};
      postdata.id = $(this).data('id');
      postdata.action = 'in_work';
      $.ajax({
         type: 'POST',
         url: '/task/ajax.php',
         data: postdata,
         success: function(res) {
            console.log(res);
            if (res == 'success') {
               var element = $('.task-body').find('tr[data-id="' + postdata.id +'"]');
               element.find('.uncheck').removeClass('uncheck').addClass('check');
               element.find('.status .badge').removeClass('badge-success').addClass('badge-primary').text('В работе');
            }
         }
      });
   });
   $("body").on("click", "a.edit", function () {
      $('#name_task_edit').val($(this).data('name'));
      $('#preview_text_edit').val($(this).data('preview'));
      $('#id_element').val($(this).data('id'));
   });
   $('#edit').submit(function (e) {
      e.preventDefault();
      var postdata = {};
      postdata.id = $('#id_element').val();
      postdata.action = 'edit';
      postdata.name = $('#name_task_edit').val();
      postdata.preview_text = $('#preview_text_edit').val();
      console.log(postdata);
      $.ajax({
         type: 'POST',
         url: '/task/ajax.php',
         data: postdata,
         success: function(res) {
            console.log(res);
            if (res == 'success') {
               $('#modal_edit').modal('hide');
               var element = $('.task-body').find('tr[data-id="' + postdata.id +'"]');
               element.find('.name').text(postdata.name);
               element.find('.preview').text(postdata.preview_text);
               console.log(element);
            }
         }
      });
   });
   $('#create').submit(function (e) {
      e.preventDefault();
      var postdata = {};
      postdata.action = 'create';
      postdata.name = $('#name_task').val();
      postdata.preview_text = $('#preview_text').val();
      console.log(postdata);
      $.ajax({
         type: 'POST',
         url: '/task/ajax.php',
         data: postdata,
         success: function(res) {
            console.log(res);
            if (res != 'error') {
               $('#modal_create').modal('hide');
               $('.task-body tbody').prepend('<tr data-id="'+ res +'">\n' +
                   '            <th scope="row">' + res + '</th>\n' +
                   '            <td class="name">' + postdata.name +'</td>\n' +
                   '            <td class="preview">' + postdata.preview_text + '</td>\n' +
                   '            <td>' + curDate + '</td>\n' +
    '                           <td class="status"><span class="badge badge-primary">В работе</span></td>\n' +
       '                        <td>\n' +
'                               <a href="javascript:void(0);" class="check" data-id="' + res + '"><i class="fas fa-check-circle" aria-hidden="true"></i></a>\n' +
                   '                <a href="javascript:void(0);" class="edit" data-id="' + res +'" data-toggle="modal" data-target="#modal_edit" data-name="'+postdata.name + '" data-preview="' + postdata.preview_text + '"><i class="fas fa-edit" aria-hidden="true"></i></a>\n' +
                   '                <a href="javascript:void(0);" class="delete" data-id="' + res +'"><i class="fas fa-trash-alt" aria-hidden="true"></i></a>\n' +
                   '            </td>\n' +
                   '        </tr>');
            }
         }
      });
   });
   $('.delete').click(function (e) {
      var postdata = {};
      postdata.action = 'delete';
      postdata.id = $(this).data('id');
      console.log(postdata);
      $.ajax({
         type: 'POST',
         url: '/task/ajax.php',
         data: postdata,
         success: function(res) {
            console.log(res);
            if (res == 'success') {
               var element = $('.task-body').find('tr[data-id="' + postdata.id +'"]');
               element.hide();
            }
         }
      });
   })
});