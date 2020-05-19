/**
 * Base UI component to render row data as link to other adminhtml routes.
 */
define([
    "Magento_Ui/js/grid/columns/column",
    "mageUtils"
], function (Column, utils) {
    "use strict";


    /**
     * Remove route part from BASE URL (http://.../admin/customer/ => http://.../admin).
     *
     * BASE_URL see at "./module-backend/view/adminhtml/templates/page/js/require_js.phtml"
     */
    const ROOT_URL = function () {
        const length = BASE_URL.length;
        const lastCharOff = BASE_URL.substr(0, length - 1);
        const lastSlashPos = lastCharOff.lastIndexOf('/');
        const result = BASE_URL.substr(0, lastSlashPos);
        return result;
    }();

    return Column.extend({
        defaults: {
            /**
             * Replace idAttrName & route in children.
             */
            /* name of the identification attribute */
            idAttrName: "customerId",
            /* route part to the page */
            route: "/customer/index/edit/id/",
            bodyTmpl: "ui/grid/cells/link"
        },

        /**
         * Returns link to given record.
         *
         * @param {object} record - grid row data.
         * @returns {string}
         */
        getLink: function (record) {
            const id = utils.nested(record, this.idAttrName);
            const result = ROOT_URL + this.route + id;
            return result;
        },

        /**
         * Check if link attribute exists in record.
         *
         * @param {object} record - grid row data.
         * @returns {boolean}
         */
        isLink: function (record) {
            const result = !!utils.nested(record, this.idAttrName);
            return result;
        }
    });
});
