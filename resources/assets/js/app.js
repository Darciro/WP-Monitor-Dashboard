
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

(function ($) {
    $(document).ready(function () {

        $(document).ready(function() {
            app.init();
        });

        var app = {
            init: function() {
                this.utils();
            },

            utils: function () {
                $('[data-toggle="tooltip"]').tooltip();
            }
        }

    });
})(jQuery);