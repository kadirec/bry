<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mesajınız Alındı — Bilinçli Ritmik Yaşam</title>
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
                <img src="{{ $logoUrl }}" alt="{{ $siteName ?? 'Bilinçli Ritmik Yaşam' }}" height="46" style="display:inline-block; height:46px; width:auto; max-width:180px; margin-bottom:14px;">
              @endif
              <div style="color:#7E5C13; font-size:12px; letter-spacing:0.18em; text-transform:uppercase; margin-bottom:8px;">İletişim · Onay</div>
              <h1 style="margin:0; color:#3B2568; font-size:26px; font-weight:600; letter-spacing:-0.01em; line-height:1.25;">
                Mesajınızı Aldık
              </h1>
            </td>
          </tr>

          {{-- Body --}}
          <tr>
            <td style="padding: 36px 36px 16px;">
              <p style="margin:0 0 16px; font-size:16px; line-height:1.65; color:#1F2A24;">
                Merhaba <strong>{{ $contact->name }}</strong>,
              </p>
              <p style="margin:0 0 16px; font-size:15.5px; line-height:1.7; color:#3F4A44;">
                <strong>BRY Destek Ekibi</strong> ile iletişime geçtiğiniz için teşekkür ederiz. Formunuz tarafımıza ulaştı.
              </p>
              <p style="margin:0 0 28px; font-size:15.5px; line-height:1.7; color:#3F4A44;">
                İhtiyacınızı daha iyi anlayabilmek ve size uygun yönlendirmeyi yapabilmek için en kısa sürede telefonla iletişime geçeceğiz.
              </p>
            </td>
          </tr>

          {{-- Summary Card --}}
          <tr>
            <td style="padding: 0 36px 8px;">
              <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="background:#FAF6EC; border:1px solid #E8DFC9; border-radius:12px;">
                <tr>
                  <td style="padding: 22px 24px;">
                    <div style="font-size:11.5px; letter-spacing:0.16em; text-transform:uppercase; color:#7E5C13; margin-bottom:12px;">Talep Özeti</div>
                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="font-size:14.5px; line-height:1.55;">
                      <tr>
                        <td style="padding:4px 0; color:#7B7466; width:120px; vertical-align:top;">Konu</td>
                        <td style="padding:4px 0; color:#1F2A24;"><strong>{{ $contact->subject ?? '—' }}</strong></td>
                      </tr>
                      <tr>
                        <td style="padding:4px 0; color:#7B7466; vertical-align:top;">E-posta</td>
                        <td style="padding:4px 0; color:#1F2A24;">{{ $contact->email }}</td>
                      </tr>
                      <tr>
                        <td style="padding:4px 0; color:#7B7466; vertical-align:top;">Telefon</td>
                        <td style="padding:4px 0; color:#1F2A24;">{{ $contact->phone }}</td>
                      </tr>
                      @if(!empty($contact->message))
                        <tr>
                          <td style="padding:8px 0 4px; color:#7B7466; vertical-align:top;">Mesajınız</td>
                          <td style="padding:8px 0 4px; color:#1F2A24; white-space: pre-wrap;">{{ \Illuminate\Support\Str::limit($contact->message, 600) }}</td>
                        </tr>
                      @endif
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>

          {{-- Quick contact band --}}
          <tr>
            <td style="padding: 28px 36px 6px;">
              <p style="margin:0 0 14px; font-size:14.5px; color:#3F4A44; line-height:1.65;">
                Dilerseniz bize doğrudan ulaşabilirsiniz:
              </p>
              <table role="presentation" cellpadding="0" cellspacing="0" border="0">
                <tr>
                  @if(!empty($contactPhone))
                    <td style="padding-right:10px;">
                      <a href="tel:{{ preg_replace('/[^+\d]/', '', $contactPhone) }}" style="display:inline-block; background:#3B2568; color:#FFFFFF; text-decoration:none; padding:11px 18px; border-radius:8px; font-size:14px; font-weight:600;">
                        ☎ {{ $contactPhone }}
                      </a>
                    </td>
                  @endif
                  @if(!empty($contactWhatsapp))
                    <td>
                      <a href="https://wa.me/{{ preg_replace('/[^\d]/', '', $contactWhatsapp) }}" style="display:inline-block; background:#FAF6EC; color:#3B2568; text-decoration:none; padding:11px 18px; border-radius:8px; font-size:14px; font-weight:600; border:1px solid #E8DFC9;">
                        ✦ WhatsApp
                      </a>
                    </td>
                  @endif
                </tr>
              </table>
            </td>
          </tr>

          {{-- Signature --}}
          <tr>
            <td style="padding: 30px 36px 32px;">
              <p style="margin:0 0 4px; font-size:14.5px; color:#3F4A44; line-height:1.6;">
                Saygılarımızla,
              </p>
              <p style="margin:0; font-size:15px; color:#1F2A24; line-height:1.6;">
                <strong>BRY Destek Ekibi</strong>
              </p>
            </td>
          </tr>

          {{-- Footer --}}
          <tr>
            <td style="background:#14191A; padding: 22px 36px; text-align:center;">
              <p style="margin:0 0 8px; font-size:12.5px; color:#C8C2B5; line-height:1.6;">
                Bu e-posta, {{ $siteUrl ?? 'web sitemiz' }} üzerinden gönderdiğiniz iletişim formuna karşılık olarak otomatik gönderilmiştir.
              </p>
              <p style="margin:0; font-size:12px; color:#8A8276;">
                © {{ date('Y') }} {{ $siteName ?? 'Bilinçli Ritmik Yaşam' }}
              </p>
            </td>
          </tr>

        </table>
        <p style="max-width:600px; margin:18px auto 0; font-size:11.5px; color:#8A8276; text-align:center; line-height:1.5;">
          Bu e-postayı yanlışlıkla aldığınızı düşünüyorsanız lütfen dikkate almayınız.
        </p>
      </td>
    </tr>
  </table>
</body>
</html>
