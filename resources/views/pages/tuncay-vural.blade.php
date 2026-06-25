@extends('layouts.app')

@section('title', 'Tuncay Vural Kimdir? — Bilinçli Ritmik Yaşam (BRY) Metodu Kurucusu')
@section('description', 'Tuncay Vural; Bilinçli Ritmik Yaşam (BRY) Metodu\'nun kurucusu, eğitmeni ve rehberidir. 22 yıllık yolculuk, StyleGym, Ritmik Yaşam ve BRY Metodu\'nun doğuş hikayesi.')
@section('keywords', 'bilinçli ritmik yaşam, bry metodu, tuncay vural, kendini tanımak, yaşam metodu, bilinçli yaşam, farkındalık, kendini keşfetmek, kişisel gelişim, doğru karar almak, koçluk')
@section('canonical', 'https://www.bilincliritmikyasam.com/tuncay-vural')
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
        <span aria-current="page">Tuncay Vural</span>
      </nav>
    </div>
  </section>

<!-- BIO HERO -->
  <section class="bio-hero" aria-labelledby="bio-title">
    <div class="container bio-hero-grid">

      <div class="bio-portrait-wrap">
        <div class="bio-portrait">
          <img src="{{ asset('assets/tuncay-portrait.jpg') }}" alt="Tuncay Vural — BRY Metodu Kurucusu" />
        </div>
      </div>

      <div class="bio-content">
        <h1 id="bio-title">Tuncay Vural <em>kimdir?</em></h1>
        <p class="bio-lead">Tuncay Vural, Bilinçli Ritmik Yaşam (BRY) Metodu'nun kurucusu, eğitmeni ve rehberidir. İnsan yapısını zihinsel, duygusal ve ruhsal ve diğer boyutlarıyla bir bütün olarak ele alan çalışmalarıyla tanınır ve 2005 yılından bu yana bu metodu binlerce kişiye aktarmaktadır.</p>
      </div>

    </div>
  </section>

  <!-- DANS VE SAHNE YOLCULUĞU -->
  <section class="prose-section alt" aria-labelledby="dans-title">
    <div class="container">
      <div class="bio-split reverse">
        <div class="bio-split-media">
          <img src="{{ asset('assets/images/tuncay_vural/dansiniz_karakterinizdir.webp') }}" alt="Dansınız Karakterinizdir akademik çalışması" />
        </div>
        <div class="bio-split-content"> 
          <h2 id="dans-title">Dans ve Sahne <em>Yolculuğu</em></h2>
          <p>Mesleki kariyerine 1980 yılında dünya gösteri alanında Sait Sökmen ile başladı. Dans alanında birçok başarı elde eden Tuncay Vural, dans yarışmalarında elde ettiği üst üste birinciliklerle "Türkiye Dans Kralı" ünvanı aldıktan sonra kendi adını verdiği dans akademisini ve dans ekibini kurmuştur.</p>
          <p>Dans kariyeri sırasında dansın sanat dalı olmasının dışında, insanlığa faydalı olabilecek birçok yönü olduğunu tespit eden Tuncay Vural, çalışmalarına psikoloji alanında ağırlık verdi. Bu kapsamda, dansın insana katkı sağlayacak farklı yönleri araştırmak amacıyla İtalya, Fransa ve Hollanda'da psikoloji ile beraber drama ve koreografi eğitimleri aldı.</p>
          <p>Psikoloji alanındaki araştırmaları kapsamında, "dansın, kişinin temel karakter özelliklerini birebir yansıttığını" gösteren "Dansınız Karakterinizdir" çalışmasını gerçekleştirdi. Tuncay Vural'ın bu akademik çalışması Kasım 2010'da Finlandiya'daki Jyvaskyla Üniversitesi'nce onaylandı.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- STYLEGYM VE RİTMİK YAŞAM -->
  <section class="prose-section" aria-labelledby="stylegym-title">
    <div class="container">
      <div class="bio-split">
        <div class="bio-split-media">
          <img src="{{ asset('assets/images/tuncay_vural/stylegym.jpg') }}" alt="StyleGym — Türkiye'nin ilk markalaşmış spor aktivitesi" />
        </div>
        <div class="bio-split-content"> 
          <h2 id="stylegym-title">StyleGym ve <em>Ritmik Yaşam</em></h2>
          <p>Koreograf olan Tuncay Vural, yaklaşık 4 yıl üzerinde çalıştığı 1000'e yakın figür üreterek fizyoterapistlere onaylattığı Türkiye'nin ilk ve tek markalaşmış spor aktivitesi olan StyleGym'i oluşturdu. İnsanın bir bütün olarak değerlendirilmesi gerektiğine inanan Tuncay Vural, zihinsel ve fiziksel unsurları bir bütün olarak ele aldığı "Ritmik Yaşam" programını hazırladı.</p>
          <p>Tuncay Vural, TRT'de televizyon programı olarak da yayınlanan "Ritmik Yaşam" ile, dans disipliniyle yaşamın doğal ritminin paralelliğinin fark edilmesini ve bu paralelliğin yaşamdaki birçok problemi çözümü olabileceğini gösterdi.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- BRY METODUNUN DOĞUŞU -->
  <section class="prose-section alt" aria-labelledby="bry-dogus-title">
    <div class="container">
      <div class="bio-split reverse">
        <div class="bio-split-media">
          <img src="{{ asset('assets/images/tuncay_vural/cennetinlobisi.jpg') }}" alt="Cennetin Lobisinde Sohbet — Tuncay Vural'ın ilk kitabı (2014)" />
        </div>
        <div class="bio-split-content"> 
          <h2 id="bry-dogus-title">BRY Metodunun <em>Doğuşu</em></h2>

          <div class="quote-card" style="margin: 0 0 28px; padding: 24px 28px;">
            <p style="margin: 0; font-family: var(--serif); font-style: italic; font-size: 19px; line-height: 1.5; color: var(--ink);">
              <span style="font-size: 38px; line-height: 0; color: var(--plum-soft); vertical-align: -0.35em; margin-right: 6px;">“</span>Tuncay Vural'ın "İşte bu!" dediği an; insanın sahip olduğu tüm boyutlarını tanımadığını ve bu nedenle yaşamına katamadığını keşfetmesi oldu.<span style="font-size: 38px; line-height: 0; color: var(--plum-soft); vertical-align: -0.5em; margin-left: 4px;">”</span>
            </p>
          </div>

          <p>Tuncay Vural'ın deneyimleri ve gözlemleri psikoloji alanında hastalık tanısı konulan 100'ün üzerinde sözde hastalığın temel nedeninin hastalık değil, kişinin kendini bütünsel olarak kullanamamasının sonucu olduğunu gösterdi.</p>
          <p>Çünkü insan, bütünsel olarak kendini tanımıyor ve bu nedenle kendini bütünsel olarak kullanamıyordu. Yaptığı tüm araştırmalar ve tespitler sonucunda Tuncay Vural, insanı farklı boyutlardan oluşan bir bütün olarak değerlendiren "Bilinçli Ritmik Yaşam" metodunu oluşturdu.</p>
          <p>Tuncay Vural Bilinçli Ritmik Yaşam metodu ile, 2005 yılından beri kurumsal eğitimler ve bireysel seanslarla binlerce danışanına rehberlik yapmıştır.</p>
          <p>Tuncay Vural'ın danışanlarından net sonuçlar aldığı temeli felsefe, psikoloji ve sosyolojiye dayalı "Bilinçli Ritmik Yaşam" metodu zaman içinde kendi sentezini yaratmış, bugün ise içeriği itibariyle benzersiz olmuştur.</p>
          <p>2014 yılında birikimlerini paylaştığı ilk kitabı olan "Cennetin Lobisinde Sohbet" isimli kitabı yayımlandı.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- STYLEGYM — Sporu yaşama katmak -->
  <section class="prose-section" aria-labelledby="spor-title">
    <div class="container">
      <div class="bio-split">
        <div class="bio-split-media">
          <img src="{{ asset('assets/images/tuncay_vural/tuncay.jpg') }}" alt="Tuncay Vural" />
        </div>
        <div class="bio-split-content"> 
          <h2 id="spor-title">Herkes İçin <em>StyleGym</em></h2>
          <p>Bu süre zarfında danışanlarının en büyük sorunlardan birinin sporu hayatlarına katamamak olduğunu gören Tuncay Vural bu kez de "StyleGym" projesini geliştirdi. Bu projesi ile sporu eğlenceli hale getirmeyi amaçlayan Tuncay Vural, Bilinçli Ritmik Yaşam metodunda önemli bir aşama olan sporu, danışanlarının başlaması için kolay uygulanabilir hale getirdi. Tuncay Vural, Türkiye'nin ilk ve tek markalaşmış spor aktivitesi olan "StyleGym"'i Bilinçli Ritmik Yaşamak isteyen herkes ile youtube kanalında buluşturuyor.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- MILESTONE — 22 yıl -->
  <section class="milestone" aria-labelledby="milestone-title">
    <div class="container">
      <p class="milestone-lead">Yaşamları dönüştürme yolculuğunda</p>
      <span class="milestone-big" id="milestone-title">22 yıl<span style="color: rgba(252,250,245,0.4);">...</span></span>
      <p class="milestone-tail">Halihazırda birebir seanslar ile danışanlarına rehberlik yapmaya devam eden Tuncay Vural'ın şimdi hayatındaki en büyük amaçlarından biri ise, insanın kendini bütünsel olarak tanımasını, zamanı en doğru şekilde kullanmasını, amaçları doğrultusunda huzurla yaşamasını temel alan ve her insanın mutlaka bilmesi gereken bilgileri içeren Bilinçli Ritmik Yaşam metodunu mümkün olduğunca çok sayıda insana ulaştırmaktır.</p>
    </div>
  </section>

  <!-- CLOSING -->
  <section class="prose-section alt" aria-labelledby="bugun-title">
    <div class="container">
      <div class="prose" style="text-align: center;">
        <span class="eyebrow" style="justify-content: center;">Bugün</span>
        <h2 id="bugun-title">Yolculuk <em>Devam Ediyor</em></h2>
        <p>Bu doğrultuda, birikimlerini paylaşmak amacıyla online akademisini kuran Tuncay Vural şimdi ise "Bilinçli Ritmik Yaşam" isimli kitabını yazıyor.</p>
      </div>
    </div>
  </section>
  @include('partials.contact-cta')
@endsection
