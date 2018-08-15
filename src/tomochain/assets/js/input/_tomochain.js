'use strict'

var tomochain

(
    function() {
        tomochain = (
            function () {
                return {
                    init: function () {
                        this.langSwitcher();
                        this.mainMenu();
                        this.mobileMenu();
                        this.utils();
                    }
                }
            }()
        )
    }
)(jQuery);
//@include('lang-switcher.js')
//@include('main-menu.js')
//@include('mobile-menu.js')
//@include('utils.js')
jQuery (document).ready(function() {
    tomochain.init()
})