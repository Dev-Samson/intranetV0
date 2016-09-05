$(document).ready(function() {
    
    $(".demo1").bootstrapNews({
        newsPerPage: 8,
        autoplay: true,
        navigation: false,
        pauseOnHover: true,
        direction: 'up',
        newsTickerInterval: 5000,
        onToDo: function() {
        }
    });
});


