@extends('admin.layouts.app')

@section('title', 'Kullanıcılar')

@section('content')
<div class="adm-head">
  <div>
    <h1>Kullanıcılar</h1>
    <div class="meta">{{ $users->count() }} kullanıcı · {{ $users->where('is_admin', true)->count() }} yönetici</div>
  </div>
  <a class="adm-btn" href="{{ route('admin.users.create') }}">+ Yeni Kullanıcı</a>
</div>

<table class="adm-table">
  <thead>
    <tr>
      <th>Ad</th>
      <th>E-posta</th>
      <th>Rol</th>
      <th>Oluşturulma</th>
      <th class="actions">Eylem</th>
    </tr>
  </thead>
  <tbody>
    @forelse($users as $u)
      <tr>
        <td>
          <strong>{{ $u->name }}</strong>
          @if($u->id === auth()->id())<span class="adm-badge adm-badge--info" style="margin-left:8px;">Sen</span>@endif
        </td>
        <td><span class="muted">{{ $u->email }}</span></td>
        <td>
          @if($u->is_admin)
            <span class="adm-badge adm-badge--success"><span class="adm-badge__dot"></span>Yönetici</span>
          @else
            <span class="adm-badge adm-badge--neutral"><span class="adm-badge__dot"></span>Üye</span>
          @endif
        </td>
        <td><span class="muted">{{ optional($u->created_at)->format('d.m.Y') }}</span></td>
        <td class="actions">
          <a class="adm-btn adm-btn--ghost adm-btn--sm" href="{{ route('admin.users.edit', $u) }}">Düzenle</a>
          @if($u->id !== auth()->id())
            <form action="{{ route('admin.users.destroy', $u) }}" method="POST" style="display:inline;" onsubmit="return confirm('{{ $u->name }} kullanıcısını silmek istediğine emin misin?');">
              @csrf @method('DELETE')
              <button class="adm-btn adm-btn--danger adm-btn--sm" type="submit">Sil</button>
            </form>
          @endif
        </td>
      </tr>
    @empty
      <tr><td colspan="5" class="muted">Henüz kullanıcı yok.</td></tr>
    @endforelse
  </tbody>
</table>
@endsection
