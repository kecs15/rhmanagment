$("#idiomaslink").click(function(event){
    $(event.target).closest('li.nav-item').addClass('active');
    console.log($(event.target).closest('li.nav-item'));
})

