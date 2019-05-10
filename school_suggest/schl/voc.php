<!DOCTYPE html>
<html>
<head>
  <title>Voice assistant</title>
  <style>
  .speech {border: 1px solid #DDD; width: 300px; padding: 0; margin: 0}
  .speech input {border: 0; width: 240px; display: inline-block; height: 30px;}
  .speech img {float: right; width: 40px; height: 30px }
</style>
</head>
<body>

<!-- Search Form -->
<form id="labnol" method="POST" >
  <div class="speech">
    <input type="text" name="spoken" id="transcript" placeholder="Speak" />
    <img onclick="startDictation()" src="mic.png" />
    
  </div>
  <br>
  <button class="btn btn-lg btn-primary btn-block" type="submit" name="search">Search</button>
</form>

<!-- HTML5 Speech Recognition API -->
<script>
  function startDictation() {

    if (window.hasOwnProperty('webkitSpeechRecognition')) {

      var recognition = new webkitSpeechRecognition();

      recognition.continuous = false;
      recognition.interimResults = false;

      recognition.lang = "en-US";
      recognition.start();

      recognition.onresult = function(e) {
        document.getElementById('transcript').value
                                 = e.results[0][0].transcript;
        recognition.stop();
        //document.getElementById('labnol').submit();
      };

      recognition.onerror = function(e) {
        recognition.stop();
      }

    }
  }
</script>


</body>
</html>

<?php 
IF(isset($_POST['search']))

{
  $spk=$_POST['spoken'];
  if($spk=='add student'){

 //echo "<script language=\"javascript\">alert(\"welcome \");document.location.href='t.php';</script>";
  header('location:add_student.php');
}

elseif ($spk=='home') {
  header('location:school_menu.php');
}

elseif ($spk=='all students') {
  header('location:school_students.php');
}

elseif ($spk=='update marks') {
  header('location:update_marks.php');
}
else
{

 echo "<script language=\"javascript\">alert(\"please search correctly \");document.location.href='voc.php';</script>";
}
}


?>