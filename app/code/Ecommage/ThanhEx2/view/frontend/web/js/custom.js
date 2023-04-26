define(['jquery','mage/url',],
    function ($,url) {'use strict';

    $.widget('mage.custom', {
        /**
         * Options common to all instances of this widget.
         * @type {Object}
         */
        options: {},

        /**
         * Bind event handlers for adding contact phone.
         * @private
         */
        _create: function () {
            var self = this;
            $('.form-contact-edit').submit(function (event) {
                event.preventDefault();
                var formData = $(this).serialize();
                console.log(typeof formData);
                console.log(formData);
                var customUrl = url.build('thanhex2/customer/customersaveedit');
                 console.log(customUrl);
                $.ajax({
                    url: customUrl,
                    data: formData,
                    type: 'POST',
                    dataType: 'html',
                    success: function (data) {
                        console.log("abc"); // In ra dữ liệu trả về
                        var obj = JSON.parse(data);
                        console.log(typeof obj);
                        alert(obj.json_data);
                        }
                });
            });

        },

    });
    return $.mage.custom;
});
