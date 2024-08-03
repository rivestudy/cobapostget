<!-- resources/views/components/button-svg1.blade.php -->
<a class="relative flex items-center justify-center mx-auto link-href" href="{{ $attributes->get('url') }}">
    <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="100%" height="100%" version="1.1"
        style="margin: 0; display: block; shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
        viewBox="0 0 12194.15 2015.45" xmlns:xlink="http://www.w3.org/1999/xlink"
        xmlns:xodm="http://www.corel.com/coreldraw/odm/2003">
        <defs>
            <style type="text/css">
                <![CDATA[
                .fil1 {
                    fill: {{ $attributes->get('fill1') }};
                }

                .fil0 {
                    fill: {{ $attributes->get('fill0') }};
                }
                ]]>
            </style>
        </defs>
        <g id="Layer_x0020_1">
            <metadata id="CorelCorpID_0Corel-Layer" />
            <g>
                <polygon class="fil0" points="-0,0 12194.15,0 12194.15,2015.45 -0,2015.45" />
                <path id="_1" class="fil1"
                    d="M-0 0l12194.15 0 0 2015.45 -12194.15 0 0 -2015.45zm12036.61 106l-11879.07 0 0 1803.46 11879.07 0 0 -1803.46z" />
            </g>
        </g>
    </svg>
    <span class="absolute text-center link-button" style="color: {{ $attributes->get('textColor', '#000') }};">
        {{ $slot }}
    </span>
</a>
