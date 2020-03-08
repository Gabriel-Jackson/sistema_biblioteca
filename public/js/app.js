
$(document).ready(function() {
    $("textarea[data-length!='0']").characterCounter();
    
    M.AutoInit();
    $('.dropdown-trigger').dropdown({
        constrainWidth: false,
        coverTrigger: false
    })
});
        
