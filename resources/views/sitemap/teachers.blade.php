<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($teachers as $teacher)
        <url>
            <loc>{{ url('/') }}/teachers/{{ $teacher->slug }}</loc>
        </url>
    @endforeach
</urlset>
