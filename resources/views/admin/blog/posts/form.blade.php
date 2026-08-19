@extends('admin.layouts.app')

@section('title', $post->exists ? 'Yazı Düzenle' : 'Yeni Yazı')

@section('content')
<div class="adm-head">
  <div>
    <h1>{{ $post->exists ? Str::limit($post->title, 60) : 'Yeni Yazı' }}</h1>
    <div class="meta">{{ $post->exists ? 'Mevcut yazıyı düzenle' : 'Yeni blog yazısı ekle' }}</div>
  </div>
  <a class="adm-btn adm-btn--ghost" href="{{ route('admin.blog.posts.index') }}">← Geri</a>
</div>

<form action="{{ $post->exists ? route('admin.blog.posts.update', $post) : route('admin.blog.posts.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
  @if($post->exists) @method('PUT') @endif

  <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 20px; align-items: start;">
    {{-- Sol kolon: içerik --}}
    <div>
      <div class="adm-card">
        <h2>İçerik</h2>

        <div class="adm-field {{ $errors->has('title') ? 'invalid' : '' }}">
          <label for="title">Başlık</label>
          <input id="title" type="text" name="title" value="{{ old('title', $post->title) }}" required style="font-size: 16px;">
          @if($errors->has('title'))<div class="err">{{ $errors->first('title') }}</div>@endif
        </div>

        <div class="adm-field {{ $errors->has('slug') ? 'invalid' : '' }}">
          <label for="slug">Slug</label>
          <input id="slug" type="text" name="slug" value="{{ old('slug', $post->slug) }}" placeholder="başlıktan otomatik üretilir">
          @if($errors->has('slug'))<div class="err">{{ $errors->first('slug') }}</div>@endif
        </div>

        <div class="adm-field">
          <label for="excerpt">Özet (excerpt)</label>
          <textarea id="excerpt" name="excerpt" maxlength="600">{{ old('excerpt', $post->excerpt) }}</textarea>
          <div class="hint">Liste ve kart önizlemelerinde görünür</div>
        </div>

        <div class="adm-field" id="bodyField" data-editor-mode="rich">
          <div class="adm-editor__bar">
            <label for="body" style="margin: 0;">Gövde</label>
            <button type="button" id="bodySourceToggle" class="adm-editor__toggle" aria-pressed="false">
              &lt;/&gt; HTML kaynağı
            </button>
          </div>

          <div class="adm-editor" id="bodyEditorShell">
            <div id="bodyEditor"></div>
          </div>

          {{-- Kaynak modunda düzenlenen ve forma gönderilen asıl alan --}}
          <textarea id="body" name="body" class="adm-editor__source">{{ old('body', $post->body) }}</textarea>

          <div class="hint">Biçimlendirme araç çubuğunu kullan; ham HTML'e geçmek için “HTML kaynağı”na tıkla.</div>
        </div>
      </div>

      <div class="adm-card">
        <h2>SEO (sayfa bazlı override)</h2>
        <p class="sub">Boş bırakılırsa başlık/excerpt'tan otomatik üretilir</p>

        <div class="adm-field">
          <label for="meta_title">Meta Title</label>
          <input id="meta_title" type="text" name="meta_title" value="{{ old('meta_title', $post->meta_title) }}">
        </div>

        <div class="adm-field">
          <label for="meta_description">Meta Description</label>
          <textarea id="meta_description" name="meta_description">{{ old('meta_description', $post->meta_description) }}</textarea>
        </div>

        <div class="adm-field">
          <label for="og_image">OG Image (URL veya storage yolu)</label>
          <input id="og_image" type="text" name="og_image" value="{{ old('og_image', $post->og_image) }}">
        </div>
      </div>
    </div>

    {{-- Sağ kolon: meta + yayın --}}
    <div>
      <div class="adm-card">
        <h2>Yayın</h2>

        <div class="adm-field">
          <label for="status">Durum</label>
          <select id="status" name="status" required>
            <option value="draft"     {{ old('status', $post->status) === 'draft'     ? 'selected' : '' }}>Taslak</option>
            <option value="published" {{ old('status', $post->status) === 'published' ? 'selected' : '' }}>Yayında</option>
          </select>
        </div>

        <div class="adm-field">
          <label for="published_at">Yayın Tarihi</label>
          <input id="published_at" type="datetime-local" name="published_at"
            value="{{ old('published_at', optional($post->published_at)->format('Y-m-d\TH:i')) }}">
          <div class="hint">İleri tarih verirsen o tarihte yayınlanır</div>
        </div>

        <div class="adm-field" style="display: flex; align-items: center; gap: 8px;">
          <input id="is_featured" type="checkbox" name="is_featured" value="1" {{ old('is_featured', $post->is_featured) ? 'checked' : '' }}>
          <label for="is_featured" style="margin: 0; text-transform: none; letter-spacing: 0;">⭐ Kendi kategorisinde öne çıkan</label>
        </div>
        <div class="hint" style="margin: -6px 0 10px;">Blog sayfasında bu yazının kategorisi seçildiğinde üstte öne çıkan olarak gösterilir.</div>

        <div class="adm-field" style="display: flex; align-items: center; gap: 8px;">
          <input id="is_featured_all" type="checkbox" name="is_featured_all" value="1" {{ old('is_featured_all', $post->is_featured_all) ? 'checked' : '' }}>
          <label for="is_featured_all" style="margin: 0; text-transform: none; letter-spacing: 0;">🌟 “Tümü” sekmesinde öne çıkan</label>
        </div>
        <div class="hint" style="margin: -6px 0 10px;">Blog sayfasında kategori filtresi yokken (Tümü) üstte gösterilir. Hiçbiri işaretli değilse en son yayınlanan yazı öne çıkar.</div>

        <div class="adm-field" style="display: flex; align-items: center; gap: 8px;">
          <input id="show_on_home" type="checkbox" name="show_on_home" value="1" {{ old('show_on_home', $post->show_on_home) ? 'checked' : '' }}>
          <label for="show_on_home" style="margin: 0; text-transform: none; letter-spacing: 0;">🏠 Anasayfa vitrininde göster</label>
        </div>

        <div class="adm-field">
          <label for="home_sort">Anasayfa sırası</label>
          <input id="home_sort" type="number" name="home_sort" value="{{ old('home_sort', $post->home_sort ?? 0) }}" min="0" max="999">
          <div class="hint">Küçük değer önce gösterilir. Boş bırakılırsa yayın tarihine göre sıralanır.</div>
        </div>
      </div>

      <div class="adm-card">
        <h2>Kategori & Yazar</h2>

        <div class="adm-field">
          <label for="category_id">Kategori</label>
          <select id="category_id" name="category_id">
            <option value="">— seçilmedi —</option>
            @foreach($categories as $c)
              <option value="{{ $c->id }}" {{ old('category_id', $post->category_id) == $c->id ? 'selected' : '' }}>{{ $c->name }}</option>
            @endforeach
          </select>
        </div>

        <div class="adm-field">
          <label for="author">Yazar</label>
          <input id="author" type="text" name="author" value="{{ old('author', $post->author ?? 'Tuncay Vural') }}" required>
        </div>

        <div class="adm-field">
          <label for="reading_minutes">Okuma süresi (dk)</label>
          <input id="reading_minutes" type="number" name="reading_minutes" value="{{ old('reading_minutes', $post->reading_minutes) }}" min="1" max="300">
        </div>
      </div>

      <div class="adm-card">
        <h2>Öne Çıkan Görsel</h2>

        @php $imgPos = old('image_position', $post->imagePosition()); @endphp

        {{-- Kırpma odağı: 4/3 önizleme (öne çıkan alanla aynı oran), tıkla ya da sürükle --}}
        <div class="focus-picker" id="focusPicker" @if(! $post->featured_image) hidden @endif>
          <div class="focus-frame" id="focusFrame">
            <img id="focusImg" src="{{ $post->featuredImageUrl() }}" alt=""
                 style="object-position: {{ $imgPos }};">
            <span class="focus-dot" id="focusDot"></span>
          </div>
          <input type="hidden" name="image_position" id="image_position" value="{{ $imgPos }}">
          <div class="hint">
            Görselin hangi kısmının görüneceğini seçmek için önizlemeye tıkla veya noktayı sürükle.
            <button type="button" class="focus-reset" id="focusReset">ortala</button>
          </div>
        </div>

        @if($post->featured_image)
          <div class="adm-field" style="display: flex; align-items: center; gap: 8px;">
            <input id="remove_image" type="checkbox" name="remove_image" value="1">
            <label for="remove_image" style="margin: 0; text-transform: none; letter-spacing: 0; color: var(--a-danger);">Mevcut görseli sil</label>
          </div>
        @endif

        <div class="adm-field {{ $errors->has('featured_image_file') ? 'invalid' : '' }}">
          <label for="featured_image_file">Yükle (jpg/png/webp, max 4MB)</label>
          <input id="featured_image_file" type="file" name="featured_image_file" accept="image/*">
          @if($errors->has('featured_image_file'))<div class="err">{{ $errors->first('featured_image_file') }}</div>@endif
        </div>
      </div>
    </div>
  </div>

  <div style="display: flex; gap: 10px;">
    <button class="adm-btn" type="submit">{{ $post->exists ? 'Güncelle' : 'Yayınla' }}</button>
    <a class="adm-btn adm-btn--ghost" href="{{ route('admin.blog.posts.index') }}">İptal</a>
  </div>
