<a class="relative flex items-center justify-center mx-auto" href="{{ $attributes->get('url') }}">
    <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="100%" height="100%" version="1.1" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
    viewBox="0 0 12072.72 1995.38"
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
       <path class="fil0" d="M997.68 0l10077.36 0c0,548.72 448.96,997.68 997.68,997.68l0 0.02c-548.72,0 -997.68,448.96 -997.68,997.68l-10077.36 0c0,-548.72 -448.96,-997.68 -997.68,-997.68l0 -0.02c548.72,0 997.68,-448.96 997.68,-997.68z"/>
       <path id="_1" class="fil1" d="M997.68 0l10077.36 0c0,548.72 448.96,997.68 997.68,997.68l0 0.02c-548.72,0 -997.68,448.96 -997.68,997.68l-10077.36 0c0,-548.72 -448.96,-997.68 -997.68,-997.68l0 -0.02c548.72,0 997.68,-448.96 997.68,-997.68zm9937.24 104.94l-9781.76 0c-8.16,269.57 -121.67,513.83 -300.52,692.68 -105.46,105.46 -234.47,188.5 -379.03,241.13 126.49,66.11 243.22,152.61 345.88,255.27 163.74,163.74 278.15,370.86 318.32,596.42l9781.76 0c8.16,-269.58 121.67,-513.83 300.52,-692.68 105.46,-105.46 234.47,-188.5 379.03,-241.13 -126.49,-66.11 -243.22,-152.61 -345.88,-255.27 -163.74,-163.74 -278.15,-370.86 -318.32,-596.42z"/>
      </g>
     </g>
    </svg>
    <span class="absolute text-center" style="color: {{ $attributes->get('textColor', '#000') }};">
        {{ $slot }}
    </span>
</a>
    
