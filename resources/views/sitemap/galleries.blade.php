<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($galleries as $gallery)
        <url>
            <loc>{{ url('/') }}/galleries/{{ $gallery->slug }}</loc>
        </url>
    @endforeach
</urlset>
