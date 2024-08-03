<a class="relative flex items-center justify-center mx-auto" href="{{ $attributes->get('url') }}">
    <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="100%" height="100%" version="1.1" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
    viewBox="0 0 12183.91 2013.76"
     xmlns:xlink="http://www.w3.org/1999/xlink"
     xmlns:xodm="http://www.corel.com/coreldraw/odm/2003">
     <defs>
      <style type="text/css">
        <![CDATA[
            .fil1 {fill:{{ $attributes->get('fill1')}}}
            .fil0 {fill:{{ $attributes->get('fill0') }}}
           ]]>
      </style>
     </defs>
     <g id="Layer_x0020_1">
      <metadata id="CorelCorpID_0Corel-Layer"/>
      <g>
       <polygon class="fil0" points="-0,0 11177.04,0 12183.91,1006.87 12183.91,1006.89 11177.04,2013.76 -0,2013.76 "/>
       <path id="_1" class="fil1" d="M-0 0l11177.04 0 1006.87 1006.87 0 0.02 -1006.87 1006.87 -11177.04 0 0 -2013.76zm11170.29 105.91l-11012.89 0 0 1801.94 10882.28 0 966.28 -966.28 -835.67 -835.67z"/>
      </g>
     </g>
    </svg>
    <span class="absolute text-center" style="color: {{ $attributes->get('textColor', '#000') }};">
        {{ $slot }}
    </span>
</a>
