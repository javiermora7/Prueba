jQuery(document).ready(function( $ ) {
    $('.btn-play').click(function() {
        $(this).addClass('d-none').removeClass('d-block');
        $(this).siblings('.btn-pause').removeClass('d-none').addClass('d-block');
        $(this).siblings('.progress').removeClass('d-none').addClass('d-flex');
        $(this).siblings('.btn-cancel').removeClass('d-none').addClass('d-flex');

    })
    $('.btn-pause').click(function() {
        $(this).addClass('d-none').removeClass('d-block');
        $(this).siblings('.btn-play').removeClass('d-none').addClass('d-block');
    })
    $('.btn-cancel').click(function() {
        
        $(this).siblings('.progress').removeClass('d-flex').addClass('d-none');
        $(this).removeClass('d-flex').addClass('d-none');
        $(this).siblings('.btn-pause').removeClass('d-block').addClass('d-none');
        $(this).siblings('.btn-play').removeClass('d-none').addClass('d-block');
    })  

    $('[name=duallistbox_demo1]').bootstrapDualListbox({
        preserveSelectionOnMove: 'moved',
        moveOnSelect: false,
    });
    $('button.moveall').children('i').last().remove()
    $('button.moveall').children('i').removeClass('glyphicon-arrow-right').removeClass('glyphicon').addClass('ti-angle-double-right');
    $('button.move').children('i').removeClass('glyphicon-arrow-right').removeClass('glyphicon').addClass('ti-angle-right');

    $('button.removeall').children('i').last().remove()
    $('button.removeall').children('i').removeClass('glyphicon-arrow-right').removeClass('glyphicon').addClass('ti-angle-double-left');
    $('button.remove').children('i').removeClass('glyphicon-arrow-right').removeClass('glyphicon').addClass('ti-angle-left');
});
