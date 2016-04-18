/* common.js
 * ================
 * Common module jquery code.
 *
 * @author  Krishna Prasad Timilsina <bikranshu.t@gmail.com>
 * @version 1.0
 */
var blog = blog || {};

;(function ($common) {
    "use strict";

    /**
     * project base url
     */
    $common.getBaseUrl = function () {
        var baseUrl = location.protocol + "//" + location.host + "/";
        return baseUrl;
    };

    /**
     * format date
     * @param {string} date
     */
    $common.formatDate = function (date) {
        var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();

        if (month.length < 2)
            month = '0' + month;
        if (day.length < 2)
            day = '0' + day;

        return [year, month, day].join('-');
    };

    $common.serializeObject = function ()
    {
        var o = {};
        var a = this.serializeArray();
        $.each(a, function () {
            if (o[this.name] !== undefined) {
                if (!o[this.name].push) {
                    o[this.name] = [o[this.name]];
                }
                o[this.name].push(this.value || '');
            } else {
                o[this.name] = this.value || '';
            }
        });
        return o;
    };


})(blog.common = blog.common || {});

/**
 * Add bootstrap style 
 * @param {object} tableObject
 */
function searchAddBootstrapClass(tableObject) {
    var searchBox = $(tableObject).closest('.dataTables_wrapper').find('div[id$=_filter] input');
    searchBox.wrap('<div class="input-group"></div>');
    searchBox.attr('placeholder', 'Search');
    searchBox.removeClass('input-sm');
    searchBox.addClass('form-control');
    searchBox.css('width', '250px');
    searchBox.after('<span class="input-group-addon"><i class="fa fa-search"></i></span>');
}

/**
 * Add bootstrap style 
 * 
 */
function yadcfAddBootstrapClass() {
    var filterInput = $('.yadcf-filter, .yadcf-filter-range, .yadcf-filter-date');
    filterInput.addClass('form-control');
}

