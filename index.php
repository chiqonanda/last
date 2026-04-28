<?php
include 'conn.php';

$profile = mysqli_query($conn, "SELECT * FROM profile LIMIT 1");
$data = mysqli_fetch_assoc($profile);

$skills = mysqli_query($conn, "SELECT * FROM skills");
$certificates = mysqli_query($conn, "SELECT * FROM certificates");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars($data['name']); ?> — Portfolio</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- CUSTOM CURSOR -->
<div class="cursor-dot" id="cursorDot"></div>
<div class="cursor-ring" id="cursorRing"></div>

<!-- LOADER -->
<div class="page-loader" id="pageLoader">
  <div class="loader-inner">
    <div class="loader-bot">
      <!-- Mini robot di loader -->
      <svg viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg" width="60" height="60">
        <line x1="30" y1="4" x2="30" y2="12" stroke="#a78bfa" stroke-width="2" stroke-linecap="round"/>
        <circle cx="30" cy="3" r="3" fill="#8b5cf6"/>
        <rect x="8" y="12" width="44" height="34" rx="10" fill="#1e1b4b"/>
        <rect x="13" y="17" width="34" height="20" rx="6" fill="#0a0f1e"/>
        <circle class="ld-eye" cx="22" cy="27" r="5" fill="#7c3aed"/>
        <circle cx="22" cy="27" r="2.5" fill="#a78bfa"/>
        <circle class="ld-eye" cx="38" cy="27" r="5" fill="#7c3aed"/>
        <circle cx="38" cy="27" r="2.5" fill="#a78bfa"/>
        <path d="M20 34 Q30 39 40 34" stroke="#a78bfa" stroke-width="1.5" stroke-linecap="round" fill="none"/>
        <rect x="5" y="22" width="3" height="8" rx="1.5" fill="#6d28d9"/>
        <rect x="52" y="22" width="3" height="8" rx="1.5" fill="#6d28d9"/>
        <rect x="14" y="46" width="32" height="12" rx="6" fill="#1e1b4b"/>
        <circle cx="24" cy="52" r="2.5" fill="#06b6d4" opacity="0.9"/>
        <circle cx="30" cy="52" r="2.5" fill="#8b5cf6" opacity="0.9"/>
        <circle cx="36" cy="52" r="2.5" fill="#14b8a6" opacity="0.9"/>
      </svg>
    </div>
    <div class="loader-bar"></div>
    <span class="loader-text">Initializing CHIP...</span>
  </div>
</div>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg fixed-top" id="mainNav">
  <div class="container">
    <a class="navbar-brand" href="#home">
      <span class="brand-bracket">&lt;</span><?php echo htmlspecialchars(explode(' ', $data['name'])[0]); ?><span class="brand-bracket">/&gt;</span>
    </a>
    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#nav" aria-label="Toggle navigation">
      <span class="toggler-icon"></span>
      <span class="toggler-icon"></span>
      <span class="toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="nav">
      <ul class="navbar-nav gap-1">
        <li class="nav-item"><a class="nav-link" href="#home"><span>01.</span> Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#about"><span>02.</span> About</a></li>
        <li class="nav-item"><a class="nav-link" href="#skills"><span>03.</span> Skills</a></li>
        <li class="nav-item"><a class="nav-link" href="#certificates"><span>04.</span> Certificates</a></li>
        <li class="nav-item"><a class="nav-link nav-cta" href="#contact"><span>05.</span> Contact</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- HERO SECTION -->
