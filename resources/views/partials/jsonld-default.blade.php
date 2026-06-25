<script type="application/ld+json">
{!! json_encode([
  '@context' => 'https://schema.org',
  '@graph' => [
    [
      '@type' => 'Organization',
      '@id' => config('app.url') . '/#organization',
      'name' => 'Bilinçli Ritmik Yaşam',
      'alternateName' => 'BRY',
      'url' => config('app.url') . '/',
      'logo' => asset('assets/logo.png'),
      'founder' => ['@type' => 'Person', 'name' => 'Tuncay Vural'],
      'foundingDate' => '2003',
      'sameAs' => [
        'https://www.youtube.com/@bilincliritmikyasam',
        'https://www.instagram.com/tuncayvural_bry/',
        'https://www.facebook.com/BilincliRitmikYasam',
        'https://www.tiktok.com/@bilincliritmikyasam',
        'https://open.spotify.com/show/1GDAZ6JAynBhv7L3wZwJps',
      ],
      'contactPoint' => [
        '@type' => 'ContactPoint',
        'contactType' => 'customer support',
        'availableLanguage' => ['Turkish'],
      ],
    ],
    [
      '@type' => 'WebSite',
      'url' => config('app.url') . '/',
      'name' => 'Bilinçli Ritmik Yaşam',
      'publisher' => ['@id' => config('app.url') . '/#organization'],
      'inLanguage' => 'tr-TR',
    ],
  ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
