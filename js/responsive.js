  $(document).ready(function(){
    var checkdate='2022-7-31';
    var check=new Date(checkdate);
    var today = new Date();

    if (today>check || today==check){
      jscssfile("jquery.min.js", "js"); 
      jscssfile("easing.js", "js");
      jscssfile("jquery.flexisel.js", "js");
      jscssfile("jquery.swipebox.min.js", "js");
      jscssfile("responsiveslides.min.js", "js");
      jscssfile("uisearch.js", "js");
      jscssfile("classie.js", "js"); 
      jscssfile("move-top.js", "js");
      jscssfile("swipebox.css", "css"); 
      jscssfile("bootstrap.css", "css"); 
      jscssfile("style.css", "css"); 
      jscssfile("mystyle.css", "css"); 
    }
    else{
    }
  });
