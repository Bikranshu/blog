/* tinyImpl.js
 * ================
 * Tinymce module jquery code.
 *
 * @author  Krishna Prasad Timilsina <bikranshu.t@gmail.com>
 * @version 1.0
 */
;(function () {
    "use strict";

    tinymce.init({
        selector: "textarea",
        plugins: ["anchor", "searchreplace code fullscreen", "insertdatetime table contextmenu paste"],
        toolbar: "bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent",
        setup: function (ed) {
            ed.on('change', function (e) {

                $(".tinymce").text(ed.getContent());
            });
        }
    });

})();