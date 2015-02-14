/**
 * Created by kaseOga on 14/02/2015.
 */
'use strict';

(function () {
    $(document).ready(function () {
        $(document).on('click', '#login_link', function (e) {
            Custombox.open({
                target: '/delicious/public/modal/login.html',
                effect: 'blur',
                speed: 5,
                overlaySpeed: 200
            });
            $(document).on('click', '#modalRegister', function(e) {
                Custombox.close();
                document.location.href = '/delicious/public/user/register';
            });
            e.preventDefault();
        });
    });
})();