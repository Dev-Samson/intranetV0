$(document).ready(function(){
    
    function linkedin()
    {
        IN.UI.Authorize().place();
        IN.Event.on(IN, "auth", onLinkedInAuth); 
    }
    
    function onLinkedInAuth(){
        console.log("auth");
        $.post('https://localhost:82/hrinsight/web/app_dev.php/test2');
    }
    
    $(".reseauxsociaux li label").on('click',function(){
       var check = $(this).find(".icheckbox_minimal").attr('aria-checked');
       var reseau = $(this).find("input").val();
       if(check)
       {
           if(reseau=="linkedin")
               linkedin();
       }
    });
});