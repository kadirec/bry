<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>"Bilincinle Tanış" — PDF Dosyanız Hazır</title>
</head>
<body style="margin:0; padding:0; background:#F5EFE3; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; color:#1F2A24; -webkit-font-smoothing: antialiased;">
  <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="background:#F5EFE3; padding: 40px 16px;">
    <tr>
      <td align="center">
        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="max-width:600px; background:#FFFFFF; border-radius:14px; overflow:hidden; box-shadow: 0 6px 30px -8px rgba(31,42,36,0.18);">

          {{-- Header / Brand --}}
          <tr>
            <td style="background:#FAF6EC; padding: 40px 36px 36px; text-align:center; border-bottom:1px solid #E8DFC9;">
              @if(!empty($logoUrl))
                <img src="{{ $logoUrl }}" alt="{{ $siteName }}" height="46" style="display:inline-block; height:46px; width:auto; max-width:180px; margin-bottom:14px;">
              @endif
              <div style="color:#7E5C13; font-size:12px; letter-spacing:0.18em; text-transform:uppercase; margin-bottom:8px;">BRY Online Akademi</div>
              <h1 style="margin:0; color:#3B2568; font-size:26px; font-weight:600; letter-spacing:-0.01em; line-height:1.25;">
                "Bilincinle Tanış" Dosyanız Hazır
              </h1>
            </td>
          </tr>

          {{-- Greeting & Intro --}}
          <tr>
            <td style="padding: 36px 36px 8px;">
              <p style="margin:0 0 18px; font-size:16px; line-height:1.65; color:#1F2A24;">
                Merhaba <strong>{{ $contact->name }}</strong>,
              </p>
              <p style="margin:0 0 16px; font-size:15.5px; line-height:1.7; color:#3F4A44;">
                Kendinizi tanıma yolculuğunda attığınız bu adım, bilinçli bir yaşamın kapısını aralıyor.
              </p>
              <p style="margin:0 0 22px; font-size:15.5px; line-height:1.7; color:#3F4A44;">
                <strong>"Bilincinle Tanış"</strong> adlı PDF dosyanıza aşağıdaki bağlantıdan ulaşabilirsiniz:
              </p>
            </td>
          </tr>

          {{-- CTA 1: PDF Download Button --}}
          <tr>
            <td style="padding: 0 36px 28px; text-align:center;">
              <table role="presentation" cellpadding="0" cellspacing="0" border="0" style="margin: 0 auto;">
                <tr>
                  <td style="border-radius:10px; background:#3B2568;">
                    <a href="{{ $pdfUrl }}" target="_blank" rel="noopener" style="display:inline-block; background:#3B2568; color:#FFFFFF; text-decoration:none; padding:15px 28px; border-radius:10px; font-size:15.5px; font-weight:600; letter-spacing:0.01em;">
                      📄 Bilincinle Tanış Dosyasını İndir
                    </a>
                  </td>
                </tr>
              </table>
              <p style="margin: 12px 0 0; font-size:12.5px; color:#7B7466;">
                Bağlantı yeni sekmede açılır.
              </p>
            </td>
          </tr>

          {{-- Content Highlights --}}
          <tr>
            <td style="padding: 0 36px 8px;">
              <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="background:#FAF6EC; border:1px solid #E8DFC9; border-radius:12px;">
                <tr>
                  <td style="padding: 22px 24px;">
                    <div style="font-size:11.5px; letter-spacing:0.16em; text-transform:uppercase; color:#7E5C13; margin-bottom:12px;">Bu Kısa ama Etkili İçerikte</div>
                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                      <tr>
                        <td style="padding: 4px 0; font-size:14.5px; line-height:1.65; color:#1F2A24;">
                          <span style="color:#3B2568; font-weight:700; margin-right:6px;">•</span>
                          Bilincinizin kullandığı <strong>iki temel işlevi</strong> fark edeceksiniz.
                        </td>
                      </tr>
                      <tr>
                        <td style="padding: 4px 0; font-size:14.5px; line-height:1.65; color:#1F2A24;">
                          <span style="color:#3B2568; font-weight:700; margin-right:6px;">•</span>
                          Hedeflerinize ulaşmanızı destekleyen ya da engelleyen <strong>düşünce alışkanlıklarını</strong> tanımaya başlayacaksınız.
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>

          {{-- Paragraph: explanation --}}
          <tr>
            <td style="padding: 28px 36px 6px;">
              <p style="margin:0 0 16px; font-size:15.5px; line-height:1.7; color:#3F4A44;">
                Bilinçli Ritmik Yaşam (<strong>BRY</strong>) Metodu'nun bir parçası olan bu bilgiler, günlük yaşamda daha bilinçli seçimler yapmanıza ve zihninizi daha etkili kullanmanıza güçlü bir başlangıç sunar.
              </p>
              <p style="margin:0 0 18px; font-size:15.5px; line-height:1.7; color:#3F4A44;">
                BRY Metodu'nu daha kapsamlı ve adım adım öğrenmek isterseniz, eğitim sayfamızı inceleyebilirsiniz:
              </p>
            </td>
          </tr>

          {{-- CTA 2: BRY Metodu Eğitimi Button --}}
          <tr>
            <td style="padding: 0 36px 32px; text-align:center;">
              <table role="presentation" cellpadding="0" cellspacing="0" border="0" style="margin: 0 auto;">
                <tr>
                  <td style="border-radius:10px; background:#FAF6EC; border:1.5px solid #3B2568;">
                    <a href="{{ $methodUrl }}" target="_blank" rel="noopener" style="display:inline-block; color:#3B2568; text-decoration:none; padding:14px 26px; border-radius:10px; font-size:15px; font-weight:600;">
                      👉 BRY Metodu Eğitimi Sayfasını İncele
                    </a>
                  </td>
                </tr>
              </table>
            </td>
          </tr>

          {{-- Signature --}}
          <tr>
            <td style="padding: 0 36px 32px;">
              <p style="margin:0 0 4px; font-size:14.5px; color:#3F4A44; line-height:1.6;">
                Sağlıcakla ve huzurla kalın,
              </p>
              <p style="margin:0; font-size:15px; color:#1F2A24; line-height:1.6;">
                <strong>BRY Online Akademi</strong>
              </p>
            </td>
          </tr>

          {{-- Footer --}}
          <tr>
            <td style="background:#14191A; padding: 22px 36px; text-align:center;">
              <p style="margin:0 0 8px; font-size:12.5px; color:#C8C2B5; line-height:1.6;">
                Bilinçli Ritmik Yaşam (BRY) Metodu ile ilgili bilgilendirme e-postalarını almaktasınız. Bu e-postalar, kendinizi bütünsel olarak tanımanıza ve yaşamınızı daha bilinçli seçimlerle yönlendirebilmenize destek olmak amacıyla gönderilmektedir.
              </p>
              <p style="margin:0; font-size:12px; color:#8A8276;">
                © {{ date('Y') }} {{ $siteName }}
              </p>
            </td>
          </tr>

        </table>
      </td>
    </tr>
  </table>
</body>
</html>
