<body>
  <div class="wrapper none" id="wrapper3">
    <section class="chat-area">
      <header>
        <?php
        include_once "../muebleria/chat/model/config.php";
        $user_id = mysqli_real_escape_string($conn,'858696368');
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
        if (mysqli_num_rows($sql) > 0) {
          $row = mysqli_fetch_assoc($sql);
        } else {
          header("location: usuarios.php");
        }
        ?>
        <a href="usuarios.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <img src="../muebleria/chat/model/images/<?php echo $row['img']?>"alt="">
        <div class="details">
          <span><?php echo $row['fname'] . " " . $row['lname'] ?></span>
          <p><?php echo $row['status']." ".$row['img']; ?></p>
        </div>

      </header>
      <div class="chat-box">

      </div>
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Escribe un mensaje aquí ..." autocomplete="off">
        <button><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>

  <script src="../muebleria/chat/js/chat.js"></script>

</body>

</html>