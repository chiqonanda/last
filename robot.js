// =============================================
//   CHIQO PORTFOLIO — AI ROBOT COMPANION
//   robot.js — Floating interactive mascot
// =============================================

(function() {
  // ---- Messages dari si Robot ----
  const messages = [
    { text: "Halo! Saya CHIP, asisten virtual Chiqo! 🤖", delay: 2000 },
    { text: "Chiqo jago Vue JS lho, 90%! 🔥", delay: 0 },
    { text: "Klik sertifikat untuk melihat lebih detail! 🏆", delay: 0 },
    { text: "Psst... coba scroll ke bawah, ada yang menarik!", delay: 0 },
    { text: "Chiqo siap berkolaborasi untuk project kamu! 💡", delay: 0 },
    { text: "Mahasiswa Unmul yang passionate developer! 🎓", delay: 0 },
    { text: "Kamu sudah sampai sini, berarti kamu tertarik kan? 😏", delay: 0 },
    { text: "Python, Java, Vue JS — triple combo! ⚡", delay: 0 },
    { text: "Website ini dibuat dengan PHP + MySQL! 🛠️", delay: 0 },
    { text: "Dark mode is the only mode! 🌙", delay: 0 },
  ];

  let msgIndex = 1;
  let isOpen = false;
  let autoTimer = null;

  // ---- Inject HTML ----
  const html = `
    <div id="chip-robot" class="chip-robot">
      <!-- Bubble pesan -->
      <div class="chip-bubble" id="chipBubble">
        <span id="chipMsg">Halo! Saya CHIP, asisten virtual Chiqo! 🤖</span>
        <button class="chip-bubble-close" id="chipBubbleClose">×</button>
      </div>

      <!-- Tombol robot -->
      <button class="chip-btn" id="chipBtn" title="Ngobrol sama CHIP!">
        <div class="chip-body">
          <!-- Kepala robot SVG -->
          <svg class="chip-svg" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
            <!-- Antenna -->
            <line x1="40" y1="6" x2="40" y2="16" stroke="#a78bfa" stroke-width="2.5" stroke-linecap="round"/>
            <circle cx="40" cy="4" r="4" fill="#8b5cf6"/>
            <!-- Head -->
            <rect x="12" y="16" width="56" height="44" rx="14" fill="url(#headGrad)"/>
            <!-- Screen -->
            <rect x="18" y="22" width="44" height="26" rx="8" fill="#0a0f1e"/>
            <!-- Eyes -->
            <circle class="chip-eye-l" cx="30" cy="35" r="6" fill="#7c3aed"/>
            <circle class="chip-eye-r" cx="50" cy="35" r="6" fill="#7c3aed"/>
            <circle cx="30" cy="35" r="3" fill="#a78bfa"/>
            <circle cx="50" cy="35" r="3" fill="#a78bfa"/>
            <!-- Eye shine -->
            <circle cx="31.5" cy="33.5" r="1.5" fill="white" opacity="0.8"/>
            <circle cx="51.5" cy="33.5" r="1.5" fill="white" opacity="0.8"/>
            <!-- Mouth / grin -->
            <path d="M28 44 Q40 50 52 44" stroke="#a78bfa" stroke-width="2" stroke-linecap="round" fill="none"/>
            <!-- Ear bolts -->
            <rect x="7" y="28" width="5" height="10" rx="2.5" fill="#6d28d9"/>
            <rect x="68" y="28" width="5" height="10" rx="2.5" fill="#6d28d9"/>
            <!-- Body -->
            <rect x="20" y="60" width="40" height="16" rx="8" fill="url(#bodyGrad)"/>
            <!-- Chest lights -->
            <circle cx="32" cy="68" r="3" fill="#06b6d4" opacity="0.8"/>
            <circle cx="40" cy="68" r="3" fill="#8b5cf6" opacity="0.8"/>
            <circle cx="48" cy="68" r="3" fill="#14b8a6" opacity="0.8"/>
            <!-- Gradients -->
            <defs>
              <linearGradient id="headGrad" x1="12" y1="16" x2="68" y2="60" gradientUnits="userSpaceOnUse">
                <stop offset="0%" stop-color="#1e1b4b"/>
                <stop offset="100%" stop-color="#2d1b69"/>
              </linearGradient>
              <linearGradient id="bodyGrad" x1="20" y1="60" x2="60" y2="76" gradientUnits="userSpaceOnUse">
                <stop offset="0%" stop-color="#1e1b4b"/>
                <stop offset="100%" stop-color="#3b1f8c"/>
              </linearGradient>
            </defs>
          </svg>
        </div>
        <!-- Pulse ring -->
        <div class="chip-pulse"></div>
        <div class="chip-pulse chip-pulse-2"></div>
      </button>
    </div>
  `;
  document.body.insertAdjacentHTML('beforeend', html);

  // ---- Inject CSS ----
  const css = `
    /* === CHIP ROBOT === */
    #chip-robot {
      position: fixed;
      bottom: 32px;
      right: 32px;
      z-index: 7000;
      display: flex;
      flex-direction: column;
      align-items: flex-end;
      gap: 12px;
    }

    .chip-bubble {
      position: relative;
      background: rgba(8, 13, 26, 0.95);
      border: 1px solid rgba(139,92,246,0.4);
      backdrop-filter: blur(16px);
      border-radius: 16px 16px 4px 16px;
      padding: 14px 36px 14px 16px;
      max-width: 240px;
      min-width: 160px;
      font-family: 'DM Sans', sans-serif;
      font-size: 0.84rem;
      color: #e2e8f0;
      line-height: 1.5;
      box-shadow: 0 8px 32px rgba(124,58,237,0.25);
      animation: bubblePop 0.3s cubic-bezier(0.34,1.56,0.64,1) both;
      opacity: 0;
      pointer-events: none;
      transform-origin: bottom right;
    }
    .chip-bubble.show {
      opacity: 1;
      pointer-events: all;
    }
    @keyframes bubblePop {
      from { opacity: 0; transform: scale(0.6) translateY(10px); }
      to   { opacity: 1; transform: scale(1) translateY(0); }
    }
    .chip-bubble-close {
      position: absolute;
      top: 6px; right: 8px;
      background: none;
      border: none;
      color: #64748b;
      font-size: 16px;
      cursor: pointer;
      line-height: 1;
      padding: 0;
      transition: color 0.2s;
    }
    .chip-bubble-close:hover { color: #a78bfa; }

    /* Arrow pointing down-right */
    .chip-bubble::after {
      content: '';
      position: absolute;
      bottom: -10px; right: 16px;
      border: 5px solid transparent;
      border-top-color: rgba(139,92,246,0.4);
    }
    .chip-bubble::before {
      content: '';
      position: absolute;
      bottom: -8px; right: 17px;
      border: 4px solid transparent;
      border-top-color: rgba(8,13,26,0.95);
      z-index: 1;
    }

    .chip-btn {
      position: relative;
      width: 72px; height: 72px;
      border-radius: 50%;
      background: linear-gradient(135deg, #7c3aed, #a855f7);
      border: none;
      cursor: pointer;
      box-shadow: 0 8px 32px rgba(124,58,237,0.5);
      transition: transform 0.25s cubic-bezier(0.34,1.56,0.64,1), box-shadow 0.25s;
      padding: 0;
      display: flex; align-items: center; justify-content: center;
    }
    .chip-btn:hover {
      transform: scale(1.1) rotate(-5deg);
      box-shadow: 0 12px 40px rgba(124,58,237,0.7);
    }
    .chip-btn:active { transform: scale(0.96); }

    .chip-body { display: flex; align-items: center; justify-content: center; }
    .chip-svg {
      width: 48px; height: 48px;
      filter: drop-shadow(0 0 8px rgba(167,139,250,0.5));
    }

    /* Eye blink animation */
    .chip-eye-l, .chip-eye-r {
      animation: eyeBlink 4s ease-in-out infinite;
    }
    .chip-eye-r { animation-delay: 0.1s; }
    @keyframes eyeBlink {
      0%, 90%, 100% { ry: 6; }
      95% { ry: 1; }
    }

    /* Pulse rings */
    .chip-pulse, .chip-pulse-2 {
      position: absolute;
      inset: -4px;
      border-radius: 50%;
      border: 2px solid rgba(139,92,246,0.5);
      animation: chipPulse 2.5s ease-out infinite;
      pointer-events: none;
    }
    .chip-pulse-2 {
      animation-delay: 1.25s;
      border-color: rgba(6,182,212,0.3);
    }
    @keyframes chipPulse {
      0%   { transform: scale(1); opacity: 1; }
      100% { transform: scale(1.8); opacity: 0; }
    }

    /* Chest lights blink */
    #chip-robot circle[fill="#06b6d4"],
    #chip-robot circle[fill="#8b5cf6"][cy="68"],
    #chip-robot circle[fill="#14b8a6"] {
      animation: chestBlink 1.8s ease-in-out infinite alternate;
    }
    @keyframes chestBlink {
      from { opacity: 0.3; }
      to   { opacity: 1; }
    }

    /* Floating animation for the whole robot */
    #chip-robot {
      animation: chipFloat 3s ease-in-out infinite;
    }
    @keyframes chipFloat {
      0%, 100% { bottom: 32px; }
      50%       { bottom: 40px; }
    }

    /* Label tooltip */
    .chip-btn::before {
      content: 'Ngobrol sama CHIP!';
      position: absolute;
      right: 80px;
      top: 50%;
      transform: translateY(-50%);
      background: rgba(8,13,26,0.9);
      border: 1px solid rgba(139,92,246,0.3);
      color: #e2e8f0;
      font-family: 'DM Sans', sans-serif;
      font-size: 0.75rem;
      padding: 6px 12px;
      border-radius: 8px;
      white-space: nowrap;
      opacity: 0;
      pointer-events: none;
      transition: opacity 0.2s;
    }
    .chip-btn:hover::before { opacity: 1; }

    @media (max-width: 767px) {
      #chip-robot { bottom: 20px; right: 20px; }
      .chip-btn { width: 58px; height: 58px; }
      .chip-svg { width: 38px; height: 38px; }
      .chip-bubble { max-width: 200px; font-size: 0.78rem; }
    }
  `;

  const style = document.createElement('style');
  style.textContent = css;
  document.head.appendChild(style);

  // ---- Logic ----
  const bubble  = document.getElementById('chipBubble');
  const chipBtn = document.getElementById('chipBtn');
  const chipMsg = document.getElementById('chipMsg');
  const closeBtn = document.getElementById('chipBubbleClose');

  function showBubble(text) {
    chipMsg.textContent = text;
    bubble.classList.add('show');
    bubble.style.animation = 'none';
    bubble.offsetHeight; // reflow
    bubble.style.animation = 'bubblePop 0.3s cubic-bezier(0.34,1.56,0.64,1) both';
    clearTimeout(autoTimer);
    autoTimer = setTimeout(hideBubble, 6000);
  }

  function hideBubble() {
    bubble.classList.remove('show');
  }

  // Tampil otomatis saat load
  setTimeout(() => showBubble(messages[0].text), 2000);

  // Klik robot → pesan berikutnya
  chipBtn.addEventListener('click', () => {
    showBubble(messages[msgIndex].text);
    msgIndex = (msgIndex + 1) % messages.length;
  });

  closeBtn.addEventListener('click', (e) => {
    e.stopPropagation();
    hideBubble();
  });

  // Hover section → greeting khusus
  document.querySelectorAll('section[id]').forEach(sec => {
    sec.addEventListener('mouseenter', () => {
      const sectionMsgs = {
        'home':         'Selamat datang di portfolio Chiqo! 👋',
        'about':        'Inilah sosok di balik layar... 🎭',
        'skills':       'Wah, skill-nya mantap-mantap! 💪',
        'certificates': 'Bukti kerja kerasnya ada di sini! 🏅',
        'contact':      'Mau ngobrol? Jangan malu-malu! 📩',
      };
      const msg = sectionMsgs[sec.id];
      if (msg) showBubble(msg);
    });
  });

})();