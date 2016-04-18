/* postList.js
 * ================
 * Post List module jquery code.
 *
 * @author  Krishna Prasad Timilsina <bikranshu.t@gmail.com>
 * @version 1.0
 */
var eTable;
;(function () {
    "use strict";

    eTable = $("#post").dataTable({
        "oLanguage": {"sSearch": ""},
        "aaSorting": [[1, "desc"]],
        "aoColumnDefs": [
            {'bSortable': false, 'aTargets': [0, 5]}
        ]
    });

    searchAddBootstrapClass(eTable);

})();