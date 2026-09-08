<?php

namespace App\Http\Middleware;

use App\Models\Redirect;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class HandleDatabaseRedirects
{
    /**
     * Panelden yönetilen 301/302 yönlendirmelerini uygular.
     *
     * @param  Closure(Request): Response  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->isMethod('GET') && ! $request->isMethod('HEAD')) {
            return $next($request);
        }

        // Admin panel yönlendirme kurallarına takılmasın.
        if ($request->is('admin', 'admin/*')) {
            return $next($request);
        }

        $path = Redirect::normalizePath($request->getPathInfo());

        try {
            if (! Schema::hasTable('redirects')) {
                return $next($request);
            }

            // Path case-insensitive eşleşsin (URL'lerde büyük harfli eski linkler var).
            $row = DB::table('redirects')
                ->where('is_active', true)
                ->whereRaw('LOWER(from_path) = ?', [mb_strtolower($path)])
                ->first();
        } catch (Throwable $e) {
            return $next($request);
        }

        if (! $row) {
            return $next($request);
        }

        $target = $row->to_path;

        // Aynı path'e yönlendirme yapmayalım (sonsuz döngü engeli).
        if (Redirect::normalizePath($target) === $path) {
            return $next($request);
        }

        // Query string varsa hedefte yoksa aktar.
        $qs = $request->getQueryString();
        if ($qs && ! str_contains($target, '?')) {
            $target .= '?' . $qs;
        }

        try {
            DB::table('redirects')->where('id', $row->id)->update([
                'hits'        => DB::raw('hits + 1'),
                'last_hit_at' => now(),
            ]);
        } catch (Throwable $e) {
            // Sayaç hatası isteği bozmasın.
        }

        return redirect()->away($target, $row->status_code ?: 301);
    }
}