<section id="home" class="hero-section">
  <div class="hero-bg-grid"></div>
  <div class="hero-orb hero-orb-1"></div>
  <div class="hero-orb hero-orb-2"></div>

  <!-- PARTICLE BACKGROUND -->
  <canvas id="particleCanvas" class="particle-canvas"></canvas>

  <div class="container">
    <div class="row align-items-center min-vh-100">

      <!-- LEFT CONTENT -->
      <div class="col-lg-7 hero-content" data-aos="fade-up">

        <div class="hero-badge">
          <span class="badge-dot"></span>
          Available for projects
        </div>

        <h1 class="hero-title">
          Hi, I'm<br>
          <span class="hero-name">
            <?php echo htmlspecialchars($data['name'] ?? 'Your Name'); ?>
          </span>
        </h1>

        <div class="hero-role">
          <span class="role-prefix">&gt; </span>
          <span id="typedText" class="typed-text"></span>
          <span class="typed-cursor">|</span>
        </div>

        <p class="hero-desc">
          <?php echo htmlspecialchars($data['description'] ?? 'Your description here'); ?>
        </p>

        <div class="hero-actions">
          <a href="#about" class="btn-primary-custom">
            Explore My Work
            <i class="bi bi-arrow-down-right"></i>
          </a>

          <a href="#certificates" class="btn-ghost-custom">
            View Certificates
          </a>
        </div>

        <!-- STATS -->
        <div class="hero-stats">
          <div class="stat-item">
            <span class="stat-number">3+</span>
            <span class="stat-label">Certificates</span>
          </div>

          <div class="stat-divider"></div>

          <div class="stat-item">
            <span class="stat-number">3+</span>
            <span class="stat-label">Tech Skills</span>
          </div>

          <div class="stat-divider"></div>

          <div class="stat-item">
            <span class="stat-number">2026</span>
            <span class="stat-label">Batch</span>
          </div>
        </div>

      </div>

      <!-- RIGHT IMAGE -->
      <div class="col-lg-5 hero-image-wrap" data-aos="fade-left" data-aos-delay="200">

        <div class="profile-frame">

          <!-- RINGS -->
          <div class="profile-ring"></div>
          <div class="profile-ring-2"></div>


          <!-- PROFILE IMAGE -->
          <img 
            src="assets/<?php echo htmlspecialchars($data['image'] ?? 'default.jpg'); ?>" 
            class="profile-photo"
            alt="<?php echo htmlspecialchars($data['name'] ?? 'Profile'); ?>"
            loading="lazy"
          >

          <!-- BADGE -->
          <div class="profile-badge-card">
            <i class="bi bi-code-slash"></i>
            <span>Full Stack Dev</span>
          </div>

          <!-- FLOATING TECH ICONS -->
          <div class="floating-icons" aria-hidden="true">
            <div class="fi fi-1"><i class="bi bi-filetype-py"></i></div>
            <div class="fi fi-2"><i class="bi bi-filetype-js"></i></div>
            <div class="fi fi-3"><i class="bi bi-database-fill"></i></div>
            <div class="fi fi-4"><i class="bi bi-code-slash"></i></div>
            <div class="fi fi-5"><i class="bi bi-triangle-fill"></i></div>
            <div class="fi fi-6"><i class="bi bi-cpu-fill"></i></div>
            <div class="fi fi-7"><i class="bi bi-cloud-fill"></i></div>
            <div class="fi fi-8"><i class="bi bi-terminal-fill"></i></div>
          </div>

          <!-- MINI CHIP -->
          <div class="mini-chip-badge">
            <svg viewBox="0 0 36 36" width="28" height="28" fill="none">
              <line x1="18" y1="2" x2="18" y2="7" stroke="#a78bfa" stroke-width="1.5" stroke-linecap="round"/>
              <circle cx="18" cy="2" r="2" fill="#8b5cf6"/>
              <rect x="4" y="7" width="28" height="22" rx="7" fill="#1e1b4b"/>
              <rect x="8" y="11" width="20" height="13" rx="4" fill="#0a0f1e"/>
              <circle cx="13" cy="17.5" r="3.5" fill="#7c3aed"/>
              <circle cx="13" cy="17.5" r="1.5" fill="#a78bfa"/>
              <circle cx="23" cy="17.5" r="3.5" fill="#7c3aed"/>
              <circle cx="23" cy="17.5" r="1.5" fill="#a78bfa"/>
              <path d="M11 22 Q18 26 25 22" stroke="#a78bfa" stroke-width="1" fill="none"/>
              <rect x="2" y="14" width="2" height="6" rx="1" fill="#6d28d9"/>
              <rect x="32" y="14" width="2" height="6" rx="1" fill="#6d28d9"/>
            </svg>
            <span>CHIP</span>
          </div>

        </div>

      </div>
      

    </div>
  </div>

  <div class="scroll-indicator">
    <div class="scroll-line"></div>
    <span>Scroll</span>
  </div>
</section>

