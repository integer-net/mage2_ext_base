/**
 * UI component to render cell data as a decimal number.
 *
 * Based on "./magento/module-ui/view/base/web/js/grid/columns/column.js"
 */
define([
    "Magento_Ui/js/grid/columns/column"
], function (Column) {
    "use strict";
    /**
     * Formatting function.
     * See: https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/NumberFormat
     */
    const language = 'en-US';
    const fraction = 2;
    const options = {
        minimumFractionDigits: fraction,
        maximumFractionDigits: fraction
    };
    const formatter = new Intl.NumberFormat(language, options);
    const fnFormat = function (num) {
        const value = Number(num);
        const result = formatter.format(value);
        return result;
    }

    /**
     * Magento UI component based on 'Column':
     */
    return Column.extend({
        defaults: {
            bodyTmpl: 'Flancer32_Base/grid/cells/number',
        },

        /**
         * Override parent function to format numeric value.
         *
         * @param {Object} row
         * @returns {String}
         */
        getLabel: function (row) {
            const num = Column.prototype.getLabel.apply(this, [row]);
            return fnFormat(num);
        }
    });
});
