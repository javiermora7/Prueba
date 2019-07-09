/*
 Template Name: Veltrix - Responsive Bootstrap 4 Admin Dashboard
 Author: Themesbrand
 File: Sweet Alert init js
 */

!function ($) {
    "use strict";

    var SweetAlert = function () {
    };

    //examples
    SweetAlert.prototype.init = function () {





        //Warning Message
        $('').click(function () {
            swal({
                title: '¿Estas seguro de cancelar  el envio?',
                text: "Para regresar tendras que volver a generar el envio desde el inicio",
                type: 'warning',
                showCancelButton: true,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger m-l-10',
                confirmButtonText: 'Si voy a cancelar el envio'
            }).then(function () {

                swal(
                    'Cancelado',
                    'El envio fue correctamente cancelado',
                    'success'
                )

            }).catch(swal.noop)

        });

        //Parameter
        
        //Ajax
        // $('#ajax-alert').click(function () {
        //     swal({
        //         title: 'Submit email to run ajax request',
        //         input: 'email',
        //         showCancelButton: true,
        //         confirmButtonText: 'Submit',
        //         showLoaderOnConfirm: true,
        //         confirmButtonClass: 'btn btn-success',
        //         cancelButtonClass: 'btn btn-danger m-l-10',
        //         preConfirm: function (email) {
        //             return new Promise(function (resolve, reject) {
        //                 setTimeout(function () {
        //                     if (email === 'taken@example.com') {
        //                         reject('This email is already taken.')
        //                     } else {
        //                         resolve()
        //                     }
        //                 }, 2000)
        //             })
        //         },
        //         allowOutsideClick: false
        //     }).then(function (email) {
        //         swal({
        //             type: 'success',
        //             title: 'Ajax request finished!',
        //             html: 'Submitted email: ' + email
        //         })
        //     }).catch(swal.noop)
        // });


        //Danger
        // $('#dynamic-alert').click(function () {
        //     swal.queue([{
        //         title: 'Your public IP',
        //         confirmButtonText: 'Show my public IP',
        //         text: 'Your public IP will be received ' +
        //         'via AJAX request',
        //         showLoaderOnConfirm: true,
        //         preConfirm: function () {
        //             return new Promise(function (resolve) {
        //                 $.get('https://api.ipify.org?format=json')
        //                     .done(function (data) {
        //                         swal.insertQueueStep(data.ip)
        //                         resolve()
        //                     })
        //             })
        //         }
        //     }]).catch(swal.noop)
        // });


    },
        //init
        $.SweetAlert = new SweetAlert, $.SweetAlert.Constructor = SweetAlert
}(window.jQuery),

//initializing
    function ($) {
        "use strict";
        $.SweetAlert.init()
    }(window.jQuery);