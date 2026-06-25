@extends('layouts.app')

@section('title', 'BRY Nedir? — Bilinçli Ritmik Yaşam Metodu ve Amacı | Tuncay Vural')
@section('description', 'Bilinçli Ritmik Yaşam (BRY) Metodu nedir, kimler içindir, insana katkıları nelerdir? İnsanı zihinsel, duygusal ve ruhsal boyutlarıyla bütünsel ele alan ilk ve tek yaşam metodunu Tuncay Vural\'dan keşfet.')
@section('keywords', 'bilinçli ritmik yaşam, bry metodu, tuncay vural, kendini tanımak, yaşam metodu, bilinçli yaşam, farkındalık, kendini keşfetmek, kişisel gelişim, doğru karar almak, koçluk')
@section('canonical', 'https://www.bilincliritmikyasam.com/bry-nedir')
@section('og-image', 'assets/logo.png')
@section('main-class', 'inner')

@section('jsonld')
@verbatim
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "Organization",
      "@id": "https://www.bilincliritmikyasam.com/#organization",
      "name": "Bilinçli Ritmik Yaşam",
      "alternateName": "BRY",
      "url": "https://www.bilincliritmikyasam.com/",
      "logo": "https://www.bilincliritmikyasam.com/assets/logo.png",
      "founder": { "@type": "Person", "name": "Tuncay Vural" },
      "foundingDate": "2003",
      "sameAs": [
        "https://www.youtube.com/@bilincliritmikyasam",
        "https://www.instagram.com/tuncayvural_bry/",
        "https://www.facebook.com/BilincliRitmikYasam",
        "https://www.tiktok.com/@bilincliritmikyasam",
        "https://open.spotify.com/show/1GDAZ6JAynBhv7L3wZwJps"
      ],
      "contactPoint": {
        "@type": "ContactPoint",
        "contactType": "customer support",
        "availableLanguage": ["Turkish"]
      }
    },
    {
      "@type": "Person",
      "@id": "https://www.bilincliritmikyasam.com/#tuncay-vural",
      "name": "Tuncay Vural",
      "jobTitle": "BRY Metodu Kurucusu, Yaşam Koçu",
      "worksFor": { "@id": "https://www.bilincliritmikyasam.com/#organization" },
      "image": "https://www.bilincliritmikyasam.com/assets/tuncay-portrait.jpg"
    },
    {
      "@type": "WebSite",
      "url": "https://www.bilincliritmikyasam.com/",
      "name": "Bilinçli Ritmik Yaşam",
      "publisher": { "@id": "https://www.bilincliritmikyasam.com/#organization" },
      "inLanguage": "tr-TR"
    },
    {
      "@type": "FAQPage",
      "mainEntity": [
        { "@type": "Question", "name": "BRY Metodu nedir?",
          "acceptedAnswer": { "@type": "Answer", "text": "Bilinçli Ritmik Yaşam (BRY) Metodu, insanı zihinsel, duygusal ve ruhsal boyutlarıyla bir bütün olarak ele alan, içeriği itibarıyla ilk ve tek yaşam metodudur." } },
        { "@type": "Question", "name": "BRY Metodunu kimler tercih eder?",
          "acceptedAnswer": { "@type": "Answer", "text": "Kendini bütünsel olarak tanımak, güçlü yönlerini keşfetmek ve yaşamını daha bilinçli yönlendirmek isteyen herkes için uygundur." } },
        { "@type": "Question", "name": "Eğitim programları neleri kapsıyor?",
          "acceptedAnswer": { "@type": "Answer", "text": "Bireysel ve özel programlar, BRY Online Akademi ve kurumsal programlar olmak üzere üç ana başlık altında sunulmaktadır." } },
        { "@type": "Question", "name": "Tuncay Vural kimdir?",
          "acceptedAnswer": { "@type": "Answer", "text": "BRY Metodu’nun kurucusu olup 22 yılı aşkın süredir 30.000’in üzerinde insana iyi bir yaşam sürmeleri için rehberlik etmektedir." } }
      ]
    }
  ]
}
</script>
@endverbatim
@endsection

