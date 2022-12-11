<!DOCTYPE html>
<html>
<head>

 <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
     
                          <script>
$(document).ready(function(){
    id = window.location.search.substr(10);
    obj = { "limit":id };
dbParam = JSON.stringify(obj);
setInterval(function(){
$("#data").load('data.php')
}, 1000);
});
</script>
</head>
<body>

<p id='data'>
</body>
</html>
