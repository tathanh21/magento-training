define(
    [
        'uiComponent',
        'jquery',
        'ko'
    ],
    function(
        Component,
        $,
        ko
    ) {
        'use strict';
        return Component.extend({
            defaults: {
                template: 'Ecommage_ThanhEx2/shipping/customblock'
            },

            initialize: function () {
                var self = this;
                this._super();
            }

        });
    }
);
