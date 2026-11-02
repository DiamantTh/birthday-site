<script>
  const urlParams = new URLSearchParams(window.location.search);
  const name = urlParams.get('name') || 'Liebe*r Mensch';
  const age = Number(urlParams.get('age') || 30);
  const theme = urlParams.get('theme') || 'sunset';

  const themes = {
    sunset: {
      accent: '#ff7b54',
      accentSoft: '#ffd6a5',
      glow: 'rgba(255, 123, 84, 0.4)',
      bgStart: '#fff7f1',
      bgEnd: '#f3e8ff'
    },
    ocean: {
      accent: '#4fc3f7',
      accentSoft: '#b9f6ca',
      glow: 'rgba(79, 195, 247, 0.35)',
      bgStart: '#edfaff',
      bgEnd: '#e2e8ff'
    },
    lavender: {
      accent: '#a78bfa',
      accentSoft: '#f5d0fe',
      glow: 'rgba(167, 139, 250, 0.35)',
      bgStart: '#f9f5ff',
      bgEnd: '#fce7f3'
    }
  };

  const style = themes[theme] || themes.sunset;

  const wishes = [
    'Möge dieses Jahr voller Licht, Liebe und überraschender Momente sein.',
    'Du verdienst so viel Freude, so viel Ruhe und so viel Stolz auf dich selbst.',
    'Genieße die kleinen Dinge, denn sie sind oft die größten Geschenke.',
    'Wir wünschen dir ein Jahr, in dem deine Träume mutiger werden und dein Herz ruhiger.'
  ];

  const tags = [
    'Glück', 'Freude', 'Lachen', 'Gesundheit', 'Zuhause', 'Mut', 'Wachstum', 'Liebe'
  ];

  function formatAge(age) {
    if (!Number.isFinite(age) || age <= 0) return 30;
    return age;
  }

  $: ageDisplay = formatAge(age);
</script>

<svelte:head>
  <title>Alles Gute zum Geburtstag, {name}</title>
  <meta name="description" content="Eine persönliche Geburtstagseite für {name}" />
  <link rel="preload" href="/fonts/LiberationSans-Regular.ttf" as="font" type="font/ttf" crossorigin />
  <link rel="preload" href="/fonts/LiberationSerif-Italic.ttf" as="font" type="font/ttf" crossorigin />
</svelte:head>

