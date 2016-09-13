$(function(){
    $('#showmodal').click(function(){
       $('#modal').modal('show')
            .find('#modalcontent')
            .load($(this).attr('href')));
    })
});
