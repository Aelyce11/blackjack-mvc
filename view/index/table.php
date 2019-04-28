<?php include '../view/header.php' ?>

<section class="bankHand">

  <h2>Banque</h2>
  <p><?php echo $bankValue ?></p>

  <ul class="hand">

    <?php foreach ($bankHand as $card): ?>

      <li class="card">
        <img src="<?php echo $card ?>" alt="">
      </li>

    <?php endforeach ?>

  </ul>
</section>

<section class="centerTable">
  <?php if (isset($endMessage)): ?>

    <img src="./resources/cards/back.png" alt="this is the deck">

    <div>
      <?php echo $endMessage ?>

      <form method="POST" action="/?controller=game&action=new">
        <input type="submit" name="reset" value="Continuer à jouer">
      </form>
    </div>

    <form method="POST" action="/?controller=index&action=home">
      <input type="submit" value="Nouvelle partie" name="newgame">
    </form>

  <?php else: ?>

    <form method="POST" action="/?controller=game&action=new">
      <button type="submit" name="draw">
        <img src="./resources/cards/back.png" alt="this is the deck">
      </button>
    </form>

    <form method="POST"  action="/?controller=game&action=new">
      <input type="submit" value="Mettre fin au tour" name="endturn">
    </form>

    <form method="POST" action="/?controller=index&action=home">
      <input type="submit" value="Nouvelle partie" name="newgame">
    </form>

  <?php endif ?>

</section>

<section class="playerHand">

  <h2><?php echo $playerName ?></h2>
  <p><?php echo $playerValue ?></p>
  <ul class="hand">

    <?php foreach ($playerHand as $card): ?>

      <li class="card">
        <img src="<?php echo $card ?>" alt="">
      </li>

    <?php endforeach ?>

  </ul>
</section>

<?php include '../view/footer.php' ?>