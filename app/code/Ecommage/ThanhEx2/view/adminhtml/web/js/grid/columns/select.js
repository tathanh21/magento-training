define([
    'underscore',
    'Magento_Ui/js/grid/columns/select'
], function (_, Column) {
    'use strict';

    return Column.extend({
        defaults: {
            bodyTmpl: 'Ecommage_ThanhEx2/ui/grid/cells/text'

        },
        getStatusColor: function (row) {
            if (row.status === '1') {
                return '#FFA07A';
            }else if (row.status === '2') {
                return '#fff70c';
            }
            return '#90EE90';
        }
    });
});
