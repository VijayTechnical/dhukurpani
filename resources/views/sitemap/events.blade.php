<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($events as $event)
        <url>
            <loc>{{ url('/') }}/events/{{ $event->slug }}</loc>
        </url>
    @endforeach
</urlset>