<!-- ABOUT SECTION -->
<section id="about" class="section-pad">
  <div class="container">

    <div class="section-header" data-aos="fade-up">
      <span class="section-tag">// about me</span>
      <h2 class="section-title">Who I Am</h2>
    </div>

    <div class="row align-items-center g-5 mt-2">
      <div class="col-lg-5" data-aos="fade-right">
        <div class="about-card-wrap">
          <div class="about-main-card">
            <div class="card-label">Student</div>
            <div class="card-uni">
              <i class="bi bi-mortarboard-fill"></i>
              Universitas Mulawarman
            </div>
            <div class="card-major">Sistem Informasi</div>
            <div class="card-year">2024 – Present</div>
            <div class="card-divider"></div>
            <div class="card-nim">NIM: 2409116046</div>
          </div>
          <div class="about-accent-card">
            <i class="bi bi-lightning-charge-fill"></i>
            <span>Passionate Developer</span>
          </div>
        </div>
      </div>

      <div class="col-lg-7" data-aos="fade-left">
        <p class="about-text"><?php echo nl2br(htmlspecialchars($data['about'])); ?></p>

        <div class="about-tags">
          <span class="tag"><i class="bi bi-globe2"></i> Web Development</span>
          <span class="tag"><i class="bi bi-database"></i> Database</span>
          <span class="tag"><i class="bi bi-phone"></i> Mobile</span>
          <span class="tag"><i class="bi bi-cpu"></i> Backend</span>
          <span class="tag"><i class="bi bi-palette"></i> UI/UX</span>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- SKILLS SECTION -->
<section id="skills" class="section-pad skills-section">
  <div class="skills-bg-blur"></div>
  <div class="container">

    <div class="section-header" data-aos="fade-up">
      <span class="section-tag">// technical skills</span>
      <h2 class="section-title">What I Know</h2>
    </div>

    <div class="skills-grid mt-5">
      <?php 
      $skillIcons = [
        'Python'  => 'bi-filetype-py',
        'Java'    => 'bi-cup-hot-fill',
        'Vue JS'  => 'bi-triangle-fill',
        'PHP'     => 'bi-code-slash',
        'MySQL'   => 'bi-database-fill',
        'HTML'    => 'bi-filetype-html',
        'CSS'     => 'bi-filetype-css',
        'JS'      => 'bi-filetype-js',
        'React'   => 'bi-arrow-repeat',
      ];
      while($skill = mysqli_fetch_assoc($skills)): 
        $icon = $skillIcons[$skill['name']] ?? 'bi-code-square';
        $level = (int)$skill['level'];
      ?>
      <div class="skill-card" data-aos="fade-up">
        <div class="skill-header">
          <div class="skill-icon">
            <i class="bi <?php echo $icon; ?>"></i>
          </div>
          <div class="skill-info">
            <span class="skill-name"><?php echo htmlspecialchars($skill['name']); ?></span>
            <span class="skill-level"><?php echo $level; ?>%</span>
          </div>
        </div>
        <div class="skill-bar-wrap">
          <div class="skill-bar" data-width="<?php echo $level; ?>">
            <div class="skill-bar-fill"></div>
          </div>
        </div>
        <div class="skill-grade">
          <?php
            if($level >= 85) echo '<span class="grade grade-expert">Expert</span>';
            elseif($level >= 70) echo '<span class="grade grade-advanced">Advanced</span>';
            else echo '<span class="grade grade-mid">Intermediate</span>';
          ?>
        </div>
      </div>
      <?php endwhile; ?>
    </div>

  </div>
</section>

<!-- CERTIFICATES SECTION -->
<section id="certificates" class="section-pad">
  <div class="container">

    <div class="section-header" data-aos="fade-up">
      <span class="section-tag">// achievements</span>
      <h2 class="section-title">Certificates</h2>
    </div>

    <div class="row g-4 mt-3">
      <?php 
      $certColors = ['cert-blue', 'cert-purple', 'cert-teal'];
      $i = 0;
      while($cert = mysqli_fetch_assoc($certificates)): 
        $colorClass = $certColors[$i % count($certColors)];
        $i++;
      ?>
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?php echo ($i-1)*100; ?>">
        <div class="cert-card <?php echo $colorClass; ?>" onclick="openLightbox('assets/<?php echo htmlspecialchars($cert['image']); ?>', '<?php echo htmlspecialchars($cert['title']); ?>')">
          <div class="cert-img-wrap">
            <img src="assets/<?php echo htmlspecialchars($cert['image']); ?>" 
                 class="cert-img" 
                 alt="<?php echo htmlspecialchars($cert['title']); ?>">
            <div class="cert-overlay">
              <i class="bi bi-zoom-in"></i>
              <span>View Certificate</span>
            </div>
          </div>
          <div class="cert-body">
            <div class="cert-issuer">
              <i class="bi bi-patch-check-fill"></i>
              <?php echo htmlspecialchars($cert['issuer']); ?>
            </div>
            <h5 class="cert-title"><?php echo htmlspecialchars($cert['title']); ?></h5>
          </div>
        </div>
      </div>
      <?php endwhile; ?>
    </div>

  </div>
