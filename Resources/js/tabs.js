function pageLoad() {
    $(document).ready(function() {
  
      var tabCookieName = "ui-tabs-1"; //cookie name
      var location = $.cookie(tabCookieName); //take tab's href
  
      if (location) {
        $('#Tabs a[href="' + location + '"]').tab('show'); //activate tab
      }
  
      $('#Tabs a').click(function(e) {
        e.preventDefault()
        $(this).tab('show')
      })
  
      //when content is alredy shown - event activate 
      $('#Tabs a').on('shown.bs.tab', function(e) {
        location = e.target.hash; // take current href
        $.cookie(tabCookieName, location, {
          path: '/'
        }); //write href in cookie
      })
    });
  };