@section('content')
  <!-- BREADCRUMB -->
  <section class="page-hero" aria-label="Sayfa konumu" style="padding: 0;">
    <div class="container">
      <nav class="breadcrumb" aria-label="Breadcrumb">
        <a href="{{ route('home') }}">Anasayfa</a>
        <span class="sep" aria-hidden="true">/</span>
        <span aria-current="page">BRY Nedir?</span>
      </nav>
    </div>
  </section>

  <!-- DEFINITIONS -->
  <section class="alt" aria-labelledby="def-title" style="padding: 20px 0;">
    <div class="container">
      <div class="section-head" style="margin-bottom: 50px;">
        <span class="eyebrow">İki Temel</span>
        <h1 id="def-title" style="font-size: clamp(36px, 4.8vw, 58px);">Bilinçli ve <em>Ritmik</em> Yaşam</h1>
      </div>
      <div class="def-grid">

        <article class="def-card">
          <h3>Bilinçli <em>Yaşam</em></h3>
          <p>Kim olduğunu anlamak, ne istediğini bilmek ve bu doğrultuda seçimler yaparak yaşamaktır. Bu; isteklerini, hedeflerini ve yaşam amacını belirleyerek dengeli, özgüvenli ve aktif bir yaşam sürmektir — yani bilinçli yaşamaktır.</p>
        </article>

        <article class="def-card">
          <h3>Ritmik <em>Yaşam</em></h3>
          <p>Doğanın ve insan yapısının dengesini bozmadan zamanı en doğru şekilde, yani ritmik kullanmayı tanımlar.</p>
        </article>

      </div>

      <div class="prose" style="text-align: center; max-width: 820px; margin: 60px auto 0;">
        <h2 id="amac-title">BRY Metodunun Amacı <em>Nedir?</em></h2>
        <p>BRY Metodu, insanın farklı boyutlarını bir bütün olarak tanımasını sağlar. Temel amacı ise; bu boyutların birbiriyle olan etkileşimini ve uyumunu, bireyin yaşam amaçları doğrultusunda, bilinçli olarak yönetebilmesini sağlamaktır.</p>
      </div>
    </div>
  </section>

 

  <!-- KİMLER İÇİN -->
  <section class="prose-section" aria-labelledby="kimler-title">
    <div class="container">
      <div class="prose" style="text-align: center; max-width: 820px; margin: 0 auto;">
        <h2 id="kimler-title">BRY Metodu Kimler <em>İçindir?</em></h2>
        <p>BRY Metodu, ortaöğrenim döneminden itibaren hedeflerini belirlemeye başlayan ve yaşamına bilinçle yön vermek isteyen her yaş ve her konumdan insan için uygundur.</p>
        <p>Kendini tanımak, güçlü yönlerini keşfetmek ve yaşamını daha dengeli bir şekilde yönetmek isteyen herkes bu eğitimden faydalanabilir.</p>
        <p>Ayrıca; yaşadığı sorunun ne olduğunu bilen ama nasıl çözeceğini bilemeyen ya da sadece kendine yatırım yapmak isteyen her insan BRY Metodu Eğitimine katılabilir.</p>
      </div>
    </div>
  </section>

  <!-- KATKILAR -->
  <section class="prose-section alt" aria-labelledby="katkilar-title">
    <div class="container">
      <div class="section-head"> 
        <h2 id="katkilar-title">BRY Metodu'nun İnsana <em>Katkıları</em> Nelerdir?</h2>
      </div>

      <div class="contrib-grid">

        <article class="contrib">
          <div class="contrib-head">
            <span class="contrib-num" aria-hidden="true">i</span>
            <h3>Kendini Tanıma ve İç Denge</h3>
          </div>
          <ul>
            <li>Kişinin kendini ilk kez bütünsel olarak tanımasını sağlar.</li>
            <li>Zihinsel, duygusal, karakter ve diğer boyutlarını anlamasını ve yönetebilmesini sağlar.</li>
          </ul>
        </article>

        <article class="contrib">
          <div class="contrib-head">
            <span class="contrib-num" aria-hidden="true">ii</span>
            <h3>Karar Alma ve Yaşam Yönetimi</h3>
          </div>
          <ul>
            <li>Yaşamın her alanında daha sağlıklı ve doğru kararlar alabilme yetisini geliştirir.</li>
            <li>Hedef ve isteklerine özgüvenli, dengeli ve sürdürülebilir bir şekilde ulaşma becerisi kazandırır.</li>
            <li>İş yaşamında odaklanma, yön belirleme ve istikrar konusunda farkındalık kazandırır; böylece doğru seçimler yapabilmesini ve etkili eylemlerde bulunmasını sağlar.</li>
            <li>Zamanı daha bilinçli, dengeli ve verimli kullanabilmesini sağlar.</li>
          </ul>
        </article>

        <article class="contrib">
          <div class="contrib-head">
            <span class="contrib-num" aria-hidden="true">iii</span>
            <h3>İletişim ve İlişkiler</h3>
          </div>
          <ul>
            <li>Kişinin kendisiyle ve çevresiyle daha olumlu ve etkili iletişim kurabilmesine sağlar.</li>
            <li>Sosyal ilişkilerini daha bilinçli yönetmesini ve kişisel sınırlarını koruyabilmesini sağlar.</li>
            <li>Aile içi iletişimde anlama ve anlaşılma yöntemini öğrenip, uygulayabilmesini sağlar.</li>
          </ul>
        </article>

        <article class="contrib">
          <div class="contrib-head">
            <span class="contrib-num" aria-hidden="true">iv</span>
            <h3>Sürdürülebilir Gelişim</h3>
          </div>
          <ul>
            <li>Kişiye özel, sürdürülebilir bireysel gelişim programını yaşamına entegre etmesini sağlar.</li>
          </ul>
        </article>

      </div>
    </div>
  </section>

  <!-- VIDEO -->
  <section class="video-band" aria-labelledby="video-title">
    <div class="container">
      <div class="video-band-head"> 
        <h2 id="video-title">Metodu Yakından <em>Tanı</em></h2>
        <p>BRY Metodunu daha yakından tanımak için kısa videoyu izleyebilirsiniz.</p>
      </div>

      <div class="video-frame video-frame-live">
        <video controls preload="metadata" playsinline poster="{{ asset('assets/tuncay-portrait.jpg') }}">
          <source src="{{ asset('assets/BRYMetoduyla_tanisin.mp4') }}" type="video/mp4">
          Tarayıcınız video etiketini desteklemiyor.
        </video>
      </div>

      <div style="text-align: center; margin-top: 40px;">
        <p style="color: var(--ink-soft); font-size: 16px; margin-bottom: 16px;">Ücretsiz PDF'e ulaş, metodun detaylarını yakından gör.</p>
        <a href="{{ route('bry-metodu-ile-tanis') }}" class="btn btn-primary btn-arrow">BRY Metodunu Keşfet</a>
      </div>
    </div>
  </section>

  @include('partials.contact-cta')
@endsection
