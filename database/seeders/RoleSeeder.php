<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
    use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
         // Creamos Roles
        $role_1 = Role::create(['name' => 'super_usuario']);
        $role_2 = Role::create(['name' => 'coordinador']);
        $role_3 = Role::create(['name' => 'encuestador']);
        $role_4 = Role::create(['name' => 'visualizador']);
        $role_5 = Role::create(['name' => 'gestor_infraestructura']);
        $role_6 = Role::create(['name' => 'gestor_financiero']);
        $role_7 = Role::create(['name' => 'reporte_financiero']);


        // Creamos Permisos
        
        Permission::create(['name' => 'ver_dashboard'])->syncRoles($role_1, $role_2);
        
        // Permisos de Gestión de usuario
        Permission::create(['name' => 'ver_usuarios'])->syncRoles($role_1, $role_2, $role_4);
        Permission::create(['name' => 'modificar_usuario'])->assignRole($role_1);

        
        // Permisos para asignar los formularios a los gestores
        Permission::create(['name' => 'ver_formulario_asignado'])->assignRole($role_1);
        Permission::create(['name' => 'asignar_formulario'])->assignRole($role_1);

        // Permission::create(['name' => 'view_beneficiary'])->syncRoles($role_1, $role_2);
        // Permission::create(['name' => 'edit_beneficiary'])->syncRoles($role_1, $role_2);
    
        // Permisos SPI
        Permission::create(['name' => 'ver_indicador'])->syncRoles($role_1, $role_2, $role_6, $role_7);
        Permission::create(['name' => 'editar_indicador'])->syncRoles($role_1, $role_6);
        Permission::create(['name' => 'cargar_indicador'])->syncRoles($role_1, $role_7);
        
        // Permisos de Infraestructura
        Permission::create(['name' => 'ver_infraestructura'])->syncRoles($role_1, $role_2, $role_5);
        Permission::create(['name' => 'editar_infraestructura'])->syncRoles($role_1, $role_5);
        Permission::create(['name' => 'cargar_infraestructura'])->syncRoles($role_1, $role_2);
        
        
        Permission::create(['name' => 'ver_data'])->syncRoles($role_1, $role_2);
        
        // Permisos formulario RUMV 1
        Permission::create(['name' => 'ver_formulario_rumv'])->syncRoles($role_1, $role_2);
        Permission::create(['name' => 'editar_formulario_rumv'])->syncRoles($role_1);

        //Permisos Formulario Educación 2
        Permission::create(['name' => 'ver_formulario_educacion'])->syncRoles($role_1, $role_2);
        Permission::create(['name' => 'editar_formulario_educacion'])->syncRoles($role_1);

        // Permisos Formulario Salud 3
        Permission::create(['name' => 'ver_formulario_salud'])->syncRoles($role_1, $role_2);
        Permission::create(['name' => 'editar_formulario_salud'])->syncRoles($role_1);

        // Permisos Formulario Empleabilidad 4
        Permission::create(['name' => 'ver_formulario_empleabilidad'])->syncRoles($role_1, $role_2);
        Permission::create(['name' => 'editar_formulario_empleabilidad'])->syncRoles($role_1);

        // Permisos Formulario Ruta Productiva 5
        Permission::create(['name' => 'ver_formulario_ruta_productiva'])->syncRoles($role_1, $role_2);
        Permission::create(['name' => 'editar_formulario_ruta_productiva'])->syncRoles($role_1);

        // Permisos Formulario Atención en el campo 6
        Permission::create(['name' => 'ver_formulario_atencion_campo'])->syncRoles($role_1, $role_2);
        Permission::create(['name' => 'editar_formulario_atencion_campo'])->syncRoles($role_1);

        // Permisos Formulario Formación en trabajo 7
        Permission::create(['name' => 'ver_formulario_formacion_trabajo'])->syncRoles($role_1, $role_2);
        Permission::create(['name' => 'editar_formulario_formacion_trabajo'])->syncRoles($role_1);

        // Permisos Formulario Violacion de genero 8
        Permission::create(['name' => 'ver_formulario_violencia_genero'])->syncRoles($role_1, $role_2);
        Permission::create(['name' => 'editar_formulario_violencia_genero'])->syncRoles($role_1);
        
        // Permisos Formulario Promoción Prevencion 9
        Permission::create(['name' => 'ver_formulario_promocion_prevencion'])->syncRoles($role_1, $role_2);
        Permission::create(['name' => 'editar_formulario_promocion_prevencion'])->syncRoles($role_1);

        // Permisos Formulario Sisben 10
        Permission::create(['name' => 'ver_formulario_sisben'])->syncRoles($role_1, $role_2);
        Permission::create(['name' => 'editar_formulario_sisben'])->syncRoles($role_1);

        // Permisos Formulario Espacio Protector 11
        Permission::create(['name' => 'ver_formulario_espacio_protector'])->syncRoles($role_1, $role_2);
        Permission::create(['name' => 'editar_formulario_espacio_protector'])->syncRoles($role_1);

        // Permisos Formulario Psicosocial 12
        Permission::create(['name' => 'ver_formulario_psicosocial'])->syncRoles($role_1, $role_2);
        Permission::create(['name' => 'editar_formulario_psicosocial'])->syncRoles($role_1);
    }
}
