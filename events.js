window.onload = function () {
    var loginform = document.getElementById('formitself');
    var formsubmit = document.getElementById('formsubmit');
    //formsubmit.addEventListener('click', loginForm.submit());
    /*
        formitself.onsubmit = function () {
            window.location.reload();
            location.href = 'index.php';
            return false;
        }
    */
    var quipform = document.getElementById('quipform');
    var submitquip = document.getElementById('submitquip');
    /*
    if ( submitquip ) {
        submitquip.addEventListener('click', quipform.submit());
        }
        */
    if (quipform) {
    quipform.onsubmit = function () {
        var userid = document.getElementById('useridhidden').innerHTML; 
        postquip(userid);
    }
    }

} 
