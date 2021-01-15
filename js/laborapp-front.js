(function($, _) {
    $(document).ready(function() {

        console.log(laborappSettings);

        // validate form fields
        $('#new-hire-form').on('submit', function (e) {
            e.preventDefault();

            var fields = $(this).serializeArray();

            // create empty radio button field names for validation
            var radioFieldNames = [
                'cert-osha10',
                'cert-osha30',
                'cert-forkliftCert',
                'cert-manliftCert',
                'cert-welderCert',
                'skill-safetyTrained',
                'skill-readdrawings',
                'skill-shakeout',
                'skill-forklift',
                'skill-connector',
                'skill-welder',
                'skill-columns',
                'skill-beams',
                'skill-ledger',
                'skill-joist',
                'skill-bridging',
                'skill-placedeck',
                'skill-attachdeck',
                'leadership'
            ];

            // Adds empty radio buttons to fields array
            _.forEach(radioFieldNames, function (fieldName) {
                _.filter(fields, ['name', fieldName]).length === 0 ? fields.push({name: fieldName, value: ''}) : '';
            });

            // display all inputs
            //console.log({'all fields':fields});


            // validate inputs
            var errors = [];

            formSectionsToValidate = laborappSettings.sections;

            $(fields).each(function (index, element) {
                if (element.value === '') {

                    var emptyFieldPrefix = element.name.substring(0,4);

                    var sectionObject = _.find( formSectionsToValidate, function (o) { return o.short === emptyFieldPrefix });

                    if (! _.isUndefined(sectionObject) ) {
                        errors.push({ele: element.name, message: sectionObject.display + laborappSettings.validation_msgs[0].error});
                    }
                }
            });

            // display erros
            if (errors.length > 0) {
                //console.log(errors[0].message);
                form_error_message(errors[0].message);
                return;
            } else {
                form_modal_in_progress();
            }

            $.ajax({
                    url : laborappSettings.ajax_url,
                    type : 'post',
                    data : {
                        action : 'new_hire_form',
                        payload : {'formData': fields},
                        security : laborappSettings.nonce
                    },
                    success : function( response ) {
                        if ( response.success === false  ) {
                            form_error_message(response.data);
                        } else {
                            window.location.href = laborappSettings.account;
                        }
                    },
                    fail: function () {
                        form_submitted_modal_fail();
                    }
                });

        });


        const Toast = Swal.mixin({
            toast: true,
            position: 'bottom-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            onOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
            },
                onAfterClose: function() {
                    errors = [];
                }
            });

        function form_error_message(message) {
            Toast.fire({
                icon: 'error',
                title: message
            })
        }

        function form_modal_in_progress() {
            Swal.fire({
                title: laborappSettings.validation_msgs[1].success,
                text: laborappSettings.validation_msgs[1].success,
                icon: 'success',
            })
        }

        function form_submitted_modal_fail() {
            Swal.fire({
                title: 'Sorry',
                text: aborappSettings.validation_msgs[2].fail,
                icon: 'error',
                confirmButtonText: 'Got it',
                onAfterClose: function() {
                    errors = [];
                }
            })
        }

    });

})(jQuery, lodash)
