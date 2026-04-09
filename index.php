!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Randevu Takvimi | Salon Kayıt Cepte</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css">
  <style>
    :root {
      --bg: #f4efe8;
      --panel: rgba(255, 250, 245, 0.88);
      --panel-strong: #fffaf5;
      --line: rgba(110, 71, 43, 0.12);
      --text: #3a2416;
      --muted: #8c6e59;
      --primary: #c66b3d;
      --primary-dark: #9d4f28;
      --accent: #244c45;
      --accent-soft: #d9ebe7;
      --success: #2f7d62;
      --warning: #d28a2d;
      --shadow: 0 20px 45px rgba(88, 53, 31, 0.12);
      --radius-lg: 28px;
      --radius-md: 20px;
      --radius-sm: 14px;
    }

    * { box-sizing: border-box; }

    body {
      margin: 0;
      font-family: "Outfit", sans-serif;
      color: var(--text);
      background:
        radial-gradient(circle at top left, rgba(198, 107, 61, 0.15), transparent 26%),
        radial-gradient(circle at bottom right, rgba(36, 76, 69, 0.18), transparent 24%),
        linear-gradient(180deg, #f7f1ea 0%, #f2ebe3 100%);
      min-height: 100vh;
    }

    .shell {
      display: grid;
      grid-template-columns: 280px 1fr;
      min-height: 100vh;
    }

    .sidebar {
      padding: 28px 22px;
      background: rgba(255, 248, 241, 0.78);
      backdrop-filter: blur(14px);
      border-right: 1px solid var(--line);
      position: sticky;
      top: 0;
      height: 100vh;
    }

    .brand {
      display: flex;
      align-items: center;
      gap: 14px;
      margin-bottom: 30px;
    }

    .brand-mark {
      width: 54px;
      height: 54px;
      border-radius: 18px;
      background: linear-gradient(135deg, var(--primary), #e3a16f);
      display: grid;
      place-items: center;
      color: #fff;
      font-size: 1.35rem;
      box-shadow: 0 14px 26px rgba(198, 107, 61, 0.28);
    }

    .brand h1,
    .brand p { margin: 0; }

    .brand h1 {
      font-size: 1.1rem;
      letter-spacing: 0.02em;
    }

    .brand p {
      color: var(--muted);
      font-size: 0.88rem;
      margin-top: 4px;
    }

    .menu-title {
      font-size: 0.76rem;
      color: var(--muted);
      text-transform: uppercase;
      letter-spacing: 0.12em;
      margin: 26px 0 12px;
    }

    .menu {
      display: grid;
      gap: 8px;
    }

    .menu a {
      text-decoration: none;
      color: var(--text);
      padding: 14px 16px;
      border-radius: 16px;
      display: flex;
      align-items: center;
      gap: 12px;
      font-weight: 500;
      transition: 0.2s ease;
    }

    .menu a:hover,
    .menu a.active {
      background: linear-gradient(135deg, rgba(198, 107, 61, 0.12), rgba(36, 76, 69, 0.08));
      transform: translateX(2px);
    }

    .main {
      padding: 24px;
    }

    .topbar {
      display: flex;
      gap: 16px;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 22px;
      flex-wrap: wrap;
    }

    .search,
    .profile-chip,
    .stats-card,
    .panel {
      background: var(--panel);
      backdrop-filter: blur(10px);
      border: 1px solid var(--line);
      box-shadow: var(--shadow);
    }

    .search {
      flex: 1 1 360px;
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 16px 18px;
      border-radius: 20px;
    }

    .search input,
    .control,
    .quick-form input,
    .quick-form select,
    .quick-form textarea {
      border: 1px solid rgba(110, 71, 43, 0.14);
      background: #fff;
      border-radius: 14px;
      font: inherit;
      color: var(--text);
    }

    .search input {
      border: none;
      outline: none;
      flex: 1;
      background: transparent;
      font-size: 0.98rem;
    }

    .profile-chip {
      display: flex;
      align-items: center;
      gap: 14px;
      padding: 12px 16px;
      border-radius: 20px;
    }

    .avatar {
      width: 48px;
      height: 48px;
      border-radius: 16px;
      background: linear-gradient(135deg, var(--accent), #3f7a70);
      color: #fff;
      display: grid;
      place-items: center;
      font-weight: 700;
    }

    .profile-chip strong,
    .profile-chip span {
      display: block;
    }

    .profile-chip span {
      color: var(--muted);
      font-size: 0.84rem;
      margin-top: 3px;
    }

    .hero {
      display: grid;
      grid-template-columns: 1.6fr 1fr;
      gap: 18px;
      margin-bottom: 18px;
    }

    .hero-card {
      background:
        linear-gradient(135deg, rgba(198, 107, 61, 0.96), rgba(157, 79, 40, 0.96)),
        linear-gradient(135deg, #c66b3d, #9d4f28);
      color: #fff;
      border-radius: var(--radius-lg);
      padding: 28px;
      box-shadow: 0 26px 50px rgba(157, 79, 40, 0.24);
      position: relative;
      overflow: hidden;
    }

    .hero-card::after {
      content: "";
      position: absolute;
      inset: auto -40px -50px auto;
      width: 190px;
      height: 190px;
      border-radius: 50%;
      background: rgba(255,255,255,0.12);
    }

    .hero-card h2,
    .hero-card p {
      margin: 0;
      position: relative;
      z-index: 1;
    }

    .hero-card h2 {
      font-size: clamp(1.8rem, 3vw, 2.6rem);
      line-height: 1.05;
      max-width: 480px;
      margin-bottom: 12px;
    }

    .hero-card p {
      max-width: 520px;
      color: rgba(255,255,255,0.82);
      font-size: 0.98rem;
    }

    .hero-actions {
      margin-top: 22px;
      display: flex;
      gap: 12px;
      flex-wrap: wrap;
      position: relative;
      z-index: 1;
    }

    .btn {
      border: none;
      border-radius: 16px;
      padding: 13px 18px;
      font: inherit;
      font-weight: 600;
      cursor: pointer;
      transition: 0.2s ease;
    }

    .btn:hover {
      transform: translateY(-1px);
    }

    .btn-light {
      background: #fff5ec;
      color: var(--primary-dark);
    }

    .btn-dark {
      background: rgba(36, 76, 69, 0.9);
      color: #fff;
    }

    .stats-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 16px;
    }

    .stats-card {
      border-radius: 24px;
      padding: 20px;
    }

    .stats-card small {
      color: var(--muted);
      font-size: 0.82rem;
    }

    .stats-card strong {
      display: block;
      font-size: 1.9rem;
      margin: 10px 0 8px;
    }

    .stats-card .chip {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      border-radius: 999px;
      padding: 6px 10px;
      background: rgba(36, 76, 69, 0.08);
      color: var(--accent);
      font-size: 0.78rem;
      font-weight: 600;
    }

    .content-grid {
      display: grid;
      grid-template-columns: 1.55fr 0.95fr;
      gap: 18px;
    }

    .panel {
      border-radius: var(--radius-lg);
      padding: 22px;
    }

    .panel-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 12px;
      margin-bottom: 18px;
      flex-wrap: wrap;
    }

    .panel-header h3,
    .panel-header p {
      margin: 0;
    }

    .panel-header p {
      color: var(--muted);
      font-size: 0.9rem;
      margin-top: 4px;
    }

    .controls {
      display: flex;
      gap: 10px;
      flex-wrap: wrap;
    }

    .control {
      padding: 11px 13px;
      min-width: 160px;
      outline: none;
    }

    #calendar {
      background: var(--panel-strong);
      border-radius: 22px;
      padding: 14px;
      border: 1px solid rgba(110, 71, 43, 0.08);
    }

    .fc-toolbar h2 {
      font-size: 1.15rem;
      color: var(--text);
    }

    .fc button {
      background: #fff;
      border: 1px solid rgba(110, 71, 43, 0.12);
      color: var(--text);
      box-shadow: none;
      border-radius: 12px;
      text-transform: capitalize;
    }

    .fc-event {
      border: none;
      padding: 4px 6px;
      border-radius: 10px;
    }

    .fc-event, .fc-event-dot {
      background: linear-gradient(135deg, var(--accent), #3d746b);
    }

    .list {
      display: grid;
      gap: 12px;
    }

    .item {
      display: flex;
      justify-content: space-between;
      gap: 12px;
      align-items: center;
      padding: 14px;
      border-radius: 18px;
      background: rgba(255,255,255,0.72);
      border: 1px solid rgba(110, 71, 43, 0.09);
    }

    .item strong,
    .item span {
      display: block;
    }

    .item span {
      color: var(--muted);
      font-size: 0.84rem;
      margin-top: 4px;
    }

    .badge {
      padding: 8px 10px;
      border-radius: 999px;
      font-size: 0.78rem;
      font-weight: 700;
      white-space: nowrap;
    }

    .badge.success {
      background: rgba(47, 125, 98, 0.14);
      color: var(--success);
    }

    .badge.warning {
      background: rgba(210, 138, 45, 0.15);
      color: var(--warning);
    }

    .quick-form {
      display: grid;
      gap: 12px;
    }

    .quick-form input,
    .quick-form select,
    .quick-form textarea {
      width: 100%;
      padding: 12px 14px;
      outline: none;
    }

    .quick-form textarea {
      min-height: 108px;
      resize: vertical;
    }

    .footer-note {
      margin-top: 16px;
      color: var(--muted);
      font-size: 0.84rem;
      text-align: center;
    }

    @media (max-width: 1180px) {
      .hero,
      .content-grid {
        grid-template-columns: 1fr;
      }
    }

    @media (max-width: 940px) {
      .shell {
        grid-template-columns: 1fr;
      }

      .sidebar {
        position: static;
        height: auto;
      }
    }

    @media (max-width: 680px) {
      .main {
        padding: 16px;
      }

      .sidebar {
        padding: 20px 16px;
      }

      .stats-grid {
        grid-template-columns: 1fr;
      }

      .topbar,
      .panel-header {
        align-items: stretch;
      }

      .profile-chip,
      .search {
        width: 100%;
      }
    }
  </style>
</head>
<body>
  <div class="shell">
    <aside class="sidebar">
      <div class="brand">
        <div class="brand-mark"><i class="fa-solid fa-scissors"></i></div>
        <div>
          <h1>Salon Kayıt Cepte</h1>
          <p>Salon yönetimi, sade ve hızlı</p>
        </div>
      </div>

      <div class="menu-title">Panel</div>
      <nav class="menu">
        <a class="active" href="#"><i class="fa-regular fa-calendar-days"></i> Randevu Takvimi</a>
        <a href="#"><i class="fa-regular fa-address-book"></i> Müşteriler</a>
        <a href="#"><i class="fa-solid fa-wand-magic-sparkles"></i> Hizmetler</a>
        <a href="#"><i class="fa-solid fa-user-group"></i> Personeller</a>
        <a href="#"><i class="fa-solid fa-cash-register"></i> Satış Takibi</a>
        <a href="#"><i class="fa-regular fa-chart-bar"></i> Raporlar</a>
      </nav>

      <div class="menu-title">Hızlı İşlem</div>
      <nav class="menu">
        <a href="#quick-form"><i class="fa-solid fa-plus"></i> Yeni Randevu</a>
        <a href="#"><i class="fa-solid fa-bell-concierge"></i> Salon Notları</a>
        <a href="#"><i class="fa-solid fa-gear"></i> Ayarlar</a>
      </nav>
    </aside>

    <main class="main">
      <div class="topbar">
        <label class="search">
          <i class="fa-solid fa-magnifying-glass"></i>
          <input type="text" placeholder="Müşteri, personel veya hizmet ara">
        </label>

        <div class="profile-chip">
          <div class="avatar">OU</div>
          <div>
            <strong>Osman Uykız</strong>
            <span>Salon yöneticisi</span>
          </div>
        </div>
      </div>

      <section class="hero">
        <article class="hero-card">
          <h2>Salon Kayıt Cepte ile günlük akışı tek ekranda yönetin.</h2>
          <p>Takvim, müşteri trafiği ve yeni randevu oluşturma alanını aynı panelde tutarak operasyonu daha düzenli ve daha modern hale getirir.</p>
          <div class="hero-actions">
            <button class="btn btn-light">Bugünkü Randevular</button>
            <button class="btn btn-dark">Yeni Randevu Oluştur</button>
          </div>
        </article>

        <div class="stats-grid">
          <article class="stats-card">
            <small>Bugünkü randevu</small>
            <strong>18</strong>
            <span class="chip"><i class="fa-solid fa-arrow-trend-up"></i> Düne göre +4</span>
          </article>
          <article class="stats-card">
            <small>Aktif müşteri</small>
            <strong>264</strong>
            <span class="chip"><i class="fa-solid fa-user-check"></i> Düzenli takipte</span>
          </article>
          <article class="stats-card">
            <small>Boş zaman aralığı</small>
            <strong>6</strong>
            <span class="chip"><i class="fa-regular fa-clock"></i> Doluluk iyi seviyede</span>
          </article>
          <article class="stats-card">
            <small>Bekleyen onay</small>
            <strong>3</strong>
            <span class="chip"><i class="fa-solid fa-circle-info"></i> Dönüş bekliyor</span>
          </article>
        </div>
      </section>

      <section class="content-grid">
        <article class="panel">
          <div class="panel-header">
            <div>
              <h3>Randevu Takvimi</h3>
              <p>Salon Kayıt Cepte günlük görünüm</p>
            </div>
            <div class="controls">
              <select class="control">
                <option>Personele Göre</option>
                <option>Hizmete Göre</option>
                <option>Odaya Göre</option>
              </select>
              <input class="control" type="date" value="2026-04-09">
            </div>
          </div>
          <div id="calendar"></div>
        </article>

        <div style="display:grid; gap:18px;">
          <article class="panel">
            <div class="panel-header">
              <div>
                <h3>Yaklaşan Kayıtlar</h3>
                <p>En yakın randevu hareketleri</p>
              </div>
            </div>
            <div class="list">
              <div class="item">
                <div>
                  <strong>Örnek Müşteri</strong>
                  <span>Saç bakımı • 20:45</span>
                </div>
                <span class="badge success">Onaylı</span>
              </div>
              <div class="item">
                <div>
                  <strong>Dilan Kaya</strong>
                  <span>Cilt bakımı • 21:15</span>
                </div>
                <span class="badge warning">Bekliyor</span>
              </div>
              <div class="item">
                <div>
                  <strong>Elif Yıldız</strong>
                  <span>Manikür • 22:00</span>
                </div>
                <span class="badge success">Planlandı</span>
              </div>
            </div>
          </article>

          <article class="panel" id="quick-form">
            <div class="panel-header">
              <div>
                <h3>Hızlı Randevu Ekle</h3>
                <p>Özgünleştirilmiş kısa form</p>
              </div>
            </div>
            <form class="quick-form">
              <input type="text" placeholder="Müşteri adı">
              <select>
                <option>Hizmet seçin</option>
                <option>Saç Kesimi</option>
                <option>Cilt Bakımı</option>
                <option>Protez Tırnak</option>
              </select>
              <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
                <input type="date" value="2026-04-09">
                <input type="time" value="20:45">
              </div>
              <textarea placeholder="Randevu notu"></textarea>
              <button type="button" class="btn btn-dark">Randevuyu Kaydet</button>
            </form>
          </article>
        </div>
      </section>

      <div class="footer-note">
        Salon Kayıt Cepte arayüz taslağı • Marka dili ve yerleşim özgünleştirildi
      </div>
    </main>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.30.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/locale/tr.js"></script>
  <script>
    $(function () {
      $("#calendar").fullCalendar({
        locale: "tr",
        defaultView: "agendaDay",
        editable: false,
        selectable: true,
        allDaySlot: false,
        height: 640,
        minTime: "08:00:00",
        maxTime: "23:00:00",
        slotDuration: "00:15:00",
        slotLabelFormat: "HH:mm",
        header: {
          left: "prev,next today",
          center: "title",
          right: "agendaDay,agendaWeek,month"
        },
        buttonText: {
          today: "Bugün",
          month: "Ay",
          week: "Hafta",
          day: "Gün"
        },
        events: [
          {
            title: "Örnek Müşteri • Saç Bakımı",
            start: "2026-04-09T20:45:00",
            end: "2026-04-09T21:45:00"
          },
          {
            title: "Dilan Kaya • Cilt Bakımı",
            start: "2026-04-09T21:15:00",
            end: "2026-04-09T22:00:00",
            color: "#c66b3d"
          },
          {
            title: "Elif Yıldız • Manikür",
            start: "2026-04-09T22:00:00",
            end: "2026-04-09T22:45:00",
            color: "#2f7d62"
          }
        ]
      });
    });
  </script>
</body>
</html>
