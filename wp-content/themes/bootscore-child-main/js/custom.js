jQuery(function ($) {

    setTimeout(function() {
        

        if (getCookie("modalShow") != "1"){
            $('#myModal').modal('show');
            setCookie("modalShow","1", 7);
        }
        
        function setCookie(strName, strValue, expireDays) {
            var d = new Date();
            d.setTime(d.getTime() + (expireDays * 604800000));
            var expires = "expires=" + d.toGMTString();
            document.cookie = strName + "=" + strValue + "; " + expires + "; path=/";
        }
        
        function getCookie(strName) {
            var name = strName + "=";
            var ca = document.cookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i].trim();
                if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
            }
            return "";
        }



    }, 30000);
    
    $('.close').click(function(){
        $('#myModal').modal('hide');
    });

    

}); // jQuery End