</section>

<!-- CONTACT SECTION -->
<section id="contact" class="section-pad contact-section">
  <div class="contact-orb"></div>
  <div class="container">
    <div class="contact-inner" data-aos="fade-up">
      <span class="section-tag">// get in touch</span>
      <h2 class="contact-title">Let's Work Together</h2>
      <p class="contact-desc">Tertarik berkolaborasi atau punya pertanyaan? Feel free to reach out!</p>
      <a href="mailto:chiqo@email.com" class="btn-primary-custom btn-lg-custom">
        Say Hello <i class="bi bi-send-fill"></i>
      </a>
    </div>
  </div>
</section>

<!-- FOOTER -->
<footer class="site-footer">
  <div class="container">
    <div class="footer-inner">
      <span class="footer-brand">&lt;<?php echo htmlspecialchars(explode(' ', $data['name'])[0]); ?>/&gt;</span>
      <span class="footer-copy">© <?php echo date('Y'); ?> <?php echo htmlspecialchars($data['name']); ?>. Crafted with passion.</span>
      <div class="footer-links">
        <a href="#home"><i class="bi bi-arrow-up-circle"></i></a>
      </div>
    </div>
  </div>
</footer>

<!-- LIGHTBOX -->
<div class="lightbox-overlay" id="lightboxOverlay" onclick="closeLightbox()">
  <div class="lightbox-content" onclick="event.stopPropagation()">
    <button class="lightbox-close" onclick="closeLightbox()"><i class="bi bi-x-lg"></i></button>
    <img src="" id="lightboxImg" alt="Certificate">
    <p id="lightboxTitle"></p>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
  // AOS Init
  AOS.init({ duration: 700, once: true, offset: 80 });

  // Page Loader
  window.addEventListener('load', () => {
    setTimeout(() => {
      document.getElementById('pageLoader').classList.add('loaded');
    }, 1200);
  });

  // Custom Cursor
  const dot = document.getElementById('cursorDot');
  const ring = document.getElementById('cursorRing');
  let mouseX = 0, mouseY = 0, ringX = 0, ringY = 0;

  document.addEventListener('mousemove', e => {
    mouseX = e.clientX; mouseY = e.clientY;
    dot.style.transform = `translate(${mouseX}px, ${mouseY}px)`;
  });

  function animateRing() {
    ringX += (mouseX - ringX) * 0.12;
    ringY += (mouseY - ringY) * 0.12;
    ring.style.transform = `translate(${ringX}px, ${ringY}px)`;
    requestAnimationFrame(animateRing);
  }
  animateRing();

  document.querySelectorAll('a, button, .cert-card, .skill-card').forEach(el => {
    el.addEventListener('mouseenter', () => ring.classList.add('cursor-hover'));
    el.addEventListener('mouseleave', () => ring.classList.remove('cursor-hover'));
  });

  // Typed Text
  const roles = ['Full Stack Developer', 'Web Enthusiast', 'Sistem Informasi Student', 'Problem Solver'];
  let roleIdx = 0, charIdx = 0, deleting = false;
  const typedEl = document.getElementById('typedText');

  function typeLoop() {
    const current = roles[roleIdx];
    if (!deleting) {
      typedEl.textContent = current.slice(0, ++charIdx);
      if (charIdx === current.length) { deleting = true; setTimeout(typeLoop, 1800); return; }
    } else {
      typedEl.textContent = current.slice(0, --charIdx);
      if (charIdx === 0) { deleting = false; roleIdx = (roleIdx + 1) % roles.length; }
    }
    setTimeout(typeLoop, deleting ? 45 : 80);
  }
  typeLoop();

  // Navbar Scroll
  const nav = document.getElementById('mainNav');
  window.addEventListener('scroll', () => {
    nav.classList.toggle('nav-scrolled', window.scrollY > 50);
  });

  // Skill Bar Animation
  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const bar = entry.target;
        const fill = bar.querySelector('.skill-bar-fill');
        fill.style.width = bar.dataset.width + '%';
        observer.unobserve(bar);
      }
    });
  }, { threshold: 0.3 });

  document.querySelectorAll('.skill-bar').forEach(bar => observer.observe(bar));

  // Lightbox
  function openLightbox(src, title) {
    document.getElementById('lightboxImg').src = src;
    document.getElementById('lightboxTitle').textContent = title;
    document.getElementById('lightboxOverlay').classList.add('active');
    document.body.style.overflow = 'hidden';
  }
  function closeLightbox() {
    document.getElementById('lightboxOverlay').classList.remove('active');
    document.body.style.overflow = '';
  }
  document.addEventListener('keydown', e => { if (e.key === 'Escape') closeLightbox(); });

  // Active nav link on scroll
  const sections = document.querySelectorAll('section[id]');
  window.addEventListener('scroll', () => {
    let current = '';
    sections.forEach(s => {
      if (window.scrollY >= s.offsetTop - 100) current = s.getAttribute('id');
    });
    document.querySelectorAll('.nav-link').forEach(a => {
      a.classList.toggle('active', a.getAttribute('href') === '#' + current);
    });
  });

  // =============================================
  //  PARTICLE STARS CANVAS
  // =============================================
  (function() {
    const canvas = document.getElementById('particleCanvas');
    if (!canvas) return;
    const ctx = canvas.getContext('2d');
    let particles = [];
    let W, H;

    function resize() {
      const hero = document.getElementById('home');
      W = canvas.width  = hero.offsetWidth;
      H = canvas.height = hero.offsetHeight;
    }

    function Particle() {
      this.reset();
    }
    Particle.prototype.reset = function() {
      this.x = Math.random() * W;
      this.y = Math.random() * H;
      this.r = Math.random() * 1.6 + 0.3;
      this.alpha = Math.random() * 0.5 + 0.1;
      this.speed = Math.random() * 0.3 + 0.05;
      this.dir   = Math.random() * Math.PI * 2;
      this.twinkle = Math.random() * 0.02 + 0.005;
      this.twinkleDir = 1;
    };
    Particle.prototype.update = function() {
      this.x += Math.cos(this.dir) * this.speed;
      this.y += Math.sin(this.dir) * this.speed;
      this.alpha += this.twinkle * this.twinkleDir;
      if (this.alpha > 0.65 || this.alpha < 0.05) this.twinkleDir *= -1;
      if (this.x < 0 || this.x > W || this.y < 0 || this.y > H) this.reset();
    };
    Particle.prototype.draw = function() {
      ctx.beginPath();
      ctx.arc(this.x, this.y, this.r, 0, Math.PI * 2);
      ctx.fillStyle = `rgba(167,139,250,${this.alpha})`;
      ctx.fill();
    };

    function initParticles(n) {
      particles = [];
      for (let i = 0; i < n; i++) particles.push(new Particle());
    }

    function loop() {
      ctx.clearRect(0, 0, W, H);
      // Draw connection lines between close particles
      for (let i = 0; i < particles.length; i++) {
        for (let j = i + 1; j < particles.length; j++) {
          const dx = particles[i].x - particles[j].x;
          const dy = particles[i].y - particles[j].y;
          const dist = Math.sqrt(dx*dx + dy*dy);
          if (dist < 90) {
            ctx.beginPath();
            ctx.moveTo(particles[i].x, particles[i].y);
            ctx.lineTo(particles[j].x, particles[j].y);
            ctx.strokeStyle = `rgba(139,92,246,${0.12 * (1 - dist/90)})`;
            ctx.lineWidth = 0.5;
            ctx.stroke();
          }
        }
      }
      particles.forEach(p => { p.update(); p.draw(); });
      requestAnimationFrame(loop);
    }

    resize();
    initParticles(90);
    loop();
    window.addEventListener('resize', () => { resize(); });
  })();
</script>

<!-- CHIP Robot Companion -->
<script src="robot.js"></script>
</body>
</html>