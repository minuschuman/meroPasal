<!-- <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script type="text/javascript">

    </script>
  </head>
  <body>

  </body>

</html> -->


<script type="text/javascript">
    function ShowHideDiv() {
        var chkYes = document.getElementById("chkYes");
        var dvPassport = document.getElementById("dvPassport");
        dvPassport.style.display = chkYes.checked ? "block" : "none";
    }
</script>
<span>Do you have Passport?</span>
<label for="chkYes">
    <input type="radio" id="chkYes" name="chkPassPort" onclick="ShowHideDiv()" />
    Yes
</label>
<label for="chkNo">
    <input type="radio" id="chkNo" name="chkPassPort" onclick="ShowHideDiv()" />
    No
</label>
<hr />
<div id="dvPassport" style="display: none">
    Passport Number:
    <input type="text" id="txtPassportNumber" />
</div>
