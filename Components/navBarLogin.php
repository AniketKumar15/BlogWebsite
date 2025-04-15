<?php session_start(); ?>

<body>
  <nav class="navbar">
    <div class="leftSide">
      <div class="Logo-Container">
        <img src="./Img/Logo.png" alt="Logo">
        <p>Blogorithm</p>
      </div>
    </div>
    <div class="rightSide">
      <div class="login-container">
        <?php if (!isset($_SESSION['username'])): ?>
          <!-- Not logged in -->
          <button onclick="openModal()">Login</button>
        <?php else: ?>
          <!-- Logged in -->
          <div class="user-info" style="display: flex; align-items: center; gap: 10px;">
            <img src="./Img/Logo.png" alt="Avatar" style="width: 30px; height: 30px; border-radius: 50%;">
            <span><?php echo htmlspecialchars($_SESSION['username']); ?></span>
            <a href="./logout.php">Logout</a>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </nav>
</body>