<div class="page-shell" style="--bg-start: {style.bgStart}; --bg-end: {style.bgEnd}; --accent: {style.accent}; --accent-soft: {style.accentSoft}; --glow: {style.glow};">
  <div class="orb orb-one"></div>
  <div class="orb orb-two"></div>

  <main class="card">
    <header class="hero">
      <p class="eyebrow">Herzlichen Glückwunsch</p>
      <h1>Zum {ageDisplay}. Geburtstag</h1>
      <p class="name">{name}</p>
      <p class="subtitle">Du bist ein Licht für alle, die dich lieben. Heute feiern wir dich – mit viel Freude, viel Wärme und ganz viel Liebe.</p>
    </header>

    <section class="sparkline" aria-label="Erinnerung an Glück">
      <div class="spark spark-a"></div>
      <div class="spark spark-b"></div>
      <div class="spark spark-c"></div>
      <div class="spark spark-d"></div>
    </section>

    <section class="message-box">
      {#each wishes as wish}
        <p>“{wish}”</p>
      {/each}
    </section>

    <section class="tags" aria-label="Geburtstagswünsche Schlagworte">
      {#each tags as tag}
        <span>{tag}</span>
      {/each}
    </section>

    <footer class="footer-note">
      <span>Mit ganz viel Liebe</span>
      <span class="signature">deine Freunde & Familie</span>
    </footer>
  </main>
</div>

<style>
  @font-face {
    font-family: 'Manrope';
    src: url('/fonts/LiberationSans-Regular.ttf') format('truetype');
    font-weight: 400;
    font-style: normal;
    font-display: swap;
  }

  @font-face {
    font-family: 'Manrope';
    src: url('/fonts/LiberationSans-Bold.ttf') format('truetype');
    font-weight: 700;
    font-style: normal;
    font-display: swap;
  }

  @font-face {
    font-family: 'Playfair Display';
    src: url('/fonts/LiberationSerif-Italic.ttf') format('truetype');
    font-weight: 400;
    font-style: italic;
    font-display: swap;
  }

  :global(html) {
    background: linear-gradient(135deg, var(--bg-start), var(--bg-end));
    color: #1f1630;
    font-family: 'Manrope', sans-serif;
  }

  :global(body) {
    margin: 0;
    min-height: 100vh;
    background: linear-gradient(135deg, var(--bg-start), var(--bg-end));
  }

  .page-shell {
    position: relative;
    min-height: 100vh;
    display: grid;
    place-items: center;
    padding: 2rem;
    overflow: hidden;
    background: linear-gradient(135deg, var(--bg-start), var(--bg-end));
  }

  .orb {
    position: absolute;
    border-radius: 9999px;
    filter: blur(14px);
    opacity: 0.7;
  }

  .orb-one {
    width: 28rem;
    height: 28rem;
    background: var(--glow);
    left: -8rem;
    top: 10%;
  }

  .orb-two {
    width: 26rem;
    height: 26rem;
    background: rgba(255, 255, 255, 0.25);
    right: -6rem;
    bottom: 8%;
  }

  .card {
    width: min(720px, 100%);
    position: relative;
    z-index: 1;
    background: rgba(255, 255, 255, 0.58);
    backdrop-filter: blur(18px);
    border: 1px solid rgba(255, 255, 255, 0.5);
    border-radius: 32px;
    box-shadow: 0 30px 80px rgba(63, 40, 96, 0.12);
    padding: clamp(1.8rem, 4vw, 3.5rem);
  }

  .hero {
    text-align: center;
  }

  .eyebrow {
    margin: 0;
    text-transform: uppercase;
    letter-spacing: 0.22em;
    font-size: 0.72rem;
    color: rgba(31, 22, 48, 0.72);
  }

  h1 {
    margin: 0.8rem 0 0;
    font-size: clamp(2.3rem, 7vw, 4.8rem);
    line-height: 0.95;
    letter-spacing: -0.06em;
    font-weight: 800;
  }

  .name {
    margin-top: 0.35rem;
    font-family: 'Playfair Display', serif;
    font-size: clamp(2rem, 4vw, 3.2rem);
    color: var(--accent);
    font-style: italic;
  }

  .subtitle {
    margin: 1.2rem auto 0;
    max-width: 48rem;
    font-size: 1.04rem;
    line-height: 1.7;
    color: rgba(31, 22, 48, 0.78);
  }

  .sparkline {
    display: flex;
    justify-content: center;
    gap: 0.9rem;
    margin: 2.2rem 0 1.8rem;
  }

  .spark {
    width: 0.9rem;
    height: 0.9rem;
    border-radius: 9999px;
    background: linear-gradient(135deg, var(--accent), var(--accent-soft));
    box-shadow: 0 0 18px var(--glow);
    animation: pulse 2.5s infinite ease-in-out;
  }

  .spark-b { animation-delay: 0.3s; }
  .spark-c { animation-delay: 0.6s; }
  .spark-d { animation-delay: 0.9s; }

  .message-box {
    padding: 1.4rem 1.2rem 1rem;
    border-radius: 22px;
    background: rgba(255, 255, 255, 0.32);
    border: 1px solid rgba(31, 22, 48, 0.06);
  }

  .message-box p {
    margin: 0.9rem 0;
    text-align: center;
    font-size: 1.04rem;
    line-height: 1.8;
    color: rgba(31, 22, 48, 0.85);
  }

  .tags {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 0.8rem;
    margin-top: 1.6rem;
  }

  .tags span {
    padding: 0.65rem 1rem;
    border-radius: 9999px;
    background: rgba(255, 255, 255, 0.5);
    border: 1px solid rgba(31, 22, 48, 0.08);
    font-size: 0.82rem;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    color: rgba(31, 22, 48, 0.8);
  }

  .footer-note {
    margin-top: 1.8rem;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.2rem;
    font-size: 0.92rem;
    color: rgba(31, 22, 48, 0.75);
  }

  .signature {
    font-weight: 700;
    color: var(--accent);
  }

  @keyframes pulse {
    0%, 100% { transform: scale(0.8); opacity: 0.6; }
    50% { transform: scale(1.25); opacity: 1; }
  }

  @media (max-width: 640px) {
    .page-shell {
      padding: 1rem;
    }

    .card {
      border-radius: 24px;
    }

    .message-box p {
      font-size: 0.95rem;
    }
  }
</style>
