

  // Initialize collapsible (uncomment the lines below if you use the dropdown variation)
  // var collapsibleElem = document.querySelector('.collapsible');
  // var collapsibleInstance = M.Collapsible.init(collapsibleElem, options);

  // Or with jQuery

 
  
  $('#mine').click(function() {
   console.log("here")
});
  $(document).ready(function(){
    
    $('.sidenav').sidenav();
    $('select').formSelect();
    $('.modal').modal();
    $('.tabs').tabs({

    });
    $('.datepicker').datepicker();
    document.querySelector('.tabs-content.carousel').style.height = window.innerHeight + "px";
  });
       
 