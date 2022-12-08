
<?php

if(isset($_POST["q"]))
{?>
<br><br>
    <form action="paid.php" class="login" method="post">
    <div class="field">
      <input type="text" placeholder="Name on card" name="cardName" required />
    </div>
    <div class="field">
      <input type="text" placeholder="cardNum" name="cardNum" required />
    </div>
    <div class="field">
      <input type="text" placeholder="Expiry" name="exp" required />
    </div>
    <div class="field">
      <input type="text" placeholder="cvv" name="cvv  " required />
    </div>
    <div class="field btn">
      <div class="btn-layer"></div>
      <input type="submit" name="pay" value="Pay" />
    </div>
  </form>

<?php


}




?>
