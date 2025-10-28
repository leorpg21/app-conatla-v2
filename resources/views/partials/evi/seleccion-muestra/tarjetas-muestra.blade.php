<div class="w-full mx-auto  py-6 grid gap-6 sm:grid-cols-1 md:grid-cols-3">
    <!-- Tarjeta Mayerlis -->
    <div class="bg-green-800 rounded-lg shadow p-6 flex flex-col">
        <h2 class="text-xl text-white font-semibold mb-4 truncate">Mayerlis</h2>
            @if ($ver_muestra_encuestador->mayerlis_muestra['rumv'] > 0)
            <div class="flex justify-between">
                <p class="text-gray-300 truncate text-sm">F01-FORMULARIO RUMV </p>
                <span class="pl-1 text-white font-semibold">{{ $ver_muestra_encuestador->mayerlis_muestra['rumv'] }}</span>
            </div>
            @endif

            @if ($ver_muestra_encuestador->mayerlis_muestra['educacion'] > 0)
            <div class="flex justify-between">
                <p class="text-gray-300 truncate text-sm">F02-FORMULARIO EDUCACIÓN </p>
                <span class="pl-1 text-white font-semibold">{{ $ver_muestra_encuestador->mayerlis_muestra['educacion'] }}</span>
            </div>
            @endif  
            @if ($ver_muestra_encuestador->mayerlis_muestra['salud'] > 0)
            <div class="flex justify-between">
                <p class="text-gray-300 truncate text-sm">F03-FORMULARIO SALUD </p>
                <span class="pl-1 text-white font-semibold">{{ $ver_muestra_encuestador->mayerlis_muestra['salud'] }}</span>
            </div>
            @endif
            
            @if ($ver_muestra_encuestador->mayerlis_muestra['empleabilidad'] > 0)
            <div class="flex justify-between">
                <p class="text-gray-300 truncate text-sm">F04-FORMULARIO EMPLEABILIDAD </p>
                <span class="pl-1 text-white font-semibold">{{ $ver_muestra_encuestador->mayerlis_muestra['empleabilidad'] }}</span>
            </div>
            
            @endif  

            @if ($ver_muestra_encuestador->mayerlis_muestra['ruta_productiva'] > 0)
            <div class="flex justify-between">
                <p class="text-gray-300 truncate text-sm">F05-FORMULARIO RUTA PRODUCTIVA </p>
                <span class="pl-1 text-white font-semibold">{{ $ver_muestra_encuestador->mayerlis_muestra['ruta_productiva'] }}</span>
            </div>
            @endif  

            @if ($ver_muestra_encuestador->mayerlis_muestra['atencion_campo'] > 0)
            <div class="flex justify-between">
                <p class="text-gray-300 truncate text-sm">F06-FORMULARIO ATENCIÓN EN EL CAMPO </p>
                <span class="pl-1 text-white font-semibold">{{ $ver_muestra_encuestador->mayerlis_muestra['atencion_campo'] }}</span>
            </div>
            @endif 

            @if ($ver_muestra_encuestador->mayerlis_muestra['formacion_trabajo'] > 0)
            <div class="flex justify-between">
                <p class="text-gray-300 truncate text-sm">F07-FORMULARIO FORMACIÓN EN EL TRABAJO </p>
                <span class="pl-1 text-white font-semibold">{{ $ver_muestra_encuestador->mayerlis_muestra['formacion_trabajo'] }}</span>
            </div>
            @endif  
            
            @if ($ver_muestra_encuestador->mayerlis_muestra['violencia_genero'] > 0)
            <div class="flex justify-between">
                <p class="text-gray-300 truncate text-sm">F08-FORMULARIO VIOLENCIA GENERO </p>
                <span class="pl-1 text-white font-semibold">{{ $ver_muestra_encuestador->mayerlis_muestra['violencia_genero'] }}</span>
            </div>
            @endif 

            @if ($ver_muestra_encuestador->mayerlis_muestra['promocion_prevencion'] > 0)
            <div class="flex justify-between">
                <p class="text-gray-300 truncate text-sm">F09-FORMULARIO PROMOCIÓN Y PREVENCIÓN </p>
                <span class="pl-1 text-white font-semibold">{{ $ver_muestra_encuestador->mayerlis_muestra['promocion_prevencion'] }}</span>
            </div>
            @endif  

            @if ($ver_muestra_encuestador->mayerlis_muestra['sisben'] > 0)
            <div class="flex justify-between">
                <p class="text-gray-300 truncate text-sm">F10-FORMULARIO SISBEN </p>
                <span class="pl-1 text-white font-semibold">{{ $ver_muestra_encuestador->mayerlis_muestra['sisben'] }}</span>
            </div>
            @endif  
            @if ($ver_muestra_encuestador->mayerlis_muestra['espacio_protector'] > 0)
            <div class="flex justify-between">
                <p class="text-gray-300 truncate text-sm">F11-FORMULARIO ESPACIO PROTECTOR </p>
                <span class="pl-1 text-white font-semibold">{{ $ver_muestra_encuestador->mayerlis_muestra['espacio_protector'] }}</span>
            </div>
            @endif  
            @if ($ver_muestra_encuestador->mayerlis_muestra['psicosocial'] > 0)
            <div class="flex justify-between">
                <p class="text-gray-300 truncate text-sm">F12-FORMULARIO PSICOSOCIAL </p>
                <span class="pl-1 text-white font-semibold">{{ $ver_muestra_encuestador->mayerlis_muestra['psicosocial'] }}</span>
            </div>
            @endif  
    </div>
    
    <!-- Tarjeta Liseth -->
    <div class="bg-green-800 rounded-lg shadow p-6 flex flex-col">
        <h2 class="text-xl text-white font-semibold mb-4 truncate">Liseth</h2>
            @if ($ver_muestra_encuestador->liseth_muestra['rumv'] > 0)
            <div class="flex justify-between">
                <p class="text-gray-300 truncate text-sm">F01-FORMULARIO RUMV </p>
                <span class="pl-1 text-white font-semibold">{{ $ver_muestra_encuestador->liseth_muestra['rumv'] }}</span>
            </div>
            @endif

            @if ($ver_muestra_encuestador->liseth_muestra['educacion'] > 0)
            <div class="flex justify-between">
                <p class="text-gray-300 truncate text-sm">F02-FORMULARIO EDUCACIÓN </p>
                <span class="pl-1 text-white font-semibold">{{ $ver_muestra_encuestador->liseth_muestra['educacion'] }}</span>
            </div>
            @endif  
            @if ($ver_muestra_encuestador->liseth_muestra['salud'] > 0)
            <div class="flex justify-between">
                <p class="text-gray-300 truncate text-sm">F03-FORMULARIO SALUD </p>
                <span class="pl-1 text-white font-semibold">{{ $ver_muestra_encuestador->liseth_muestra['salud'] }}</span>
            </div>
            @endif
            
            @if ($ver_muestra_encuestador->liseth_muestra['empleabilidad'] > 0)
            <div class="flex justify-between">
                <p class="text-gray-300 truncate text-sm">F04-FORMULARIO EMPLEABILIDAD </p>
                <span class="pl-1 text-white font-semibold">{{ $ver_muestra_encuestador->liseth_muestra['empleabilidad'] }}</span>
            </div>
            
            @endif  

            @if ($ver_muestra_encuestador->liseth_muestra['ruta_productiva'] > 0)
            <div class="flex justify-between">
                <p class="text-gray-300 truncate text-sm">F05-FORMULARIO RUTA PRODUCTIVA </p>
                <span class="pl-1 text-white font-semibold">{{ $ver_muestra_encuestador->liseth_muestra['ruta_productiva'] }}</span>
            </div>
            @endif  

            @if ($ver_muestra_encuestador->liseth_muestra['atencion_campo'] > 0)
            <div class="flex justify-between">
                <p class="text-gray-300 truncate text-sm">F06-FORMULARIO ATENCIÓN EN EL CAMPO </p>
                <span class="pl-1 text-white font-semibold">{{ $ver_muestra_encuestador->liseth_muestra['atencion_campo'] }}</span>
            </div>
            @endif 

            @if ($ver_muestra_encuestador->liseth_muestra['formacion_trabajo'] > 0)
            <div class="flex justify-between">
                <p class="text-gray-300 truncate text-sm">F07-FORMULARIO FORMACIÓN EN EL TRABAJO </p>
                <span class="pl-1 text-white font-semibold">{{ $ver_muestra_encuestador->liseth_muestra['formacion_trabajo'] }}</span>
            </div>
            @endif  
            
            @if ($ver_muestra_encuestador->liseth_muestra['violencia_genero'] > 0)
            <div class="flex justify-between">
                <p class="text-gray-300 truncate text-sm">F08-FORMULARIO VIOLENCIA GENERO </p>
                <span class="pl-1 text-white font-semibold">{{ $ver_muestra_encuestador->liseth_muestra['violencia_genero'] }}</span>
            </div>
            @endif 

            @if ($ver_muestra_encuestador->liseth_muestra['promocion_prevencion'] > 0)
            <div class="flex justify-between">
                <p class="text-gray-300 truncate text-sm">F09-FORMULARIO PROMOCIÓN Y PREVENCIÓN </p>
                <span class="pl-1 text-white font-semibold">{{ $ver_muestra_encuestador->liseth_muestra['promocion_prevencion'] }}</span>
            </div>
            @endif  

            @if ($ver_muestra_encuestador->liseth_muestra['sisben'] > 0)
            <div class="flex justify-between">
                <p class="text-gray-300 truncate text-sm">F10-FORMULARIO SISBEN </p>
                <span class="pl-1 text-white font-semibold">{{ $ver_muestra_encuestador->liseth_muestra['sisben'] }}</span>
            </div>
            @endif  
            @if ($ver_muestra_encuestador->liseth_muestra['espacio_protector'] > 0)
            <div class="flex justify-between">
                <p class="text-gray-300 truncate text-sm">F11-FORMULARIO ESPACIO PROTECTOR </p>
                <span class="pl-1 text-white font-semibold">{{ $ver_muestra_encuestador->liseth_muestra['espacio_protector'] }}</span>
            </div>
            @endif  
            @if ($ver_muestra_encuestador->liseth_muestra['psicosocial'] > 0)
            <div class="flex justify-between">
                <p class="text-gray-300 truncate text-sm">F12-FORMULARIO PSICOSOCIAL </p>
                <span class="pl-1 text-white font-semibold">{{ $ver_muestra_encuestador->liseth_muestra['psicosocial'] }}</span>
            </div>
            @endif  
    </div>

    <!-- Tarjeta Duris -->
    <div class="bg-green-800 rounded-lg shadow p-6 flex flex-col">
        <h2 class="text-xl text-white font-semibold mb-4 truncate">Duris</h2>
            @if ($ver_muestra_encuestador->duris_muestra['rumv'] > 0)
            <div class="flex justify-between">
                <p class="text-gray-300 truncate text-sm">F01-FORMULARIO RUMV </p>
                <span class="pl-1 text-white font-semibold">{{ $ver_muestra_encuestador->duris_muestra['rumv'] }}</span>
            </div>
            @endif

            @if ($ver_muestra_encuestador->duris_muestra['educacion'] > 0)
            <div class="flex justify-between">
                <p class="text-gray-300 truncate text-sm">F02-FORMULARIO EDUCACIÓN </p>
                <span class="pl-1 text-white font-semibold">{{ $ver_muestra_encuestador->duris_muestra['educacion'] }}</span>
            </div>
            @endif  
            @if ($ver_muestra_encuestador->duris_muestra['salud'] > 0)
            <div class="flex justify-between">
                <p class="text-gray-300 truncate text-sm">F03-FORMULARIO SALUD </p>
                <span class="pl-1 text-white font-semibold">{{ $ver_muestra_encuestador->duris_muestra['salud'] }}</span>
            </div>
            @endif
            
            @if ($ver_muestra_encuestador->duris_muestra['empleabilidad'] > 0)
            <div class="flex justify-between">
                <p class="text-gray-300 truncate text-sm">F04-FORMULARIO EMPLEABILIDAD </p>
                <span class="pl-1 text-white font-semibold">{{ $ver_muestra_encuestador->duris_muestra['empleabilidad'] }}</span>
            </div>
            
            @endif  

            @if ($ver_muestra_encuestador->duris_muestra['ruta_productiva'] > 0)
            <div class="flex justify-between">
                <p class="text-gray-300 truncate text-sm">F05-FORMULARIO RUTA PRODUCTIVA </p>
                <span class="pl-1 text-white font-semibold">{{ $ver_muestra_encuestador->duris_muestra['ruta_productiva'] }}</span>
            </div>
            @endif  

            @if ($ver_muestra_encuestador->duris_muestra['atencion_campo'] > 0)
            <div class="flex justify-between">
                <p class="text-gray-300 truncate text-sm">F06-FORMULARIO ATENCIÓN EN EL CAMPO </p>
                <span class="pl-1 text-white font-semibold">{{ $ver_muestra_encuestador->duris_muestra['atencion_campo'] }}</span>
            </div>
            @endif 

            @if ($ver_muestra_encuestador->duris_muestra['formacion_trabajo'] > 0)
            <div class="flex justify-between">
                <p class="text-gray-300 truncate text-sm">F07-FORMULARIO FORMACIÓN EN EL TRABAJO </p>
                <span class="pl-1 text-white font-semibold">{{ $ver_muestra_encuestador->duris_muestra['formacion_trabajo'] }}</span>
            </div>
            @endif  
            
            @if ($ver_muestra_encuestador->duris_muestra['violencia_genero'] > 0)
            <div class="flex justify-between">
                <p class="text-gray-300 truncate text-sm">F08-FORMULARIO VIOLENCIA GENERO </p>
                <span class="pl-1 text-white font-semibold">{{ $ver_muestra_encuestador->duris_muestra['violencia_genero'] }}</span>
            </div>
            @endif 

            @if ($ver_muestra_encuestador->duris_muestra['promocion_prevencion'] > 0)
            <div class="flex justify-between">
                <p class="text-gray-300 truncate text-sm">F09-FORMULARIO PROMOCIÓN Y PREVENCIÓN </p>
                <span class="pl-1 text-white font-semibold">{{ $ver_muestra_encuestador->duris_muestra['promocion_prevencion'] }}</span>
            </div>
            @endif  

            @if ($ver_muestra_encuestador->duris_muestra['sisben'] > 0)
            <div class="flex justify-between">
                <p class="text-gray-300 truncate text-sm">F10-FORMULARIO SISBEN </p>
                <span class="pl-1 text-white font-semibold">{{ $ver_muestra_encuestador->duris_muestra['sisben'] }}</span>
            </div>
            @endif  
            @if ($ver_muestra_encuestador->duris_muestra['espacio_protector'] > 0)
            <div class="flex justify-between">
                <p class="text-gray-300 truncate text-sm">F11-FORMULARIO ESPACIO PROTECTOR </p>
                <span class="pl-1 text-white font-semibold">{{ $ver_muestra_encuestador->duris_muestra['espacio_protector'] }}</span>
            </div>
            @endif  
            @if ($ver_muestra_encuestador->duris_muestra['psicosocial'] > 0)
            <div class="flex justify-between">
                <p class="text-gray-300 truncate text-sm">F12-FORMULARIO PSICOSOCIAL </p>
                <span class="pl-1 text-white font-semibold">{{ $ver_muestra_encuestador->duris_muestra['psicosocial'] }}</span>
            </div>
            @endif  
    </div>

    

</div>