</form>
@endsection

@push('styles')
  <link rel="stylesheet" href="{{ asset('vendor/quill/quill.snow.css') }}">
  <link rel="stylesheet" href="{{ asset('css/admin-editor.css') }}">
  {{-- JS kapalıysa editör kabuğu boş kalmasın, ham textarea'ya düş --}}
  <noscript><style>
    #bodyEditorShell, #bodySourceToggle { display: none; }
    [data-editor-mode="rich"] .adm-editor__source { display: block; }
  </style></noscript>
@endpush

@push('scripts')
<script src="{{ asset('vendor/quill/quill.js') }}"></script>
<script>
(function () {
  const field    = document.getElementById('bodyField');
  const source   = document.getElementById('body');       // asıl <textarea name="body">
  const toggle   = document.getElementById('bodySourceToggle');
  const form     = source.closest('form');

  const quill = new Quill('#bodyEditor', {
    theme: 'snow',
    placeholder: 'Yazının gövdesi…',
    modules: {
      toolbar: [
        [{ header: [2, 3, false] }],
        ['bold', 'italic', 'underline', 'strike'],
        [{ list: 'ordered' }, { list: 'bullet' }],
        ['blockquote', 'link'],
        [{ align: [] }],
        ['clean'],
      ],
    },
  });

  // Editör içeriği kullanıcı tarafından değiştirildi mi?
  // Değiştirilmediyse submit'te textarea'ya dokunmayız — böylece Quill'in
  // desteklemediği elle yazılmış HTML sırf form açıldı diye normalize edilip bozulmaz.
  let dirty = false;
  let loading = false;

  function loadIntoEditor(html) {
    loading = true;
    quill.setContents([]);                                // önceki içeriği temizle
    quill.clipboard.dangerouslyPasteHTML(0, html || '');
    loading = false;
  }

  function readEditor() {
    const html = quill.root.innerHTML;
    return html === '<p><br></p>' ? '' : html;            // Quill'in "boş" hali
  }

  quill.on('text-change', function (_d, _o, origin) {
    if (!loading && origin === 'user') dirty = true;
  });

  loadIntoEditor(source.value);

  toggle.addEventListener('click', function () {
    const toSource = field.dataset.editorMode === 'rich';

    if (toSource) {
      if (dirty) source.value = readEditor();             // düzenlenmişse editörden aktar
      field.dataset.editorMode = 'source';
      toggle.setAttribute('aria-pressed', 'true');
      source.focus();
    } else {
      loadIntoEditor(source.value);                       // ham HTML'i editöre al
      dirty = false;                                      // kaynak metni asıl doğru kabul et
      field.dataset.editorMode = 'rich';
      toggle.setAttribute('aria-pressed', 'false');
      quill.focus();
    }
  });

  form.addEventListener('submit', function () {
    // Kaynak modunda textarea zaten kullanıcının yazdığı hâli tutuyor.
    if (field.dataset.editorMode === 'rich' && dirty) source.value = readEditor();
  });
})();
</script>

<script>
/* Görsel kırpma odağı — tıkla ya da sürükle, object-position olarak kaydedilir. */
(function () {
  const picker = document.getElementById('focusPicker');
  const frame  = document.getElementById('focusFrame');
  const img    = document.getElementById('focusImg');
  const dot    = document.getElementById('focusDot');
  const input  = document.getElementById('image_position');
  const reset  = document.getElementById('focusReset');
  const file   = document.getElementById('featured_image_file');
  if (!picker || !frame || !img || !input) return;

  function apply(x, y) {
    const pos = Math.round(x) + '% ' + Math.round(y) + '%';
    input.value = pos;
    img.style.objectPosition = pos;
    dot.style.left = x + '%';
    dot.style.top  = y + '%';
  }

  // Kayıtlı değeri noktaya yansıt
  const saved = (input.value || '50% 50%').match(/(\d{1,3})%\s+(\d{1,3})%/);
  apply(saved ? +saved[1] : 50, saved ? +saved[2] : 50);

  function pick(e) {
    const r = frame.getBoundingClientRect();
    const x = Math.min(100, Math.max(0, ((e.clientX - r.left) / r.width)  * 100));
    const y = Math.min(100, Math.max(0, ((e.clientY - r.top)  / r.height) * 100));
    apply(x, y);
  }

  frame.addEventListener('pointerdown', function (e) {
    frame.setPointerCapture(e.pointerId);
    frame.classList.add('is-dragging');
    pick(e);
  });
  frame.addEventListener('pointermove', function (e) {
    if (frame.classList.contains('is-dragging')) pick(e);
  });
  ['pointerup', 'pointercancel'].forEach(function (evt) {
    frame.addEventListener(evt, function () { frame.classList.remove('is-dragging'); });
  });

  if (reset) reset.addEventListener('click', function () { apply(50, 50); });

  // Yeni dosya seçilince önizlemeyi anında değiştir
  if (file) file.addEventListener('change', function () {
    const f = file.files && file.files[0];
    if (!f) return;
    img.src = URL.createObjectURL(f);
    picker.hidden = false;
  });
})();
</script>
@endpush
