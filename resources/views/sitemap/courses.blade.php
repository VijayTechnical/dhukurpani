<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($courses as $course)
        <url>
            <loc>{{ url('/') }}/courses/{{ $course->slug }}</loc>
        </url>
    @endforeach
</urlset>
