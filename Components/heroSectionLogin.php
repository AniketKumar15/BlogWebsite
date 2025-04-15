<main>
  <!-- Hero Section -->
  <section class="hero">
    <div class="hero-content">
      <h1><span>Think</span> <br> <span class="green-text">Code & Blog</span></h1>
      <p>A place to read, write, and Share your coding stories</p>
      <?php if (!isset($_SESSION['username'])): ?>
        <div class="readBtn">
          <a onclick="openModal()">Start Reading</a>
        </div>
      <?php else: ?>
        <div class="readBtn">
          <a href="blogpage.php">Start Reading</a>
        </div>
      <?php endif; ?>
    </div>
    <div class="heroImg">
      <img src="./img/heroImg.png" alt="">
    </div>
  </section>
</main>