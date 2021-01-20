<html>
  <head>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script> 
    <script language="javascript" type="text/javascript" src="jquery.js"></script>
  </head>
  <body>

  <!-------------------------------------------------------------------------
  1) Create some html content that can be accessed by jquery
  -------------------------------------------------------------------------->
  <h2> Client example </h2>
  <h3>Output: </h3>
  <div id="output">this element will be accessed by jquery and this text replaced</div>

  <script id="source" language="javascript" type="text/javascript">

  $(function () 
  {
    //-----------------------------------------------------------------------
    // 2) Send a http request with AJAX http://api.jquery.com/jQuery.ajax/
    //-----------------------------------------------------------------------
    $.ajax({                                      
      url: 'api.php',                  //the script to call to get data          
      data: "",                        //you can insert url argumnets here to pass to api.php
                                       //for example "id=5&parent=6"
      dataType: 'json',                //data format      
      success: function(rows)          //on recieve of reply
      {
        for (var i in rows)
      {
      var row = rows[i];          

      var id_merek = row[0];
      var nama_merek = row[1];
      $('#output').append("<b>id: </b>"+id_merek+"<b> name: </b>"+nama_merek)
                  .append("<hr />");
      }
    }
    });
  }); 

  </script>
  </body>
</html>