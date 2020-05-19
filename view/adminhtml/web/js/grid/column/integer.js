/**
 * UI component to render cell data as an integer number.
 *
 * Based on "./magento/module-ui/view/base/web/js/grid/columns/column.js"
 */
define([
    "Magento_Ui/js/grid/columns/column"
], function (Column) {
    "use strict";
    /**
     * Magento UI component based on "Column":
     */
    return Column.extend({
        defaults: {
            bodyTmpl: "Flancer32_Base/grid/cells/number",
        }
    });
});
