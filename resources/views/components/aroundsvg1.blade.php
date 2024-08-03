<a class="relative flex items-center justify-center mx-auto" href="{{ $attributes->get('url') }}">
    <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="100%" height="100%" version="1.1" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
    viewBox="0 0 12194.15 2015.45"
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
       <path class="fil0" d="M1007.72 0l10178.71 0c554.25,0 1007.72,453.47 1007.72,1007.72l0 0.02c0,554.25 -453.47,1007.72 -1007.72,1007.72l-10178.71 0c-554.25,0 -1007.72,-453.47 -1007.72,-1007.72l0 -0.02c0,-554.25 453.47,-1007.72 1007.72,-1007.72z"/>
       <path id="_1" class="fil1" d="M1007.72 0l10178.71 0c554.25,0 1007.72,453.47 1007.72,1007.72l0 0.02 -2.28 -1.09 -155.26 -73.42c0,-0.41 -0.01,-0.81 -0.01,-1.22l-0.06 -0.03 0 -0.02 0.06 0.03c-0.31,-256.8 -97.72,-482.48 -254.49,-639.26 -115.22,-115.21 -286.51,-186.73 -486.01,-186.73l-10178.71 0c-258.58,0 -496.65,108.76 -671.86,283.96 -177.69,177.7 -287.99,422.76 -287.99,692.25l-157.54 -74.49c0,-554.25 453.47,-1007.72 1007.72,-1007.72zm11186.43 1007.73c0,554.25 -453.47,1007.72 -1007.72,1007.72l-10178.71 0c-554.25,0 -1007.72,-453.47 -1007.72,-1007.72l0 -0.02 2.28 1.09 155.26 73.42c0,0.41 0.01,0.81 0.01,1.22l0.06 0.03 0 0.02 -0.06 -0.03c0.31,256.8 97.72,482.48 254.49,639.25 115.22,115.22 286.5,186.74 486.01,186.74l10178.71 0c258.59,0 496.65,-108.76 671.86,-283.97 177.69,-177.69 287.99,-422.75 287.99,-692.24l157.54 74.49z"/>
      </g>
     </g>
    </svg>
    <span class="absolute text-center" style="color: {{ $attributes->get('textColor', '#000') }};">
        {{ $slot }}
    </span>
</a>
